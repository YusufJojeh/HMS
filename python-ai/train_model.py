import pandas as pd
import numpy as np
from sklearn.model_selection import train_test_split
from sklearn.ensemble import RandomForestClassifier
import pickle

# Sample dataset (Symptoms → Diseases)
data = {
    'fever': [1, 0, 1, 0, 1, 0, 1],
    'cough': [0, 1, 1, 0, 0, 1, 1],
    'headache': [1, 1, 0, 1, 0, 1, 0],
    'fatigue': [0, 1, 1, 0, 1, 1, 1],
    'disease': ['Flu', 'Cold', 'Flu', 'Migraine', 'COVID-19', 'Cold', 'COVID-19']
}

df = pd.DataFrame(data)

# Convert disease names to numeric codes
df['disease'] = df['disease'].astype('category')
df['disease_code'] = df['disease'].cat.codes

# Split data
X = df.drop(columns=['disease', 'disease_code'])
y = df['disease_code']
X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.2, random_state=42)

# Train model
model = RandomForestClassifier(n_estimators=100, random_state=42)
model.fit(X_train, y_train)

# Save model and label mapping
pickle.dump(model, open('disease_model.pkl', 'wb'))
pickle.dump(dict(enumerate(df['disease'].cat.categories)), open('label_mapping.pkl', 'wb'))

print("✅ Model trained and saved successfully!")
