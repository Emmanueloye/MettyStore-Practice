// Variables for Authentication Dropdown
let profileImage = document.querySelector(".p-img");
let authDropdown = document.querySelector(".auth-dropdown");

// Variable for Sidebar NavLinks
let navList = document.querySelector(".list");

// Variables for Sidebar toggle
let toggleMenu = document.querySelector(".the-toggle");
let sideBar = document.querySelector(".side-bar");
let mainContent = document.querySelector(".main-content");


// Variable for close button on small screen size
let closeBtn = document.querySelector(".close-btn");


// Authentication Dropdown Functionality
profileImage.addEventListener("click", function () {
  authDropdown.classList.toggle("show");
});

// Sidebar NavLinks Functionality
navList.addEventListener("click", function (e) {
  let el = e.target.parentElement;
  el.nextElementSibling.classList.toggle("show");
  el.classList.toggle("active");
});

// Sidebar toggle (changing sidebar size)
toggleMenu.addEventListener("click", function () {
  sideBar.classList.toggle("change");
  mainContent.classList.toggle("change");
});

// Close Button Functionality on small screen size
closeBtn.addEventListener("click", function () {
  sideBar.classList.toggle("change");
});

