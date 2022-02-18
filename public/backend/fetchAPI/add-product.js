document.addEventListener("DOMContentLoaded", function () {
    let navLists = document.querySelector(".nav-list");
    let category = document.querySelector(".category");
    let subCategory = document.querySelector("#SubCategory");
    let imageFile = document.querySelector(".p-image");
    let imagePreview = document.querySelector(".img-preview");

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

    category.addEventListener("change", function () {
        let id = category.value;
        if (id) {
            fetch("/admin/get-subcategory/ajax/" + id)
                .then((resp) => resp.json())
                .then((data) => {
                    subCategory.innerHTML = "";
                    for (i = 0; i < data.length; i++) {
                        let option = document.createElement("option");
                        option.text = data[i].subcategory_name;
                        option.value = data[i].id;
                        subCategory.append(option);
                    }
                });
        }
    });

    imageFile.addEventListener("change", function (e) {
        // document.querySelector(".prev-text").style.display = "none";
        let reader = new FileReader();
        reader.addEventListener("load", function (e) {
            imagePreview.style.display = "block";
            imagePreview.src = reader.result;
        });
        reader.readAsDataURL(e.target.files[0]);
    });
});

window.addEventListener("load", function () {
    if (window.File && window.FileList && window.FileReader) {
        let imageFiles = document.querySelector(".multi-img");
        imageFiles.addEventListener("change", function (e) {
            let files = e.target.files;
            let preview = document.querySelector(".multi-img-show");
            for (i = 0; i < files.length; i++) {
                let file = files[i];
                if (!file.type.match("image")) continue;
                let reader = new FileReader();
                reader.addEventListener("load", function (e) {
                    let image = new Image();
                    image.width = 60;
                    image.height = 60;
                    image.src = this.result;
                    preview.style.display = "block";
                    preview.appendChild(image);
                });
                reader.readAsDataURL(file);
            }
        });
    } else {
        alert("Your browser does not support File API");
    }
});
