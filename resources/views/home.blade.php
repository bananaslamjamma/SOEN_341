<!DOCTYPE html>
<html lang="en">
<head>
    <title> SOEN 341 Home </title>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
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


   <br>
   <br>
    <!-- <input type="text" id="search-bar"> -->
                            <div class="container row text-light">
                                <div class="form-group col-12 mb-0">
                                <label for="search">Search</label>
                                <input type="text" class="form-control" id="search-bar">
                                </div>

                                <div class="col-12 p-3">

                                <div class="list-group" id="results">
                                

                               
                                </div>

                                </div>
                                
                                

                            </div>
    
      <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script>
        const resultsList = document.getElementById('results');
        $(".list-group-item-action").toggleClass("active");
        function createLi(searchResult)
        {
           
            
            const link = document.createElement('a');
            link.href = "."+searchResult.view_link;
            link.classList="list-group-item list-group-item-action border-top-0";
            link.textContent = searchResult.match;
            return link;
        }
        
        document.getElementById('search-bar').addEventListener('input', function (event){
            event.preventDefault();

            const searched = event.target.value;

           
            if(searched.length>0)
            {
            fetch('api/home?search=' + searched, {
                method: 'GET'
            }).then((response) => {
                return response.json();
            }).then((response) => {
                console.log({response})
                const results = response.data;
                // empty list
                resultsList.innerHTML = '';

                if (results.length > 0){
                results.forEach((result) => {
                    resultsList.appendChild(createLi(result))
                    $('.list-group-item-action').hover(
       function(){ $(this).addClass('active') },
       function(){ $(this).removeClass('active') }
);
                })

                }else{
                    const link = document.createElement('a');
                    link.href = "#";
                link.classList="list-group-item list-group-item-action border-top-0 disabled";
                link.textContent = "No Result Found";
                resultsList.appendChild(link);
                }
            })

            }else{
                resultsList.innerHTML = '';
            
            }
        })
    </script>

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