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


<div style="text-align:center;color:white;" >
<h1 > Ask a question</h1> 
<form action="/forum" method="post">
@csrf
<input style="height:40px;width:200px;font-size:30px" type="text" placeholder="Title" id="title" name="title">
<input style="height:40px;width:200px;font-size:30px" type="text" placeholder="Username" id="name" name="name">
<div>
<input style="height:200px;width:1000px;font-size:50px;text-align:top" placeholder="Describe your issue" name="comments" id="comments" >
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
                  <div style="font-size:40px;">
                  issue <a href="/forum/{{ $questions->id}}"> {{ $questions->id}}</a> from {{ $questions->name}} - {{ $questions->title }} <br>
                  
                    <pre>

                    </pre>                  
                </div>
                @endforeach

            </div>
        </div>


</body>
</html>