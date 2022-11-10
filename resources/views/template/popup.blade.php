<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LABRAD | {{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/css/app.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <style>
      .nav-tabs .nav-item .nav-link.active {
            color:#C31430;
          }

      .nav-tabs .nav-item .nav-link{
            color:#ffffff;
          }
          .smol {
              width: 50px;
              height: 25px;
          }
          
        .hid {
          display: none
        }
        
        .modal-backdrop{
      --bs-backdrop-bg: #ffffff;
      --bs-backdrop-opacity: 0;
     }
              
     

     body{
      zoom: 95%
     }

     .pilih{
      background-color: #59A4FF;
     
     
      
     }

     .btnac{

      outline: none;

      border-right: 1px solid #000;

      border-bottom: 1px solid #000;

      background-color: #ffffff;

      }

      .btndc{

        outline: none;

        border: none

        }
     
     
    </style>
    
  </head>
  <body style="background-color: #ddd; overflow-x:hidden">

    <div>
      
        @yield('navigate')
  
    </div>

   

    <div>
         @yield('body')
    </div>
        
  

    <div>
      @yield('script')
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </div>
  </body>
</html>