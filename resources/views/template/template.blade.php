<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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

          body{
      zoom: 90%
     }

     .modal-backdrop{
      --bs-backdrop-bg: #ffffff;
      --bs-backdrop-opacity: 0;
     }

     .pilih{
      background-color: #59A4FF;
      
     }
    
    </style>
    
  </head>
  <body style="background-color: #ddd;  height:150%; overflow-x:hidden">

    <div class="sticky-top">
      @include('template.navbar')
      <div class="pb-1 pt-1  border-bottom" style="background-color: #97B903;">
          @yield('container')
      </div>

    </div>
      
    
       <div >
          @yield('navigate')
      </div>

      <div style="overflow: hidden;">
          @yield('body')
      </div>
   

   
        
   
      <footer>
        <div class="sticky-bottom container-fluid border-top border-dark" style="position: fixed; background-color: rgb(161, 161, 161);">
            <div class="row p-1 pb-1">
                <div class="col-auto border-end text-center">
                    <img src="{{ url('/img/others/test koneksi.png') }}" alt="" height="15" width="15">
                    <small>
                        <?php
                            try {
                                \DB::connection()->getPDO();
                                echo 'Terhubung';
                                } catch (\Exception $e) {
                                echo 'Tidak Terhubung';
                            }
                        ?>
                    </small> 
                </div>
                <div class="col-1 border-end text-center">
                  <div id="clock"></div>
                </div>
                <div class="col-2 border-end text-center">
                    <img src="{{ url('/img/others/date_1.png') }}" alt="" height="20">
                    <small>
                        @php
                            $mytime = Carbon\Carbon::now();
                            echo $mytime->toFormattedDateString();
                        @endphp 
                    </small>
                </div>
    
                @auth
                <div class="col-2 border-end text-center" >
                    <small>
                        User Login : {{ auth()->user()->nama }}
                    </small> 
                </div>
            @endauth
            </div>
        </div>
      </footer>
    <div>
      @yield('script')
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </div>
    <script>
      setInterval(showTime, 1000);
            function showTime() {
                let time = new Date();
                let date = time.getDate();
                let month = time.getMonth() + 1;
                let year = time.getFullYear();
                let hour = time.getHours();
                let min = time.getMinutes();
                let sec = time.getSeconds();
                am_pm = "AM";
            
                if (hour > 12) {
                    hour -= 12;
                    am_pm = "PM";
                }
                if (hour == 0) {
                    hr = 12;
                    am_pm = "AM";
                }
            
                hour = hour < 10 ? "0" + hour : hour;
                min = min < 10 ? "0" + min : min;
                sec = sec < 10 ? "0" + sec : sec;
                month = month < 10 ? "0" + month : month;
                date = date < 10 ? "0" + date : date;
            
                let currentTime = 
                // year + '-' + month + '-' + date + ' ' +
                 hour + ":" + min + ":" + sec + am_pm;
            
                document.getElementById("clock")
                        .innerHTML = currentTime;
            }
            showTime();
    </script>
  </body>
</html>