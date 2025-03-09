<?php
$servername = "localhost"; // غيّره حسب الحاجة
$username = "root"; // اسم المستخدم لقاعدة البيانات
$password = ""; // كلمة المرور (اتركها فارغة إذا لم تكن محددة)
$dbname = "hms"; // اسم قاعدة البيانات

// إنشاء اتصال
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}

// إنشاء الجداول
$sql = "
CREATE TABLE IF NOT EXISTS Admins(
    admin_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    profile_img VARCHAR(255),
    type ENUM('super_admin', 'admin') NOT NULL,
    permissions ENUM('FULL Permissions', 'Can\'t Add Or Delete Admins') NOT NULL
);

CREATE TABLE IF NOT EXISTS Doctors (
    doctor_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    username VARCHAR(100) UNIQUE NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    gender ENUM('Male', 'Female', 'Other') NOT NULL,
    phone VARCHAR(20),
    country VARCHAR(100),
    password VARCHAR(255) NOT NULL,
    salary DECIMAL(10,2),
    registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status ENUM('pending', 'approved', 'rejected') DEFAULT 'pending',
    profile_img VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS Patients (
    patient_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    username VARCHAR(100) UNIQUE NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    gender ENUM('Male', 'Female', 'Other') NOT NULL,
    phone VARCHAR(20),
    birth_date DATE,
    address TEXT,
    password VARCHAR(255) NOT NULL,
    profile_img VARCHAR(255),
    registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS Appointments (
    appointment_id INT AUTO_INCREMENT PRIMARY KEY,
    doctor_id INT NOT NULL,
    patient_id INT NOT NULL,
    appointment_date DATETIME NOT NULL,
    symptoms TEXT,
    status ENUM('pending', 'confirmed', 'completed', 'cancelled') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (doctor_id) REFERENCES Doctors(doctor_id) ON DELETE CASCADE,
    FOREIGN KEY (patient_id) REFERENCES Patients(patient_id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS Reports (
    report_id INT AUTO_INCREMENT PRIMARY KEY,
    doctor_id INT NOT NULL,
    patient_id INT NOT NULL,
    report_title VARCHAR(255) NOT NULL,
    report_content TEXT,
    report_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    img VARCHAR(255),
    file VARCHAR(255),
    FOREIGN KEY (doctor_id) REFERENCES Doctors(doctor_id) ON DELETE NO ACTION,
    FOREIGN KEY (patient_id) REFERENCES Patients(patient_id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS Incomes (
    income_id INT AUTO_INCREMENT PRIMARY KEY,
    doctor_id INT NOT NULL,
    patient_id INT NOT NULL,
    date_discharge DATE,
    amount_paid DECIMAL(10,2) NOT NULL,
    description TEXT,
    appointment_id INT,
    FOREIGN KEY (doctor_id) REFERENCES Doctors(doctor_id) ON DELETE SET NULL,
    FOREIGN KEY (patient_id) REFERENCES Patients(patient_id) ON DELETE SET NULL,
    FOREIGN KEY (appointment_id) REFERENCES Appointments(appointment_id) ON DELETE SET NULL
);

CREATE TABLE IF NOT EXISTS Doctors_Patients (
    doctor_id INT NOT NULL,
    patient_id INT NOT NULL,
    FOREIGN KEY (doctor_id) REFERENCES Doctors(doctor_id) ON DELETE CASCADE,
    FOREIGN KEY (patient_id) REFERENCES Patients(patient_id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS Notifications (
    notification_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    user_type ENUM('admin', 'doctor', 'patient') NOT NULL,
    message TEXT NOT NULL,
    status ENUM('unread', 'read') DEFAULT 'unread',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
";

// تنفيذ استعلام إنشاء الجداول
if ($conn->multi_query($sql) === TRUE) {
    echo "تم إنشاء الجداول بنجاح.<br>";
} else {
    echo "خطأ في إنشاء الجداول: " . $conn->error . "<br>";
}

// إعادة تعيين الاتصال لإنشاء الإدخالات
$conn->close();
$conn = new mysqli($servername, $username, $password, $dbname);

// ** إدراج بيانات مع تشفير كلمات المرور **

// بيانات الإداريين
$admins = [
    ['admin1', 'admin1.jpg', 'super_admin', 'FULL Permissions', 'admin_pass1'],
    ['admin2', 'admin2.jpg', 'admin', 'Can\'t Add Or Delete Admins', 'admin_pass2']
];

// بيانات الأطباء
$doctors = [
    ['Ali', 'Hassan', 'ali_hassan', 'ali@example.com', 'Male', '123456789', 'Egypt', 'doctor_pass1', 5000.00, 'approved', 'doctor1.jpg'],
    ['Sara', 'Mohamed', 'sara_mohamed', 'sara@example.com', 'Female', '987654321', 'UAE', 'doctor_pass2', 6000.00, 'pending', 'doctor2.jpg']
];

// بيانات المرضى
$patients = [
    ['Omar', 'Ahmed', 'omar_ahmed', 'omar@example.com', 'Male', '1122334455', '1990-05-12', 'Cairo, Egypt', 'patient_pass1', 'patient1.jpg'],
    ['Laila', 'Khalid', 'laila_khalid', 'laila@example.com', 'Female', '5566778899', '1995-09-25', 'Dubai, UAE', 'patient_pass2', 'patient2.jpg']
];

// دالة لإدراج البيانات مع تشفير كلمة المرور
function insertData($conn, $table, $data, $passwordIndex) {
    foreach ($data as $row) {
        // تشفير كلمة المرور
        $hashedPassword = password_hash($row[$passwordIndex], PASSWORD_BCRYPT);
        $row[$passwordIndex] = $hashedPassword;
        
        // تحديد الأعمدة التي سيتم إدراج البيانات فيها
        if ($table === "Doctors") {
            $columns = "first_name, last_name, username, email, gender, phone, country, password, salary, status, profile_img";
        } elseif ($table === "Admins") {
            $columns = "username, profile_img, type, permissions, password";
        } elseif ($table === "Patients") {
            $columns = "first_name, last_name, username, email, gender, phone, birth_date, address, password, profile_img";
        } else {
            continue; // إذا لم يكن الجدول مدعومًا، تخطّاه
        }

        $placeholders = implode(',', array_fill(0, count($row), '?'));
        $stmt = $conn->prepare("INSERT INTO $table ($columns) VALUES ($placeholders)");
        
        $stmt->bind_param(str_repeat('s', count($row)), ...$row);
        $stmt->execute();
    }
}

// إدراج البيانات في الجداول
insertData($conn, "Admins", $admins, 4);
insertData($conn, "Doctors", $doctors, 7);
insertData($conn, "Patients", $patients, 8);

echo "تم إدراج جميع البيانات بنجاح.<br>";

// إغلاق الاتصال
$conn->close();
?>