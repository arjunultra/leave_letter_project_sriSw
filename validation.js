const leaveForm = document.getElementById("leave-form");
const submitMessage = document.getElementById("submit-msg");
// date validation
let startDate = document.getElementById("start-date");
let endDate = document.getElementById("end-date");
let numberOfDaysDisplay = document.getElementById("total-days");
numberOfDaysDisplay.readOnly = true;
function calculateDays() {
  let start = new Date(startDate.value);
  let end = new Date(endDate.value);

  if (!isNaN(start.getTime()) && !isNaN(end.getTime())) {
    let difference = end - start;
    let days = difference / (1000 * 60 * 60 * 24);
    numberOfDaysDisplay.value = days;
    console.log(days);
  } else {
    numberOfDaysDisplay.textContent = "Please enter valid start and end dates.";
  }
}

endDate.addEventListener("keyup", calculateDays);
endDate.addEventListener("change", calculateDays);
// Prevent default form submission on page load
document.addEventListener("DOMContentLoaded", function () {
  leaveForm.addEventListener("submit", function (e) {
    // Prevent default form submission
    e.preventDefault();
    // Check if the form is valid
    if (this.checkValidity()) {
      // Submit the form
      this.submit();
      // submitMessage.classList.remove("d-none");
      // submitMessage.classList.add("d-block");
    }
  });
});
