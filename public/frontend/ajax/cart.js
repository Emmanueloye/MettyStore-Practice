let cartHolder = document.querySelector(".cart-items");

// fetch cart items from the backend
async function getCartsItems() {
    return await fetch("/get-carts-items")
        .then((resp) => resp.json())
        .then((data) => data);
}

// insert cart items in frontend
async function cartItems() {
    let carts = await getCartsItems();
    let cartItems = document.querySelector(".cart-items");
    let grandTotal = document.querySelector("#cart-total");
    let nf = new Intl.NumberFormat();
    let totalPrice = 0;
    let cartCount = 0;
    cartItems.innerHTML = "";
    carts.cartItems.forEach((cart) => {
        // calculate number of products in cart
        cartCount += Number(cart.product_qty);

        let sellingPrice;
        if (cart.product.discount_price === null) {
            sellingPrice = cart.product.selling_price;
        } else {
            sellingPrice = cart.product.discount_price;
        }
        let cartHTML = ` 
        <div class="cart-card row">
        <input type="hidden" class="id" value="${cart.id}">
        <div class="cart-image">
          <img src="${cart.product.product_image}" alt="Product Image " />
        </div>
        <div class="cart-info">
          <div class="cart-name">
            <a href="productDetails.html" class="cart-product-name"
              >${cart.product.product_name}</a
            >
          </div>
          <div class="review">
            <span><i class="fas fa-star"></i></span>
            <span><i class="fas fa-star"></i></span>
            <span><i class="fas fa-star"></i></span>
            <span><i class="fas fa-star"></i></span>
            <span><i class="fas fa-star"></i></span>
            <span class="remark">(5 Reviews)</span>
          </div>
          <p class="cart-product-type">${cart.product.product_color}</p>
        </div>
        <div class="cart-qty">
          <label for="qty-input">Quantity</label>
          <div class="btn-flex">
          ${
              cart.product_qty > 1
                  ? `<button class="btn-decrease">-</button>`
                  : `<button class="btn-decrease" disabled>-</button>`
          }
                   
          <input
            type="text"
            value="${cart.product_qty}"
            min="1"
            max="10"
            id="qty-input"
            class="form-input form-qty" disabled
          />
          <button class="btn-increase">+</button>
          </div>
        </div>
        <div class="cart-price">
        <span class="price-label">Price</span>
       <span class="offer-price">₦${nf.format(sellingPrice)}</span>
          
        </div>
        <div class="cart-sub-total">
          <span class="sub-total-label">Subtotal</span>
          <span class="sub-total">₦${nf.format(
              sellingPrice * cart.product_qty
          )}</div>
        <div class="cart-action">
          <a href="#" class="btn shopping-cart-btn">Check Out</a>
          <button class="btn cart-remove">X</button>
        </div>
      </div>`;
        cartItems.insertAdjacentHTML("beforeend", cartHTML);

        document.querySelector(".cart-count").innerHTML = cartCount;
    });
    grandTotal.innerHTML = nf.format(carts.totalAmount);
}

cartItems();

// delete cart items without reloading the page
cartHolder.addEventListener("click", function (e) {
    if (e.target.classList.contains("cart-remove")) {
        let id = e.target.parentNode.parentNode.querySelector(".id").value;

        fetch("/delete-cart-item/" + id)
            .then((resp) => resp.json())
            .then((data) => {
                cartItems();
                getCartCount();
                window.history.go();
            });
    }
});

// Increase cart quantity on click
cartHolder.addEventListener("click", function (e) {
    if (e.target.classList.contains("btn-increase")) {
        let id =
            e.target.parentNode.parentNode.parentNode.querySelector(
                ".id"
            ).value;
        fetch("/cart-increment/" + id)
            .then((resp) => resp.json())
            .then((data) => {
                cartItems();
                getCartCount();
            });
    }
});

// Decrease cart quantity on click
cartHolder.addEventListener("click", function (e) {
    if (e.target.classList.contains("btn-decrease")) {
        let id =
            e.target.parentNode.parentNode.parentNode.querySelector(
                ".id"
            ).value;
        fetch("/cart-decrement/" + id)
            .then((resp) => resp.json())
            .then((data) => {
                cartItems();
                getCartCount();
            });
    }
});
