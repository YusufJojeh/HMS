from flask import Flask, request, jsonify
import pickle
import numpy as np

app = Flask(__name__)

# Load trained model and label mapping
model = pickle.load(open("disease_model.pkl", "rb"))
label_mapping = pickle.load(open("label_mapping.pkl", "rb"))

@app.route("/predict", methods=["POST"])
def predict():
    data = request.get_json()
    symptoms = ['fever', 'cough', 'headache', 'fatigue']
    input_data = [int(data.get(symptom, 0)) for symptom in symptoms]

    prediction = model.predict([input_data])[0]
    predicted_disease = label_mapping[prediction]

    return jsonify({"predicted_disease": predicted_disease})

if __name__ == "__main__":
    app.run(debug=True, port=5000)
