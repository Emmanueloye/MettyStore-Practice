let tableBody = document.querySelector(".t-body");

tableBody.addEventListener("click", function (e) {
    if (e.target.classList.contains("deactivate")) {
        let id = e.target.parentNode.parentNode.querySelector(".id").value;
        console.log(id);
        fetch("/deactivate-coupon/" + id, {
            method: "GET",
            headers: {
                "Content-Type": "application/json",
            },
        })
            .then((resp) => resp.json())
            .then((data) => {
                console.log(data);
                window.history.go();
            });
    }
});
