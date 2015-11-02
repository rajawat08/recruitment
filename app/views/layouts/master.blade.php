<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Rajawat">
    <meta name="keyword" content="">
	
	<title> Administrator </title>
	
    {{ style('css/bootstrap.min.css') }}
    {{ style('css/bootstrap-reset.css') }}
    {{style('assets/font-awesome/css/font-awesome.css')}}
    {{style('assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css')}}
    {{ style('css/owl.carousel.css') }}
    {{ style('css/style.css') }}
    {{ style('css/style-responsive.css') }}
	
	@yield('style')

</head>
<body class="boxed-page">
  
	
	
	
	<div class="container">
    <section id="container" class="">
    @if(Auth::check() && Auth::user()->isAdmin())
    @include('partials.header')
    @endif

  
		@yield('content')
    </section>
	</div>

	
  
    {{ script('js/jquery.js') }}
    {{ script('js/jquery-1.8.3.min.js') }}
    {{ script('js/bootstrap.min.js') }}
    {{ script('js/all.js') }}
    {{ script('js/jquery.dcjqaccordion.2.7.js')}}
    {{ script('js/jquery.scrollTo.min.js')}}
    {{ script('js/jquery.nicescroll.js') }}
    {{ script('js/jquery.sparkline.js') }}
    {{ script('assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js') }}
    {{ script('js/owl.carousel.js') }}
    {{ script('js/jquery.customSelect.min.js')}}
    {{ script('js/respond.min.js')}}
    {{ script('js/common-scripts.js') }}
    {{ script('js/sparkline-chart.js') }}
    {{ script('js/easy-pie-chart.js') }}
    {{ script('js/count.js') }}
    {{ script('js/jquery.dcjqaccordion.2.7.js')}}
    {{ script('js/jquery.scrollTo.min.js')}}
    <script>

      //owl carousel

      $(document).ready(function() {
          $("#owl-demo").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true,
			  autoPlay:true

          });
      });

      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>
	@yield('script')
</body>
</html>