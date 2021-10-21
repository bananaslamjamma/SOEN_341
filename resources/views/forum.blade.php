<!DOCTYPE html>
<html lang="en">
<head>
<title> Soen 341 homepage </title>
<meta charset="UTF-8"/>
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


<div style="text-align:center;color:white;" >
<h1 > Ask a question</h1> 
<form action="/forum" method="post">
@csrf
<input style="height:40px;width:200px;font-size:30px" type="text" placeholder="Title" id="title" name="title">
<div>
<input style="height:200px;width:1000px;font-size:50px;text-align:top" placeholder="Describe your issue" name="content" id="content" >
</input>
</div>
<input type="submit" value="ASK">
</form>  
</div>

<pre>


</pre>

<div style="text-align:center;color:white;background:black">
            <div class="content">
                <div style="font-size:100px;">
                    Questions
                    <pre></pre>
                </div>
                

                @foreach($questions as $questions)
                  <div style="font-size:40px;
                            background-color: #F7F9F7;
                            border: 1px solid #94BD53;
                            color: inherit;
                            padding: 5px;
                            margin: 0px;
                            color:black">
                  issue <a href="/forum/{{ $questions->id}}"> {{ $questions->id}}</a> from {{ $questions->name}} - {{ $questions->title }} <br>
                  
                    <br>                
                </div>
                @endforeach

            </div>
        </div>


</body>
</html>