'use strict';
$(document).ready(function(){
    
    setNavigation();
    
    function setNavigation() {
        var path = window.location.pathname;
        $("#main_menu a").each(function () {
            var href = $(this).attr('href');
            if (path.substring(1, path.length) === href.substring(0, href.length)) {
                $("#main_menu li").removeClass('active');
                $(this).closest('li').addClass('active');
            }
        });
        
        if(path.substring(1, path.length) <= 1){
            $('#main_menu li').removeClass('active');
            $('#main_menu li').first().addClass('active');
        }
    }
    
});