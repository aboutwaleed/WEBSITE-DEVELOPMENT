// Select elements from the DOM and assign them to constants
const searchBar = document.querySelector(".search input"),
    searchIcon = document.querySelector(".search button"),
    usersList = document.querySelector(".users-list");

// Add an event listener to the search icon for the click event
searchIcon.onclick = ()=>{
  // Toggle the "show" class on the search bar to show/hide it
  searchBar.classList.toggle("show");

  // Toggle the "active" class on the search icon to indicate it's active
  searchIcon.classList.toggle("active");

  // Set focus to the search bar
  searchBar.focus();

  // If the search bar has the "active" class, clear its value and remove the class
  if(searchBar.classList.contains("active")){
    searchBar.value = "";
    searchBar.classList.remove("active");
  }
}

// Add an event listener to the search bar for the keyup event
searchBar.onkeyup = ()=>{
  // Get the current value of the search bar
  let searchTerm = searchBar.value;

  // If the search term is not empty, add the "active" class to the search bar
  if(searchTerm != ""){
    searchBar.classList.add("active");
  }else{
    // If the search term is empty, remove the "active" class from the search bar
    searchBar.classList.remove("active");
  }

  // Create a new XMLHttpRequest object for AJAX request
  let xhr = new XMLHttpRequest();

  // Initialize a POST request to the URL "php/search.php"
  xhr.open("POST", "php/search.php", true);

  // Define what should happen when the request is completed
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
      if(xhr.status === 200){

        // Get the response data from the server
        let data = xhr.response;
        // Update the innerHTML of the users list with the response data
        usersList.innerHTML = data;
      }
    }
  }

  // Set the request header to indicate form data
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  // Send the search term as form data
  xhr.send("searchTerm=" + searchTerm);
}

// Periodically update the users list every 500 milliseconds
setInterval(() =>{

  // Create a new XMLHttpRequest object for AJAX request
  let xhr = new XMLHttpRequest();

  // Initialize a GET request to the URL "php/users.php"
  xhr.open("GET", "php/users.php", true);

  // Define what should happen when the request is completed
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
      if(xhr.status === 200){

        // Get the response data from the server
        let data = xhr.response;

        // If the search bar does not have the "active" class, update the users list
        if(!searchBar.classList.contains("active")){
          usersList.innerHTML = data;
        }
      }
    }
  }
  // Send the request
  xhr.send();
}, 500);

