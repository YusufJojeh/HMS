<?php
// $connect = mysqli_connect( 'localhost', 'root', '' );
// $Create = 'CREATE DATABASE IF NOT EXISTS hms';

$connect = mysqli_connect( 'localhost', 'root', '', 'hospital' );

// if ( !$connect ) {
//   die( 'Connection failed: ' . mysqli_connect_error() );
// }

// $create = "CREATE TABLE IF NOT EXISTS admin(
//   id int (100) NOT NULL auto_increment,
//   user varchar(100) ,
//   password varchar(100) ,
//   profile varchar (100),
//       PRIMARY KEY(id)
// )";
// $query = mysqli_query( $connect, $create );
// if ( !$query ) {
//   die( 'Create failed: ' . mysqli_error() );
// }

// $create = "CREATE TABLE IF NOT EXISTS doctors(
//     id INT(100) NOT NULL AUTO_INCREMENT,
//     firstname VARCHAR(100) NOT NULL,
//     surname VARCHAR(100) NOT NULL,
//     user VARCHAR(100) NOT NULL,
//     email VARCHAR(100) NOT NULL,
//     gender VARCHAR(100) NOT NULL,
//     phone INT(100) NOT NULL,
//     country VARCHAR(100) NOT NULL,
//     password VARCHAR(100) NOT NULL,
//     salary VARCHAR(100) NOT NULL,
//     data_reg VARCHAR(100) NOT NULL,
//     status VARCHAR(100) NOT NULL,
//     profile VARCHAR(100) NOT NULL,
//     PRIMARY KEY(id)
// )";

// $query = mysqli_query( $connect, $create );
// if ( !$query ) {
//   die( 'CREATE DOCTOR ERROR ' . mysqli_error() );
// }
// CREATE TABLE `hms`.`report` ( `id` INT( 100 ) NOT NULL AUTO_INCREMENT, `tilte` VARCHAR( 100 ) NOT NULL, `message` VARCHAR( 100 ) NOT NULL, `user` VARCHAR( 100 ) NOT NULL, `date_send` VARCHAR( 100 ) NOT NULL, PRIMARY KEY ( `id` ) ) ENGINE = InnoDB;
// CREATE TABLE `hms`.`income` ( `id` INT( 100 ) NOT NULL AUTO_INCREMENT, `doctor` VARCHAR( 100 ) NOT NULL, `patient` VARCHAR( 100 ) NOT NULL, `date_discharge` VARCHAR( 100 ) NOT NULL, `account_paid` VARCHAR( 100 ) NOT NULL, PRIMARY KEY ( `id` ) ) ENGINE = InnoDB;
// CREATE TABLE `hms`.`appointment` ( `id` INT( 100 ) NOT NULL AUTO_INCREMENT, `firstname` VARCHAR( 100 ) NOT NULL, `surname` VARCHAR( 100 ) NOT NULL, `gender` VARCHAR( 100 ) NOT NULL, `phone` VARCHAR( 100 ) NOT NULL, `appointment_date` VARCHAR( 100 ) NOT NULL, `symptoms` VARCHAR( 100 ) NOT NULL, `status` VARCHAR( 100 ) NOT NULL, `date_booked` VARCHAR( 100 ) NOT NULL, PRIMARY KEY ( `id` ) ) ENGINE = InnoDB;
// ALTER TABLE `report` ADD `img` VARCHAR( 100 ) NOT NULL AFTER `date_send`, ADD `file` VARCHAR( 100 ) NOT NULL AFTER `img`;

?>