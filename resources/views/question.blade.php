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

<div style="text-align:center;">
    <br>
    <div class="title", style="color:black;font-size:48px;background: white; border: solid black 2px;"> 
    Issue - {{$question->id}}
    From user {{$question->name}}
    </div> 
 <br>
 <div style="font-size:14px;
             background-color: #F7F9F7;
             padding: 5px;
            margin: 0px;
            page-align:left;">
    <div class="title", style="font-size:400%"> 
    {{$question->title}}
    </div> 
 <br>
 -------------------------------------------------------------------------------------------------------------------------------------------------------------------
 <br>
    <div class="title", style="font-size:200%"> 
   {{$question->content}}
    </div> 
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
                  <div class="flex items-center">
                    @if (!$answer->likedBy(auth()->user()))
                        <form action="{{ route('answer.likes', $answer) }}" method ="post" class="mr-1">
                        @csrf
                            <button type="submit" class="text-blue-500">UpVote</button>
                        </form>
                    @else
                    {{--
                        <form actions="{{ route('answer.likes', $answer) }}" method="post" class="mr-1">
                        @csrf
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="text-blue-500">DownVote</button>
                      </form>
                      --}}

                      <form action="{{ route('answer.likes', $answer)}}" method="post">
                        @method('DELETE')
                        @csrf
                        <input class="btn btn-danger" type="submit" value="Downvote" />
                      </form>
                    @endif
                      <span>{{ $answer->likes->count() }}</span>
                    </div>

                    @if (Auth::check()) 
                    <div>

                    @if ($question->name==Auth::user()->name )
                    <form action="/forum/bestanswer/{{$answer->id}}" method="post">
                    @csrf
                    <input type="submit" value="Select as best Answer">
                    </form>  

                    @endif
                    
                    </div>
                    @endif

                                    
                </div>
                @endforeach

</div>


</body>

</html>