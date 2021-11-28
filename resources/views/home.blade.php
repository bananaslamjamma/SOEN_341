<!DOCTYPE html>
<html lang="en">

<head>
    <title> Soen 341 homepage </title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="/css/main.css">

</head>


<body>
    <header>

        <div class="content">
            <h2 class="left">Soen OverFlow</h2>


            <nav>
                <ul>

                    <li><a href="/home"> Home</a></li>
                    <li><a href="/forum"> Forum</a></li>
                    <li><a href=""> Team Info</a></li>
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

                    <li><a href="/profile"> Profile</a></li>

                </ul>
            </nav>


        </div>

    </header>



    <div class="title", style="color:white;font-size:700%;text-align:center"> 
    
    </div> 

</body>

</html>