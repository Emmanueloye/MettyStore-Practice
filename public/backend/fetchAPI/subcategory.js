document.addEventListener("DOMContentLoaded", function () {
    let navLists = document.querySelector(".nav-list");
    let category = document.querySelector(".category");

    navLists.addEventListener("change", function () {
        let id = navLists.value;
        if (id) {
            fetch("/admin/get-category/ajax/" + id)
                .then((resp) => resp.json())
                .then((data) => {
                    category.innerHTML = "";
                    for (i = 0; i < data.length; i++) {
                        let option = document.createElement("option");
                        option.text = data[i].category_name;
                        option.value = data[i].id;
                        category.append(option);
                    }
                });
        }
    });
});
