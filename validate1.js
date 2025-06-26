function validate() {
  var name = document.getElementById("name").value.trim();
  var gender = document.querySelector('input[name="gender"]:checked');
  var password = document.getElementById("password").value;
  var repassword = document.getElementById("repassword").value;
  var email = document.getElementById("email").value.trim();
  var dob = document.getElementById("DOB").value;
  var division = document.getElementById("division").value;
  var termsAccepted = document.getElementById("positive").checked;

  // First: Check if any required field is empty
  if (
    name === "" ||
    !gender ||
    password === "" ||
    repassword === "" ||
    email === "" ||
    dob === "" ||
    division === ""
  ) {
    document.getElementById("messagebox").innerHTML =
      "Please fill in all the fields.";
    return false;
  }

  var nameRegex = /^[A-Za-z\s]+$/;
  if (!nameRegex.test(name)) {
    document.getElementById("messagebox").innerHTML =
      "Name can only contain letters and spaces.";
    return false;
  }

  // Check gender
  if (!gender) {
    document.getElementById("messagebox").innerHTML =
      "Please select your gender.";
    return false;
  }

  // Check password
  const regex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;

  if (!regex.test(password)) {
    document.getElementById("messagebox").innerHTML =
      "Password must be at least 8 characters long and include at least one letter and one numbe";
    return false;
  }
  if (password !== repassword) {
    document.getElementById("messagebox").innerHTML =
      "Passwords do not match..";
    alert("");
    return false;
  }

  // Check email format
  var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!emailRegex.test(email)) {
    document.getElementById("messagebox").innerHTML =
      "Please enter a valid email address";
    return false;
  }

  // Check date of birth
  if (dob === "") {
    document.getElementById("messagebox").innerHTML =
      "Please select your Date of Birth";
    return false;
  }
  var dobDate = new Date(dob);
  var today = new Date();

  if (dobDate >= today) {
    document.getElementById("messagebox").innerHTML =
      "Date of Birth cannot be today or a future date.";
    return false;
  }

  // Check division
  if (division === "") {
    document.getElementById("messagebox").innerHTML =
      "Please select your division.";
    return false;
  }

  // Check terms
  if (!termsAccepted) {
    document.getElementById("messagebox").innerHTML =
      "You must accept the terms and conditions.";
    return false;
  }

  // If all checks pass
  document.getElementById("messagebox").innerHTML =
    "Form submitted successfully!";
  return true;
}
