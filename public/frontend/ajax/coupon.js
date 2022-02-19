let applyCoupon = document.querySelector(".btn-apply");
let couponCode = document.querySelector(".form-coupon");

function getCoupon() {
    fetch("/get-coupon")
        .then((resp) => resp.json())
        .then((data) => {
            cartItems();
            let cartTotalSec = document.querySelector(".cart-total-cal");
            let nf = Intl.NumberFormat();
            if (data.noCouponTotal) {
                cartTotalSec.innerHTML = `<div class="total-cal">
                <span class="total-label">Total:</span>
                <span class="total">₦<strong class="total" id="cart-total">${nf.format(
                    data.noCouponTotal
                )}</strong></span>
            </div>`;
            } else {
                cartTotalSec.innerHTML = `   <div class="total-cal">
                <span class="total-label">Total:</span>
                <span class="total">₦${nf.format(data.total)}</span>
              </div>
              <div class="total-cal">
                <span class="total-label">Discount:</span>
                <span class="total">₦${nf.format(data.coupon_discount)}</span>
              </div>
              <div class="total-cal">
                <span class="total-label">Grand total:</span>
                <span class="total">₦${nf.format(data.grandTotal)}</span>
              </div>
              <div class="total-cal">
                <span class="total-label">${data.coupon_code}</span>
                <button class="btn btn-coupon">X</button>
              </div>`;
            }
        });
}

getCoupon();
// document.addEventListener("DOMContentLoaded", function () {});

applyCoupon.addEventListener("click", function () {
    fetch("/apply-coupon", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
        },
        body: JSON.stringify({
            coupon_code: couponCode.value,
        }),
    })
        .then((resp) => resp.json())
        .then((data) => {
            getCoupon();
            if (data.success) {
                showAlert(data.success);
            } else {
                let alertIcon = document.querySelector(".alert-icon i");
                alertIcon.classList.add("fa-exclamation-triangle");
                showAlert(data.error);
            }
        });
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
