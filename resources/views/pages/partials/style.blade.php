{{-- Load fonts --}}
<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
<script>
    WebFont.load({
        google: {"families":["Poppins:300,400,500,600,700"]},
        active: function() {
            sessionStorage.fonts = true;
        }
    });
</script>

<style type="text/css">
	.cursor-default {
		cursor: default;
	}

	.cursor-pointer {
		cursor: pointer;
	}

	.empty-state svg {
	    width: 180px;
	    height: 180px;
	}

	.profile-pic{
		width: 80px; 
		height: 80px;
	}

	.border-blue{
		border-color: blue !important;
	}
</style>
{{-- begin:: Global Mandatory Vendors --}}
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link href="{{asset('assets/vendors/general/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/vendors/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/vendors/general/tether/dist/css/tether.css') }}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/vendors/general/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css') }}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/vendors/general/bootstrap-datetime-picker/css/bootstrap-datetimepicker.css') }}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/vendors/general/bootstrap-timepicker/css/bootstrap-timepicker.css') }}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/vendors/general/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css') }}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/vendors/general/bootstrap-select/dist/css/bootstrap-select.css') }}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/vendors/general/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css') }}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/vendors/general/select2/dist/css/select2.css') }}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/vendors/general/ion-rangeslider/css/ion.rangeSlider.css') }}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/vendors/general/nouislider/distribute/nouislider.css') }}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/vendors/general/owl.carousel/dist/assets/owl.carousel.css') }}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/vendors/general/owl.carousel/dist/assets/owl.theme.default.css') }}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/vendors/general/dropzone/dist/dropzone.css') }}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/vendors/general/summernote/dist/summernote.css') }}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/vendors/general/bootstrap-markdown/css/bootstrap-markdown.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/vendors/general/animate.css/animate.css') }}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/vendors/general/toastr/build/toastr.css') }}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/vendors/general/morris.js/morris.css') }}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/vendors/general/sweetalert2/dist/sweetalert2.css') }}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/vendors/custom/vendors/fontawesome5/css/all.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/vendors/general/socicon/css/socicon.css') }}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/vendors/custom/vendors/line-awesome/css/line-awesome.css') }}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/vendors/custom/vendors/flaticon/flaticon.css') }}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/vendors/custom/vendors/flaticon2/flaticon.css') }}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/demo/demo5/base/style.bundle.css') }}" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="{{asset('assets/media/logos/favicon1.ico')}}" />
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<link href="{{asset('assets/profile-css.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/b-1.6.1/b-flash-1.6.1/b-print-1.6.1/datatables.min.css"/>
<style>
	* {
		margin: 0;
		padding: 0;
	}
	html {
		line-height: 1.2;
		box-sizing: border-box;
	}
	*, *::after, *::before {
		box-sizing: inherit;
	}

	#kt_quick_panel_toggler_btn{
		position: relative;
	}

	.notification-box {
		position: absolute;
		left: 1px;
		top: 0px;
		z-index: 99;
		width: 20px;
		height: 20px;
		text-align: center;
	}
	.notification-bell {
		animation: bell 1s 1s both infinite;
	}
	.notification-bell * {
		display: block;
		margin: 0 auto;
		background-color: #050046;
		box-shadow: 3px 3px 5px #707bcf;
	}
	.bell-top {
		width: 3px;
		height: 3px;
		border-radius: 3px 3px 0 0;
	}
	.bell-middle {
		width: 15px;
		height: 15px;
		margin-top: -1px;
		border-radius: 12.5px 12.5px 0 0;
	}
	.bell-bottom {
		position: relative;
		z-index: 0;
		width: 16px;
		height: 1px;
	}
	.bell-bottom::before, .bell-bottom::after {
		content: '';
		position: absolute;
		top: -4px;
	}
	.bell-bottom::before {
		left: 1px;
		border-bottom: 4px solid #fff;
		border-right: 0 solid transparent;
		border-left: 4px solid transparent;
	}
	.bell-bottom::after {
		right: 1px;
		border-bottom: 4px solid #fff;
		border-right: 4px solid transparent;
		border-left: 0 solid transparent;
	}
	.bell-rad {
		width: 4px;
		height: 2px;
		margin-top: 2px;
		border-radius: 0 0 4px 4px;
		animation: rad 1s 2s both infinite;
	}
	.notification-count {
		position: absolute;
		z-index: 1;
		top: -6px;
		right: -6px;
		width: 18px;
		height: 18px;
		line-height: 18px;
		font-size: 12px;
		font-weight: bolder;
		border-radius: 50%;
		background-color: #ff4927;
		color: #fff;
		animation: zoom 3s 3s both infinite;
	}
	@keyframes bell {
		0% { transform: rotate(0); }
		10% { transform: rotate(30deg); }
		20% { transform: rotate(0); }
		80% { transform: rotate(0); }
		90% { transform: rotate(-30deg); }
		100% { transform: rotate(0); }
	}
	@keyframes rad {
		0% { transform: translateX(0); }
		10% { transform: translateX(6px); }
		20% { transform: translateX(0); }
		80% { transform: translateX(0); }
		90% { transform: translateX(-6px); }
		100% { transform: translateX(0); }
	}
	@keyframes zoom {
		0% { opacity: 0; transform: scale(0); }
		10% { opacity: 1; transform: scale(1); }
		50% { opacity: 1; }
		51% { opacity: 0; }
		100% { opacity: 0; }
	}
	.hide-notification{
		display: none !important;
	}
</style>
@notifyCss