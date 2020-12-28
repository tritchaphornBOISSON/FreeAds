<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <title>FreeAds</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-image: url('../images/bg1.jpg');
                background-repeat:no-repeat;
                background-position: center;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
                width: 50%;
            }

            .title {
                font-size: 84px;
                background-color: #e6e6e6;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

           

    

            
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
           
                <div class="top-right links">
                <a href="#">About</a>
                <a href="#">Contact Us</a>
                <a href="{{ url('/home') }}">Home</a>
                @if (Route::has('login'))
                    @auth
                        <!--<a href="{{ url('/home') }}">Home</a>-->
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                    
                </div>
                
            @endif

            
        
            <div class="content">
                <div class="title m-b-md">
                    FreeAds
                </div>

                
    <div class="search-bar">
        <form action="#" method="post" novalidate="novalidate">
            <div class="row center">
                        
                        <div class="col-5 p-0 pl-5">
                            <input type="text" class="form-control search-slt" placeholder="What are you looking for?">
                        </div>
                        <div class="col-5 p-0">
                            <select class="form-control search-slt" id="exampleFormControlSelect1">
                                <option>Select Category</option>
                                <option>Clothes</option>
                                <option>Electronics</option>
                                <option>Cars</option>
                                <option>Furnitures</option>
                               
                            </select>
                        </div>
                        <div class="col-5p-0">
                            <button type="button" class="btn ">Search</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

            </div>
        </div>
    </body>
</html>
