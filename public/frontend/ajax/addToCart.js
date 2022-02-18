let products = document.querySelectorAll(".products");
let productDetails = document.querySelector(".product-details");

// Add to cart functionality upon login via product cards

products.forEach((product) => {
    product.addEventListener("click", function (e) {
        if (e.target.classList.contains("btn-add-cart")) {
            let productQty =
                e.target.parentNode.parentNode.querySelector(".product-qty");
            let id = e.target.parentNode.parentNode.querySelector(".id").value;
            fetch("/add-to-cart/" + id, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute("content"),
                },
                body: JSON.stringify({
                    product_qty: productQty.value,
                }),
            })
                .then((resp) => resp.json())
                .then((data) => {
                    getCartCount();
                    if (data.success) {
                        showAlert(data.success);
                    } else {
                        let alertIcon = document.querySelector(".alert-icon i");
                        alertIcon.classList.add("fa-exclamation-triangle");
                        showAlert(data.error);
                    }
                });
        }
    });
});

// get the total sum of quantity in the cart as cart count
function getCartCount() {
    fetch("/get-carts-count")
        .then((resp) => resp.json())
        .then((data) => {
            cartCount = 0;
            cartItems();
            data.forEach((count) => {
                cartCount += Number(count.product_qty);
                document.querySelector(".cart-qty").innerHTML = cartCount;
            });
        });
}

getCartCount();

// Add to cart functionality with option of using session for guest users

productDetails.addEventListener("click", function (e) {
    if (e.target.classList.contains("p-det-cart")) {
        let productQty =
            e.target.parentNode.parentNode.querySelector("#quantity");
        let id = e.target.parentNode.parentNode.querySelector(".id").value;
        fetch("/add-to-cart/auth-session/" + id, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute("content"),
            },
            body: JSON.stringify({
                product_qty: productQty.value,
            }),
        })
            .then((resp) => resp.json())
            .then((data) => {
                getCartCount();
                if (data.success) {
                    showAlert(data.success);
                } else {
                    let alertIcon = document.querySelector(".alert-icon i");
                    alertIcon.classList.add("fa-exclamation-triangle");
                    showAlert(data.error);
                }
            });
    }
});

function showAlert(msg) {
    let alertBox = document.querySelector(".alert-box");
    let alertMsg = document.querySelector(".alert-msg");
    alertMsg.innerHTML = msg;
    alertBox.classList.add("show");
    setTimeout(() => {
        alertBox.classList.remove("show");
    }, 6000);
}
