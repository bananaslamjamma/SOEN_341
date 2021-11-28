<!DOCTYPE html>
<html lang="en">
<head>
    <title> SOEN 341 Forum </title>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@100;300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>


<body>
<header>

        <div class="container">
            <div class="navbar"; style="border: solid black 2px;">
                <div class="logo">
                    <a href='home'><img src={{URL('/images/home.png')}} width="20px"></a>
                </div>
                <nav>
                    <ul id="MenuItems">
                    <li><a href="/home"> Home</a></li>
                    <li><a href="/forum"> Forum</a></li>
                    <!-- Right Side Of Navbar -->

                    <!-- Authentication Links -->
                    @guest
                    @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @endif

                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @endif
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest

                    </ul>
                </nav>
                <img src={{URL('/images/menu.png')}} class="menu-icon" onclick="menutoggle()">
           </div> 
        </div>

    </header>


<div style="text-align:center;background:#F7F9F7;color:red;" >
@if (Auth::check()) 

<h1 style="text-decoration:underline; background: white; color: black;border: solid black 2px;"> Ask a question</h1> 
<form action="/forum" method="post">
@csrf
<input style="height:40px;width:200px;font-size:12px;border: solid black 2px;" type="text" placeholder="Title" id="title" name="title">
<div>
    <input style="height:200px;width:1000px;font-size:12px;text-align:left;border: solid black 2px;" placeholder="Describe your issue" name="content" id="content" >
        <div class="form-btn">
            <button type="submit" class="btn">Submit</button>
        </div>
    </input>
</div>    
</form>  

@else
    <h1 > You must be logged in to ask a question</h1> <br>
    <a class="nav-link" href="{{ route('login') }}" style="background:white;border: solid black 2px;">Login</a>


@endif
</div>

<div style="text-align:center;color:black;">
            <div style="font-size:48px;background:#F7F9F7">
                    Questions
            </div>     
            <div class="content", style="text-align: left;">   
                @foreach($questions as $questions)
                <div style="font-size:40px;
                            background-color: #F7F9F7;
                            padding: 5px;
                            margin: 0px;
                            page-align:left;">
                   <a href="/forum/{{ $questions->id}}"> Question {{ $questions->id}} posted by {{ $questions->name}} - {{ $questions->title }}</a>           
                </div>
                @endforeach
            </div>
        </div>
</body>
</html>

<!--------- javascript for toggle menu --------->
    
      <script>
        var MenuItems = document.getElementById("MenuItems");

            MenuItems.style.maxHeight = "0px";

            function menutoggle(){
                if(MenuItems.style.maxHeight == "0px")
                    {
                        MenuItems.style.maxHeight = "200px";
                    }
                else
                    {
                        MenuItems.style.maxHeight = "0px";
                    }
            }
        </script>
