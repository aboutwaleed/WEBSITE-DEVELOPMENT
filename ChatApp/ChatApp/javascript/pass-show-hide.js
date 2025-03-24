// Select the password input field within the form
const pswrdField = document.querySelector(".form input[type='password']"),
// Select the icon within the form field
toggleIcon = document.querySelector(".form .field i");

// Add an onclick event listener to the toggle icon
toggleIcon.onclick = () =>{
  // Check if the current type of the password field is "password"
  if(pswrdField.type === "password"){
    // If it is, change the type to "text" to show the password
    pswrdField.type = "text";
    // Add the class "active" to the icon to indicate the password is visible
    toggleIcon.classList.add("active");
  }else{
    // If the type is not "password" (i.e., it is "text"), change it back to "password" to hide the password
    pswrdField.type = "password";
    // Remove the "active" class from the icon to indicate the password is hidden
    toggleIcon.classList.remove("active");
  }
}
