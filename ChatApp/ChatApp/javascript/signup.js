// Select the signup form, the continue button within the form, and the error text element within the form
const form = document.querySelector(".signup form"),
    continueBtn = form.querySelector(".button input"),
    errorText = form.querySelector(".error-text");

// Prevent the default form submission behavior
form.onsubmit = (e) => {
    e.preventDefault();
}

// Add an onclick event listener to the continue button
continueBtn.onclick = () => {
    // Create a new XMLHttpRequest object
    let xhr = new XMLHttpRequest();
    // Initialize a POST request to the signup.php script
    xhr.open("POST", "php/signup.php", true);

    // Define what should happen when the request is loaded
    xhr.onload = () => {
        // Check if the request's ready state is DONE
        if (xhr.readyState === XMLHttpRequest.DONE) {
            // Check if the HTTP status code is 200 (OK)
            if (xhr.status === 200) {
                // Get the response data
                let data = xhr.response;
                // If the response data is "success"
                if (data === "success") {
                    // Redirect to the users.php page
                    location.href = "users.php";
                } else {
                    // If there's an error, display the error text and set its content to the response data
                    errorText.style.display = "block";
                    errorText.textContent = data;
                }
            }
        }
    }

    // Create a new FormData object from the form
    let formData = new FormData(form);
    // Send the form data via the XMLHttpRequest
    xhr.send(formData);
}
