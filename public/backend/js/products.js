// Variables for changing view btw product mgt and form view
let addProduct = document.querySelector(".add-product-btn");
let mainProductPane = document.querySelector(".main-product");
let productForm = document.querySelector(".product-form");

// Toggling view Functionality
addProduct.addEventListener("click", function () {
    mainProductPane.classList.remove("show");
    productForm.classList.add("show");
});

// Invoking tagger master plugin
tagger(document.querySelector("#tags")),
    {
        allow_spaces: false,
        tag_limit: 3,
    };

// Variables for filtering through product management table
// let search = document.querySelector(".search-input-js");
// let rows = document.querySelectorAll("tbody tr");

// Filtering functionality

// search.addEventListener("keyup", function (e) {
//   let textValue = e.target.value.toLowerCase();
//   for (i = 0; i < rows.length; i++) {
//     let td = rows[i]
//       .querySelector("td")
//       .textContent.toLocaleLowerCase()
//       .indexOf(textValue);
//     if (td > -1) {
//       rows[i].style.display = "table-row";
//     } else {
//       rows[i].style.display = "none";
//     }
//   }
// });
