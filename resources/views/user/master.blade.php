<html>

<head>
    <title> Waffer</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{asset('css/productDetails.css')}}" rel="stylesheet">
    <link href="{{asset('css/profile.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
          crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/projectDetailsJs.js')}}"></script>

</head>

<body>
<nav class="navbar navbar-expand-sm  ">
    <div class="container-fluid  d-flex justify-content-between">
        <a class="navbar-brand" href="#">WaFFer </a>
        <div class="container w-75">
            <form method="POST">
                <div class="form-group w-75">
                    <div class="input-group mt-4">
                        <input type="text" class="form-control" placeholder="what you want to buy" id="search">
                        <div class="input-group-append">
                            <button class="btn btn-success btn-outline-light " type="submit">search</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>



        <ul class="navbar-nav  ">


            @guest
                <li class="nav-item" style="padding-left:24px;">
                    <a href="{{ route('login') }}"  class="btn btn-success">Log in</a>
                </li>

                <li class="nav-item"  style="padding-left:24px;">
                    <a href="{{ route('register') }}" class="btn  navbutton btn-danger">Join now</a>
                </li>
            @else
                <li class="nav-item"> <a href="#" class="nav-link">
                        <span class="badge badge-danger large">Deals </span>
                    </a></li>
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>

            @endguest

        </ul>

    </div>
</nav>

@yield("content")

<div  class="col-sm-12 footer">
    <div class="row"><br><br>
        <div class="col-sm-1"></div>
        <div class="col-sm-8"><br><br><p class="font-weight-bold"><strong><i class="fas fa-money-bill-wave"></i>&nbsp;WaffeR.com</strong></p></div>
        <div class="col-sm-2" ><br><br><a href="#" id="footerlink"><p class="font-weight-bold text-right"  for="up"><strong ><i class="fas fa-chevron-up"></i></strong></p></a></div>
        <div class="col-sm-1"></div>
    </div>
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <hr style="background-color:gray;border-color:gray;">
        </div>
        <div class="col-sm-1"></div>
    </div>
    <div class="row">
        <div class="col-sm-1"></div>
        <!--firstcolumn-->
        <div class="col-sm-3"><br><strong>WaffeR</strong><br>
            <p>Customers and componies ,<br>go to our website</p>

        </div>
        <div class="col-sm-2" id="footerlinks"><br><strong>Links</strong><br>
            <p><a href="#">Waffer Coaches</a> <br><a href="#">Waffer coaches</a><br><a href="#">About Us</a><br>
            </p>
        </div>
        <div class="col-sm-2" id="footerlinks"><br><br><p><a href="#">Parteners</a> <br><a href="#">Contact Us</a><br></p></div>
        <div class="col-sm-3" id="footerlinks">
            <br><strong>Follow Us</strong><br>
            <a href="www.facebook.com" style="color:white;"><i class="fab fa-facebook-square"></i></a>&nbsp;&nbsp;&nbsp;
            <a href="www.twitter.com" style="color:white;"><i class="fab fa-twitter-square"></i></a>&nbsp;&nbsp;&nbsp;
            <a href="www.google.com" style="color:white;"><i class="fab fa-google"></i></a>&nbsp;&nbsp;&nbsp;
            <a href="www.instagram.com" style="color:white;"><i class="fab fa-instagram"></i></a>&nbsp;&nbsp;&nbsp;
            <a href="www.youtube.com" style="color:white;"> <i class="fab fa-youtube"></i></a>&nbsp;&nbsp;&nbsp;<br>
            <br><small>© 2019 WaffeR. All Rights Reserved.<br> Owned by <a href="#" id="footerlink">BasharSoft LLC.</a> </small><br><br>
        </div>
        <div class="col-sm-1" >
        </div>
    </div>



</div>




</body>

</html>