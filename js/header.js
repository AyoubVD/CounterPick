$('[data-toggle=popover]').popover({placement: function() {
    if($('.navbar-inverse').hasClass('affix-top')) {
            console.log("top");                    
            return 'top';
        }
        else {
            console.log("bottom");
            return 'bottom';
        }
    }                
});