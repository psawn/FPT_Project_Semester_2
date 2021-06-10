/*!
    * Start Bootstrap - SB Admin v6.0.2 (https://startbootstrap.com/template/sb-admin)
    * Copyright 2013-2020 Start Bootstrap
    * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
    */
    (function($) {
    "use strict";

    // Add active state to sidbar nav links
    var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
        $("#layoutSidenav_nav .sb-sidenav a.nav-link").each(function() {
            if (this.href === path) {
                $(this).addClass("active");
            }
        });

    // Toggle the side navigation
    $("#sidebarToggle").on("click", function(e) {
        e.preventDefault();
        $("body").toggleClass("sb-sidenav-toggled");
    });
})(jQuery);

		if(document.getElementById("status_active1")){
    		if(document.getElementById("status_active1").value==1) {
    			document.getElementById("status_active1").innerHTML="Không ẩn";
    			document.getElementById("status_active2").innerHTML="Ẩn";
    			document.getElementById("status_active2").value=0;
    		} else {
    			document.getElementById("status_active1").innerHTML="Ẩn";
    			document.getElementById("status_active2").innerHTML="Không ẩn";
    			document.getElementById("status_active2").value=1;
    		}
    	}
