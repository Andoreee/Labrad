<nav class="navbar navbar-dark navbar-expand-lg bg-danger">

    <div class="container-fluid">

     

      <div class="collapse navbar-collapse" id="navbarNav">

        <ul class="nav nav-tabs ">

          <li class="nav-item  ">

            <a class="nav-link text-dark {{ ($title) === "Akses Pengguna" ? 'active' : '' }}"  href="/pkl/">

                <img src="{{ asset('/img/main/akses.png') }}" alt="" width="30" height="24" >

                Akses Pengguna

              </a>

          </li>

          <li class="nav-item ">

            <a class="nav-link  text-dark {{ ($title) === "Data Master" ? 'active' : '' }}"  >

                <img src="{{ asset('/img/main/data master.png') }}" alt="" width="30" height="24" >

                Setup data

              </a>

          </li>

          <li class="nav-item ">

            <a class="nav-link  text-dark {{ ($title) === "Laboratorium" ? 'active' : '' }}"  href="/pkl/laboratorium">

                <img src="{{ asset('/img/main/lab.png') }}" alt="" width="30" height="24" >

                Laboratorium

              </a>

          </li>

          <li class="nav-item ">

            <a class="nav-link  text-dark {{ ($title) === "Radiologi" ? 'active' : '' }}"  href="/pkl/radiologi">

                <img src="{{ asset('/img/main/radiologi.png') }}" alt="" width="30" height="24" >

                Radiologi

              </a>

          </li>

          <li class="nav-item ">

            <a class="nav-link  text-dark {{ ($title) === "Elektrokardiogram" ? 'active' : '' }}"  href="{{ route('ekg') }}">

                <img src=# alt="" width="30" height="24" >

                Elektrokardiogram

              </a>

          </li>

          <li class="nav-item  ">

            <a class="nav-link  text-dark {{ ($title) === "Panduan" ? 'active' : '' }}"  href="/panduan">

                <img src="{{ asset('/img/main/panduan.png') }}" alt="" width="30" height="24" >

                Panduan

              </a>

          </li>

          

        </ul>

      </div>

    </div>

  </nav>

