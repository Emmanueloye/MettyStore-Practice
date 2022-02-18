// All variables for navbar
let userBtn = document.querySelector(".user-logo");
let userDropdown = document.querySelector(".auth-dropdown");
let togglebtn = document.querySelector(".toggle");
let navDropdown = document.querySelector(".nav-list");
let navLink = document.querySelectorAll(".nav-link");
let megaMenu = document.querySelectorAll(".mega-menu");
let dropdown = document.querySelector(".dropdown");

// Variables for the slider
let slidePosition = 0;
let slides = document.querySelectorAll(".slide");
let prevBtn = document.querySelector(".prev-btn");
let nextBtn = document.querySelector(".next-btn");

// Mega menu functionality
for (i = 0; i < megaMenu.length; i++) {
    megaMenu[i].addEventListener("click", function (e) {
        e.preventDefault();
        console.log(e.target.nextElementSibling);
        e.target.nextElementSibling.classList.toggle("open");
    });
}

// User dropdown functionality
userBtn.addEventListener("click", function () {
    userDropdown.classList.toggle("show");
});

userDropdown.addEventListener("mouseleave", function () {
    userDropdown.classList.remove("show");
});

// Responsive navbar functionality
togglebtn.addEventListener("click", function () {
    navDropdown.classList.toggle("show-nav");
});

// Changing active class for nav list
// navLink.forEach(function (link) {
//   link.addEventListener("click", function () {
//     let current = document.querySelectorAll(".active-link");
//     current[0].className = current[0].className.replace(" active-link", "");
//     this.className += " active-link";
//   });
// });

for (var i = 0; i < navLink.length; i++) {
    navLink[i].addEventListener("click", function () {
        var current = document.getElementsByClassName("active-link");
        current[0].className = current[0].className.replace(" active-link", "");
        this.className += " active-link";
    });
}
// navLink.forEach((link) => {
//   link.addEventListener("click", function () {
//     let current = document.querySelectorAll(".active-link");
//     current[0].className = current[0].className.replace(" active-link", "");
//     this.className += " active-link";
//   });
// });

// slider functionality
prevBtn.addEventListener("click", function () {
    moveToPrevSlide();
});

nextBtn.addEventListener("click", function () {
    moveToNextSlide();
});

function moveToNextSlide() {
    if (slidePosition === slides.length - 1) {
        slidePosition = 0;
    } else {
        slidePosition++;
    }
    updateSlide(slidePosition);
}

function moveToPrevSlide() {
    if (slidePosition === 0) {
        slidePosition = slides.length - 1;
    } else {
        slidePosition--;
    }
    updateSlide(slidePosition);
}

function updateSlide(n) {
    for (i = 0; i < slides.length; i++) {
        slides[i].classList.remove("show");
    }
    slides[n].classList.add("show");
}

setInterval(moveToNextSlide, 5000);
