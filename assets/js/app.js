$(document).foundation();

$(document).ready(function(){

    // toggle dropdowns clicks
    $(".toggle").click(function() {
        toggleDropdown($(this));
    });

    // toggle mobile menu
    $(".top-openmobile").click(function() {
        toggleMobileMenu();
    });

    calculateShoppingDropdown();

    // fire owl carousel if present
    if ($(".owl-carousel.products")) {
        $(".owl-carousel.products").owlCarousel({
            "items" : 4
        });
    }
    if ($(".owl-carousel.brands")) {
        $(".owl-carousel.brands").owlCarousel({
            items: 6,
            itemsDesktop : [1199,6],
            itemsDesktopSmall : [980,6],
            itemsTablet: [768,4],
            itemsMobile : [479,2],
            autoPlay: true,

        });
    }
    if ($(".owl-carousel.deals")) {
        $(".owl-carousel.deals").owlCarousel({
            navigation : true, // Show next and prev buttons
            slideSpeed : 200,
            paginationSpeed : 750,

            items: 2,
            itemsDesktop : [1199,2],
            itemsDesktopSmall : [980,2],
            itemsTablet: [768,2],
            itemsMobile : [479,1],

            autoPlay: true
        });
    }

});

$(window).resize(function(){
   calculateShoppingDropdown();
});

$(document).mouseup(function(e) {
    var container1 =  $(".toggle");
    var container2 =  $(".dropdown-container");

    if (!container1.is(e.target) // if the target of the click isn't the container...
        && container1.has(e.target).length === 0 // ... nor a descendant of the container
        && !container2.is(e.target) // if the target of the click isn't the container...
        && container2.has(e.target).length === 0){ // ... nor a descendant of the container
        closeDropdowns();
    }
});

/*
Shows dropdown on toggle within clicked element
 */
function toggleDropdown(element) {
    var container = element.siblings(".dropdown-container");
    if (container.is(':visible')){
        closeDropdowns(container);
    }
    else {
        closeDropdowns(container);
        $(container).fadeIn(150);
    }
}

function closeDropdowns(){
    // close other dropdowns
    $(".dropdown-container").fadeOut(150);
}

function toggleMobileMenu() {
    $(".topmenu-sub").slideToggle("fast", function(){});
}

function calculateShoppingDropdown() {
    var maxWidth = 1200;
    var currentWidth = $(document).width();
    var rest = 0;
    var rightPosition = 15;
    if (currentWidth > maxWidth) {
        rest = currentWidth - maxWidth;
        rightPosition += rest/2;
    }
    $(".shoppingbag-container").css("right", rightPosition+"px");
}

