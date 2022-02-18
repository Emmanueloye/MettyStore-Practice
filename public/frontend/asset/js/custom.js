$(document).ready(function () {
  $(".owl-carousel").owlCarousel({
    dots: false,
    addClassActive: false,
    nav: true,
    navText: [
      '<div class="owl-prev"><i class="fas fa-angle-left"></i></div>',
      '<div class="owl-next"><i class="fas fa-angle-right"></i></div>',
    ],
    responsive: {
      0: {
        items: 1,
        dots: true,
      },
      768: {
        items: 2,
      },
      1024: {
        items: 3,
      },
      1200: {
        items: 4,
      },
      1290: {
        items: 5,
      },
    },
  });
});

// window.addEventListener("load", function () {
//   [].forEach.call(document.querySelectorAll(".glider"), function (ele) {
//     ele.addEventListener("glider-slide-visible", function (event) {
//       var glider = Glider(this);
//       console.log("Slide Visible %s", event.detail.slide);
//     });
//     ele.addEventListener("glider-slide-hidden", function (event) {
//       console.log("Slide Hidden %s", event.detail.slide);
//     });
//     ele.addEventListener("glider-refresh", function (event) {
//       console.log("Refresh");
//     });
//     ele.addEventListener("glider-loaded", function (event) {
//       console.log("Loaded");
//     });
//     new Glider(ele, {
//       slidesToScroll: 1,
//       slidesToShow: 4,
//       draggable: true,
//       dots: ".dots",
//       arrows: {
//         prev: ele.querySelectorAll(".glider-prev"),
//         next: ele.querySelectorAll(".glider-prev"),
//       },
//       responsive: [
//         {
//           // screens greater than >= 0px
//           breakpoint: 0,
//           settings: {
//             // Set to `auto` and provide item width to adjust to viewport
//             slidesToShow: 1,
//             slidesToScroll: 1,
//           },
//         },
//         {
//           // screens greater than >= 775px
//           breakpoint: 150,
//           settings: {
//             // Set to `auto` and provide item width to adjust to viewport
//             slidesToShow: 1,
//             slidesToScroll: 1,
//           },
//         },
//         {
//           // screens greater than >= 775px
//           breakpoint: 530,
//           settings: {
//             // Set to `auto` and provide item width to adjust to viewport
//             slidesToShow: 1,
//             slidesToScroll: 1,
//           },
//         },
//         {
//           // screens greater than >= 775px
//           breakpoint: 768,
//           settings: {
//             // Set to `auto` and provide item width to adjust to viewport
//             slidesToShow: 2,
//             slidesToScroll: 1,
//           },
//         },
//         {
//           // screens greater than >= 1024px
//           breakpoint: 1024,
//           settings: {
//             slidesToShow: 3,
//             slidesToScroll: 1,
//           },
//         },
//         {
//           // screens greater than >= 1280px
//           breakpoint: 1200,
//           settings: {
//             slidesToShow: 4,
//             slidesToScroll: 1,
//           },
//         },
//       ],
//     });
//   });
// });
