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

<div style="text-align:center;background:black" >

<div class="title", style="color:white;font-size:700%"> 
    Issue - {{$question->id}}
</div> 
<div class="title", style="color:white;font-size:200%"> 
    From user {{$question->name}}
</div>
<br>
<div class="title", style="color:white;font-size:400%"> 
    {{$question->title}}
</div> 
<br>
<br>
<div class="title", style="color:white;font-size:200%"> 
   {{$question->content}}
</div> 
</div>

</body>
</html>