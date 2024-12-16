let nav = document.querySelector(".navbar");
window.onscroll = function (){
    if(document.documentElement.scrollTop > 20){
        nav.classList.add("header-scrolled");
    }else{
        nav.classList.remove("header-scrolled");
    }
};

//Testimonial-slider
$('.testimonial-slider').owlCarousel({
    loop:true,
    margin:10,
    nav:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:3
        }
    }
  });


  //Trusted-slider
$('.trusted-slider').owlCarousel({
    loop:true,
    margin:10,
    nav:false,
    autoplay:true,
    responsive:{
        0:{
            items:2
        },
        600:{
            items:2
        },
        1000:{
            items:7
        }
    }
  });


  AOS.init({
    duration: 2000,
    offset: 100,
});


 // Testimonials carousel testimonial-page
 $('.testimonials-carousel').owlCarousel({
    loop: true,
    margin: 10,
    nav: true,
    navText : [
        '<i class="fas fa-long-arrow-alt-left"></i>',
        '<i class="fas fa-long-arrow-alt-right"></i>'
    ],
    autoplay: true,              
    autoplayTimeout: 3000,      
    autoplayHoverPause: true, 
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 1
        },
        1000: {
            items: 1
        }
    }
});


$('.productdetails-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
});


// Ajax-loading

jQuery(document).ready(function ($) {
    // When the "Buy Now" button is clicked
    $('body').on('click', '.ajax_add_to_cart', function (e) {
        var $button = $(this);
        
        // Add a loading class and change button text to "Adding..."
        $button.addClass('loading').html('<i class="fas fa-spinner fa-spin"></i> Adding...');
    });
  
    // When the AJAX request is complete and the cart is updated
    $(document.body).on('added_to_cart', function () {
        // Remove the loading state and restore button text
        $('.ajax_add_to_cart.loading').removeClass('loading').text('Buy Now');
    });
  });