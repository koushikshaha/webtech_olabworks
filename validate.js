function validate() {
  
    var name = document.getElementById("name").value;
    var gender = document.querySelector('input[name="gender"]:checked');
    var password = document.getElementById("password").value;
    var repassword = document.getElementById("repassword").value;
    var email = document.getElementById("email").value.trim();
    var dob = document.getElementById("DOB").value;
    var division = document.getElementById("division").value;
  var termsAccepted = document.getElementById("positive").checked;
  
  function checkName(name) {
    // Remove extra spaces
    name = name.trim();
  
   
    if (name === "") {
      alert("name is empty")
    }
  
    
    if (!/^[A-Za-z\s]+$/.test(name)) {
      alert("Name can only contain letters and spaces.");
    }
  
    // Passed all checks
   
  }

}