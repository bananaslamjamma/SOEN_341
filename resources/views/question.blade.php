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
<li><a href="/login"> login</a></li>
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

</div>
<br>


<div style="text-align:center;color:white;background:black" >
<h1 > Answer this question</h1> 
<form action="/forum/{{$question->id}}" method="post">
@csrf
<input style="height:40px;width:200px;font-size:30px" type="text" placeholder="Username" id="name" name="name">
<div>
<input style="height:200px;width:1000px;font-size:50px;text-align:top" placeholder="Your answer" name="content" id="content" >
</input>
</div>
<input type="submit" value="ASK">
</form>  
</div>
<br>


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

                                    
                </div>
                @endforeach

</div>


</body>
</html>