<!-- Main Prediction Modal -->
<div class="modal fade" id="predictModal" tabindex="-1" aria-labelledby="predictModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="predictModalLabel">Illness Prediction</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body fw-bold text-black">
        <form id="predictForm">
          <div class="mb-3">
            <label class="form-label">Age</label>
            <input type="number" name="age" class="form-control">
          </div>

          <div class="form-check">
            <input type="checkbox" name="fever" class="form-check-input">
            <label class="form-check-label">Fever</label>
          </div>

          <div class="form-check">
            <input type="checkbox" name="cough" class="form-check-input">
            <label class="form-check-label">Cough</label>
          </div>

          <div class="form-check">
            <input type="checkbox" name="headache" class="form-check-input">
            <label class="form-check-label">Headache</label>
          </div>

          <div class="form-check">
            <input type="checkbox" name="fatigue" class="form-check-input">
            <label class="form-check-label">Fatigue</label>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Predict Illness</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Prediction Result Modal -->
<div class="modal fade" id="resultModal" tabindex="-1" aria-labelledby="resultModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="resultModalLabel">Prediction Result</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body fw-bold text-black text-center">
        <p id="predictionResult"></p>
      </div>
    </div>
  </div>
</div>

<!-- 🔹 JavaScript to Handle AJAX Submission & Show Result Modal -->
<script>
document.getElementById("predictForm").addEventListener("submit", function(event) {
  event.preventDefault(); // Prevent form submission

  let formData = new FormData(this); // Get form data

  fetch("predict.php", {
      method: "POST",
      body: formData
    })
    .then(response => response.json())
    .then(data => {
      // Show the prediction result in the second modal
      document.getElementById("predictionResult").innerHTML =
        `<strong>Predicted Disease:</strong> ${data.predicted_disease}`;

      // Hide the first modal and show the result modal
      var predictModal = new bootstrap.Modal(document.getElementById("predictModal"));
      predictModal.hide();

      var resultModal = new bootstrap.Modal(document.getElementById("resultModal"));
      resultModal.show();
    })
    .catch(error => console.error("Error:", error));
});
</script>