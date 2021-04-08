<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>@yield('title')</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="{{ asset('kuro-small.png') }}" type="image/x-png"/>

	<!-- Fonts and icons -->
	<script src="{{ asset('admin/js/plugin/webfont/webfont.min.js') }}"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['{{ asset("admin/css/fonts.min.css") }}']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="{{ asset('admin/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('admin/css/atlantis.min.css') }}">

</head>
<body data-background-color="dark">
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			@include('anggota.layouts.header.logo')
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			@include('anggota.layouts.header.navbar')
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
        @include('anggota.layouts.others.sidebar')
		<!-- End Sidebar -->
        <div class="main-panel">
            <div class="content">
                @yield('content')
            </div>
            @include('anggota.layouts.others.footer')
        </div>
		
	</div>
	<!--   Core JS Files   -->
	<script src="{{ asset('admin/js/core/jquery.3.2.1.min.js') }}"></script>
	<script src="{{ asset('admin/js/core/popper.min.js') }}"></script>
	<script src="{{ asset('admin/js/core/bootstrap.min.js') }}"></script>

	<!-- jQuery UI -->
	<script src="{{ asset('admin/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
	<script src="{{ asset('admin/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}"></script>

	<!-- jQuery Scrollbar -->
	<script src="{{ asset('admin/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>


	<!-- Chart JS -->
	<script src="{{ asset('admin/js/plugin/chart.js/chart.min.js') }}"></script>

	<!-- jQuery Sparkline -->
	<script src="{{ asset('admin/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>

	<!-- Chart Circle -->
	<script src="{{ asset('admin/js/plugin/chart-circle/circles.min.js') }}"></script>

	<!-- Datatables -->
	<script src="{{ asset('admin/js/plugin/datatables/datatables.min.js') }}"></script>

	<!-- Bootstrap Notify -->
	<script src="{{ asset('admin/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

	<!-- jQuery Vector Maps -->
	<script src="{{ asset('admin/js/plugin/jqvmap/jquery.vmap.min.js') }}"></script>
	<script src="{{ asset('admin/js/plugin/jqvmap/maps/jquery.vmap.world.js') }}"></script>

	<!-- Sweet Alert -->
	<script src="{{ asset('admin/js/plugin/sweetalert/sweetalert.min.js') }}"></script>

	<!-- Atlantis JS -->
	<script src="{{ asset('admin/js/atlantis.min.js') }}"></script>
    {{-- <script src="{{ asset('admin/js/demo.js') }}"></script> --}}

    @yield('script')
	@if (session('status') == 'success')
    	<script>
			const message = '{{ session("message") }}';
			swal(message, {
				icon: 'success',
				buttons : {
					confirm : {
						className: 'btn btn-success'
					}
				}
			});
		</script>
	@endif
    @if (session('status') == 'error')
		<script>
			const message = '{{ session("message") }}';
			swal(message, {
				icon: 'error',
				buttons : {
					confirm : {
						className: 'btn btn-success'
					}
				}
			});
		</script>
	@endif

</body>
</html>