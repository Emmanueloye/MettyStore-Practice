// Varibles for Nav Tab
let tab = document.querySelector(".tabs");
let tabBtns = document.querySelectorAll(".tab-btn");
let tabpanes = document.querySelectorAll(".tab-pane");

// variables for product sliders
let productImage = document.querySelector(".main-image");
let thumbnails = document.querySelectorAll(".thumb-img");
let currentImage = 0;

// Variable for changing view from Review pane to review form pane
let addReviewBtn = document.querySelector(".add-review-btn");
let reviewPane = document.querySelector(".customer-reviews");
let reviewForm = document.querySelector(".add-review-form");

// Product slider functionality

for (i = 0; i < thumbnails.length; i++) {
    thumbnails[i].addEventListener("click", function (e) {
        thumbnails[currentImage].classList.remove("active");
        e.target.classList.add("active");
        productImage.src = e.target.src;

        if (currentImage === thumbnails.length - 1) {
            currentImage = 0;
        } else {
            currentImage++;
        }
    });
}

// Nav Tab Functionality

tab.addEventListener("click", function (e) {
    let id = e.target.dataset.id;
    if (id) {
        for (i = 0; i < tabBtns.length; i++) {
            tabBtns[i].classList.remove("active");
        }
        e.target.classList.add("active");
        for (i = 0; i < tabpanes.length; i++) {
            tabpanes[i].classList.remove("show");
        }
        let element = document.getElementById(id);
        element.classList.add("show");
    }
});

// Changing view to review form pane
addReviewBtn.addEventListener("click", function () {
    reviewPane.classList.remove("show");
    reviewForm.classList.add("show");
});
