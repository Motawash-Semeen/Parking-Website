
$(".verticalCarousel").verticalCarousel({
    currentItem: 1,
    showItems: 5,

});
 $(function () {
     SyntaxHighlighter.all();
 });
 $(window).load(function () {
     $('.flexslider').flexslider({
         animation: "slide",
         controlNav: "thumbnails",
         start: function (slider) {
             $('body').removeClass('loading');
         }
     });
 });







 var icons = {
     header: "ui-icon-circle-plus",
     activeHeader: "ui-icon-circle-minus"
 };
 $("#accordion").accordion({
     icons: icons
 });

 const counterUp = window.counterUp.default;

 const callback = (entries) => {
     entries.forEach((entry) => {
         const el = entry.target;
         if (entry.isIntersecting && !el.classList.contains("is-visible")) {
             counterUp(el, {
                 duration: 2000,
                 delay: 16
             });
             el.classList.add("is-visible");
         }
     });
 };
 
 const IO = new IntersectionObserver(callback, { threshold: 1 });
 
 const el = document.querySelector(".counter-download");
 IO.observe(el);
 const el2 = document.querySelector(".counter-install");
 IO.observe(el2);
 const el3 = document.querySelector(".counter-user");
 IO.observe(el3);
 
