(function ($) {
 "use strict";

	/*----------------------------
	 jQuery MeanMenu
	------------------------------ */
	jQuery('nav#dropdown').meanmenu();

	$('[data-toggle="tooltip"]').tooltip();

	$('#sidebarCollapse').on('click', function () {
		 $('#sidebar').toggleClass('active');
	 });
	// Collapse ibox function
	$('#sidebar ul li').on('click', function () {
		var button = $(this).find('i.fa.indicator-mn');
		button.toggleClass('fa-plus').toggleClass('fa-minus');

	});
	/*-----------------------------
		Menu Stick
	---------------------------------*/

	$('#sidebarCollapse').on('click', function () {
		$("body").toggleClass("mini-navbar");
		SmoothlyMenu();
	});
	$(document).on('click', '.header-right-menu .dropdown-menu', function (e) {
		  e.stopPropagation();
	});



})(jQuery);
