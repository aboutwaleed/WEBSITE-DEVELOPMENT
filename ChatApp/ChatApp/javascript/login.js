// Selecting the form element within an element with class "login"
const form = document.querySelector(".login form"),
    // Selecting the input element within the form that is inside an element with class "button"
    continueBtn = form.querySelector(".button input"),
    // Selecting the element within the form that has the class "error-text"
    errorText = form.querySelector(".error-text");

// Prevent the form from submitting normally (e.g., refreshing the page)
form.onsubmit = (e)=>{
    e.preventDefault();
}
// When the continue button is clicked
continueBtn.onclick = ()=>
{
    // Create a new XMLHttpRequest object for AJAX request
    let xhr = new XMLHttpRequest();
    // Initialize a POST request to "php/login.php"
    xhr.open("POST", "php/login.php", true);
    // When the request is complete
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              // Get the response data from the server
              let data = xhr.response;
              // If the response is "success"
              if(data === "success"){
                  // Redirect to "users.php"
                  location.href = "users.php";
              }else{
                  // Otherwise, display the error text and set its content to the response data
                  errorText.style.display = "block";
                errorText.textContent = data;
              }
          }
      }
    }
    // Create a new FormData object, passing the form element to it
    let formData = new FormData(form);
    // Send the form data
    xhr.send(formData);
}