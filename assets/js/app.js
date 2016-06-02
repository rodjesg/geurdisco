$(document).foundation();

$(document).ready(function(){

    // show mobile search dropdown
    $(".toggle").click(function() {
        toggleDropdown($(this));
    });
});


/*
Shows dropdown on toggle within clicked element
 */
function toggleDropdown(element) {
    var container = element.siblings(".dropdown-container");
    if (container.hasClass("activated")){
        closeDropdowns(container);
    }
    else {
        closeDropdowns(container);
        $(container).addClass("activated");
    }
}

function closeDropdowns(){
    // close other dropdowns
    $(".dropdown-container").removeClass("activated");
}

$(document).mouseup(function (e)
{
    var container =  $(".toggle");

    if (!container.is(e.target) // if the target of the click isn't the container...
        && container.has(e.target).length === 0) // ... nor a descendant of the container
    {
        closeDropdowns();
    }
});
