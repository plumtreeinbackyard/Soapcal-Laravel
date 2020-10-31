<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A cold process soapmaking calculator">
    <meta name="author" content="InterestingOnes">
    <link rel="icon" href="../../favicon.ico">

    <title>SoapCal - A soapmaking calculator</title>
        
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Encode+Sans" rel="stylesheet">
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        
    <!-- Include the plugin's CSS and JS: -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">
    
    <script src="/js/bootstrap-select.js"></script>
    <!-- Custom styles for this template -->
    <link href="/css/bootstrap-select.css" rel="stylesheet">    
    <link href="/css/app.css" rel="stylesheet">
    
    <!-- reCAPTCHA  -->
    <script src='https://www.google.com/recaptcha/api.js'></script>
  </head>

  <body>
  
    @include('layouts.header')
       

    @yield('content')        
    
      
    @include('layouts.footer')
            
  </body>
</html>
