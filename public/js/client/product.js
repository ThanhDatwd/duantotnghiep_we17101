$(document).ready(function(){
    $('.image-slider').slick({
        infinite: true,
        slidesToShow: 2,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        arrows: true,
        prevArrow:"<button type='button' class='slick-prev pull-left'><i class='fa-solid fa-chevron-left'></i></button>",
        nextArrow:"<button type='button' class='slick-next pull-right'><i class='fa-solid fa-chevron-right'></i></button>"   
    });
  
  });
 const selectTitles=document.querySelectorAll(".select-title")
 selectTitles.forEach(element => {
  element.onclick=()=>{
    element.classList.toggle("active")
  }
 });
//   --------------product2-----------
