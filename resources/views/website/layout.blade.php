<!DOCTYPE html>
<html lang="en">

	<head>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="x-ua-compatible" content="ie=edge">

		<title>Supermarket - Neoncart HTML5 Template</title>

        <!-- css - start
		================================================== -->
            @include('website.partials.css')
        <!-- css - end
		================================================== -->

	</head>


	<body class="home_supermarket">


		<!-- backtotop - start -->
		<div id="thetop"></div>
		<div class="backtotop bg_supermarket_red">
			<a href="#" class="scroll">
				<i class="far fa-arrow-up"></i>
			</a>
		</div>
		<!-- backtotop - end -->

		<!-- preloader - start -->
		<!-- <div id="preloader"></div> -->
		<!-- preloader - end -->


		<!-- header_section - start
		================================================== -->
			@include('website.partials.header')
		<!-- header_section - end 
		================================================== -->


		<!-- main body - start
		================================================== -->
		<main>


			@yield('content')


		</main>
		<!-- main body - end
		================================================== -->


		<!-- footer_section - start
		================================================== -->
			@include('website.partials.footer')
		<!-- footer_section - end
		================================================== -->


        <!-- js - start
		================================================== -->
            @include('website.partials.js')
        <!-- js - end
		================================================== -->

	</body>
</html>
