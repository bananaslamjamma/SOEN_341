<!DOCTYPE html>
<html lang="en">
<head>
<title> Soen 341 homepage </title>
<meta charset="UTF-8"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

<div style="text-align:center;" >

    <div class="title", style="color:white;font-size:700%"> 
    Issue - {{$question->id}}
    </div> 
    <div class="title", style="color:white;font-size:200%"> 
    From user {{$question->name}}
    </div>
 <br>
 <div style="
             background-color: #F7F9F7;
            border: 1px solid #94BD53;
             padding: 50px;
             margin: 100px;
             margin-left:300px;
             margin-right:300px;
             color:black">
    <div class="title", style="font-size:400%"> 
    {{$question->title}}
    </div> 
 <br>
 -------------------------------------------------------------------------------------------------------------------------------------------------------------------
 <br>
    <div class="title", style="font-size:200%"> 
   {{$question->content}}
    </div> 



@if (Auth::check()) 

<p class="like" id="like">  <i class="fa fa-heart" style="color:red;font-size:200%" ></i>this is not implemented,only an idea/draft</p>
<p class="dislike" id="dislike"><i class="fa fa-heart" style="color:black;font-size:200%" ></i></p>
@endif


</div>


@foreach($best as $best)
                  <div style="font-size:50px;
                                background-color: #F7F9F7;
                                border: 1px solid #94BD53;
                                padding: 50px;
                                margin: 100px;
                                margin-left:300px;
                                margin-right:300px;
                                color:black;
                                ">
                   Best answer<br>
                   <div style="font-size:40px;">
                  from {{ $best->name}} 
                    </div><br>

                  <div style="font-size:30px;">
                  {{ $best->content }} 
                    </div>
                    
                    </div>

                                    
                </div>
                @endforeach


                  
               


<div style="text-align:center;color:white;background:black" >
@if (Auth::check()) 

<h1 > Answer this question</h1> 

<form action="/forum/{{$question->id}}" method="post">
@csrf
<div>
<input style="height:200px;width:1000px;font-size:50px;text-align:top" placeholder="Your answer" name="content" id="content" >
</input>
</div>
<input type="submit" value="Answer">
</form>  
</div>
<br>

@else
    <h1 > You must be logged in to answer a question</h1> <br>
    <h1 ><a class="nav-link" href="{{ route('login') }}">Login</a></h1>



@endif

{{-- simple view of all the answers--}}
<div style="text-align:center;color:black" >
@foreach($answer as $answer)
                  <div style="font-size:50px;
                                background-color: #F7F9F7;
                                border: 1px solid #94BD53;
                                padding: 50px;
                                margin: 100px;
                                margin-left:300px;
                                margin-right:300px;
                                color:black;
                                ">
                  answer from {{ $answer->name}} <br>

                  <div style="font-size:30px;">
                  {{ $answer->content }} 
                    </div>
                    <div>
                    @if (Auth::check())
                    @if ($question->name==Auth::user()->name )
                    <form action="/forum/bestanswer/{{$answer->id}}" method="post">
                    @csrf
                    <input type="submit" value="Select as best Answer">
                    </form>  
                    @endif
                    @endif
                    </div>

                                    
                </div>
                @endforeach

</div>


</body>

</html>