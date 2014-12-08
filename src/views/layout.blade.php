<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AltWallets</title>

    <link rel="stylesheet" href="/packages/virtualvendors/altwallets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/packages/virtualvendors/altwallets/css/style.css"/>
    <link rel="stylesheet" href="/packages/virtualvendors/altwallets/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="http://dannenga.com/logo.css"/>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    @yield('styles')
  </head>
  <body>

    <div class="navbar navbar-fixed-top bs-docs-nav" role="banner">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
			
            <span class="icon-bar"></span>
          </button>
          <!--<a class="navbar-brand" href="/"></a>-->
		  
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          @include('altwallets::partials.nav')
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </div>

	<header>
    <div class="container">
      <div class="row">

        <!-- Logo section -->
        <div class="col-md-4">
          <!-- Logo. -->
          <div class="logo">
            <h1><a href="/">Alt<span class="bold">Wallets</span></a></h1>
            <p class="meta">Keeping your coins safe</p>
          </div>
          <!-- Logo ends -->
        </div>

       <div class="col-md-4">
	   </div>
        <!-- Data section -->

        <div class="col-md-4">
          <div class="header-data"> 
		  

            <!-- Traffic data -->
            <div class="hdata">
              <div class="mcol-left">
                <!-- Icon with red background -->
                <i class="fa fa-btc bred"></i> 
              </div>
              <div class="mcol-right">
                <!-- Number of visitors -->
                <p>{{ $markets['data']->markets->bitstamp->value  }} <em>USD</em></p>
              </div>
              <div class="clearfix"></div>
            </div>

            <!-- Members data -->
            <div class="hdata">
              <div class="mcol-left">
                <!-- Icon with blue background -->
                <i class="fa fa-user bblue"></i> 
              </div>
              <div class="mcol-right">
                <!-- Number of visitors -->
                <p>{{ $markets['data']->markets->btce->value  }} <em>USD</em></p>
              </div>
              <div class="clearfix"></div>
            </div>

            <!-- revenue data -->
            <div class="hdata">
              <div class="mcol-left">
                <!-- Icon with green background -->
                <i class="fa fa-money bgreen"></i> 
              </div>
              <div class="mcol-right">
                <!-- Number of visitors -->
                <p>{{  $markets['data']->markets->coinbase->value  }}<em>USD</em></p>
				
              </div>
              <div class="clearfix"></div>
            </div>                        

          </div>
        </div>

      </div>
    </div>
  </header>
	
    <div class="container">
      @if(Session::has('flash_message'))
        <div class="alert alert-{{Session::get('flash_level', 'info')}}">
          {{Session::get('flash_message')}}
        </div>
      @endif

      @yield('content')
    </div>

    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="text-right">
            Made by <a class="dannenga" href="http://dannenga.com" target="_blank">dannenga., LLC</a>
          </div>
        </div>
      </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    @yield('scripts')
  </body>
</html>
