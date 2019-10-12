<?php
session_start();
$_SESSION['callingPage'] = "bookpage.php";
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Book Bank - Turtles All The Way Down</title>
    <script>
        $(document).ready(function () {
            $('.dropdown-trigger').dropdown();
        });
        $(document).ready(function(){
            $('.scrollspy').scrollSpy();
        });
        $(document).ready(function(){
            $('.modal').modal();
        });
        $(document).ready(function(){
            $('.collapsible').collapsible();
        });
    </script>
</head>

<!-- CSS for new main nav -->
<style>
    @import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

    body {
        font-family: 'Montserrat', sans-serif;
        background-color: whitesmoke;
        /* background: linear-gradient(rgba(255,255,255,.4), rgba(255,255,255,.4)), url("https://www.incimages.com/uploaded_files/image/970x450/getty_486776676_395332.jpg");
		background-repeat: repeat-y;
        background-size: 100%; */
    }

    .main {
        padding: 0px;
        margin: 0px;
        display: flex;
        position: relative;
        height: 80px;
        color: black;
    }

    .brand-logo {

        font-size: 50px;
        font-weight: bold;
        color: black;
    }

    img {
        padding: 10px;
    }

    #name{
        padding-left: 10px;
    }

    .main {
        height: 80px;
    }

    .nav-wrapper form {
        margin: auto;
    }

    .nav-wrapper .input-field {
        padding: 7px;
    }

    .close {
    color: #4d6d9a;
    }

    .nav-wrapper form #search {
        height: 45px;
        /* background-color: whitesmoke; */
    }
</style>

<style>
    @import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

body {
    font-family: 'Montserrat', sans-serif;
    background-color: whitesmoke;
    /* background: linear-gradient(rgba(255,255,255,.4), rgba(255,255,255,.4)), url("https://www.incimages.com/uploaded_files/image/970x450/getty_486776676_395332.jpg");
    background-repeat: repeat-y;
    background-size: 100%; */
}

.main {
    padding: 0px;
    margin: 0px;
    display: flex;
    position: relative;
    height: 80px;
    color: black;
}

.brand-logo {
    
    font-size: 50px;
    font-weight: bold;
    color: black;
}

.input-field:focus + label {
    background-color: gray;
    color: #4d6d9a
}

img {
    padding: 10px;
}

.nav {
    background-color: #4d6d9a
}

.person {
    padding: 20px;
}

.btn-floating {
        background-color: white;
        text-decoration-color: #4d6d9a;
}

.btn-floating:hover {
        background-color: skyblue;
        color: white;
}

.dropdown-content {
        width: max-content !important;
        height: auto !important;
}

.two{
    padding-top: 50px;
}

h4{
    font-weight: bold;
}

.checked {
        color: orange;
}

.review{
    color: black;
    margin-left: 20px;
    font-weight: 500; 
}
.review:hover{
    /* color: #4d6d9a; */
    color: salmon;
    /* border-bottom: 2px solid #4d6d9a; */
    border-bottom: 2px solid salmon;
}

.card.des{
    background-color: #4d6d9a;
    color: white;
}

.des{
    font-size: 20px !important;
}

.con{
    font-size: 13px !important;
}

.modal-close{
    background-color: salmon;
}

.modal-close:hover{
    background-color: tomato;
}

.modal-content {
  /* height: auto !important; */
  max-height: calc(100vh) !important;
}

.seller, .renter{
    margin: 10px;
    background-color: salmon;
}

.seller:hover, .renter:hover{
    background-color: tomato;
}

.collapsible-header{
    height: 80px;
}

.collapsible-header i.material-icons.email{
    position: absolute;
    right: 30;
    color: salmon;
}

.collapsible-header i.material-icons.email:hover{
    color: tomato;
}

.col.rate{
    padding-top: 45px;
}

.col.star{
    padding-top: 35px;
}

.card{
    background-color: whitesmoke;
}
</style>

<body>
    <!-- <div class="container main">
        <div class="row">
            <!-- <div class="col"><img src="images/logo.jpg" width="80px" height="80px"></div>
            <!-- <div class="col"><img src="images/2015250.png" width="80px" height="80px"></div>
            <div class="col"><img src="images/501439.svg" width="80px" height="80px"></div>
            <div class="col"><a href="" class="brand-logo">Book Bank</a></div>
            <div class="col s6 center"> <div class="container">
                    <form>
                        <div class="input-field transparent search">
                            <i class="material-icons prefix">search</i>
                            <input id="search" type="search" required>
                            <label for="search">Search</label>
                            <i class="material-icons">close</i>
                        </div>
                    </form>
                </div></div>
        </div>
    </div> -->

    <header>
        <nav class="nav-wrapper main transparent z-depth-0">
            <div class="container">
                <div class="row">
                    <div class="col s1">
                        <a href="index.php"><img src="images/501439.svg" width="80px" height="80px"></a>
                    </div>
                    <div class="col">
                        <a href="index.php"><img id = "name" src="images/book bank.png" width="263" ></a>
                    </div>
                    <div class="col s6 right">
                        <form action="searchpage.php">
                            <div class="input-field">
                                <input id="search" type="search" name="search" placeholder="Search">
                                <label class="label-icon" for="search">
                                    <i class="material-icons" style="color: #4d6d9a">search</i></label>
                                <i class="material-icons">close</i>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <nav class="nav-wrapper nav">
        <div class="container">
            <ul>
                <li><a href="all-categories.php">All Categories</a></li>
                <li><a href="categories.php">Young Adult</a></li>
                <li><a href="categories.php">Fiction</a></li>
                <li><a href="categories.php">Drama</a></li>
                <li><a href="categories.php">Romance</a></li>
                <?php
                    if(isset($_SESSION['name']))
                        echo '<li style="float:right"><a class="dropdown-trigger" data-target="dropdown1">
                    <i class="material-icons white-text arrow">arrow_drop_down</i></a>
                </li>
                <li style="float:right"><a>'.$_SESSION['name'].'</a>
                </li>';
                    else {
                        echo '<li style="float:right"><a href="login.php">Login</a></li>';
                    }
                ?>
                <!-- Show when not logged in -->
                <!-- <li style="float:right"><a href="login.html">Login</a></li> -->
                <!-- show when logged in -->
                <!-- <li style="float:right"><a class="dropdown-trigger" href="#" data-target="dropdown1">
                    <i class="material-icons white-text arrow">arrow_drop_down</i></a>
                </li>
                <li style="float:right"><a href="#" class="btn-floating"><i
                    class="material-icons blue-text text-darken-3">person</i></a>
                </li>         -->
            </ul>
            <ul id="dropdown1" class="dropdown-content right">
                <li><a href="#" class="black-text">Profile</a></li>
                <li><a href="#" class="black-text">Notifications</a></li>
                <li><a href="logout" class="black-text">Log Out</a></li>
            </ul>
        </div>
    </nav>

    <div class="container two">
        <div class="row">
            <div class="col s12 m6">
                    <img src="images/turtles.jpg" width="300" height="460" alt="">
            </div>
            <div class="col s12 m6">
                <h4>Turtles All The Way Down</h4>
                <h5>John Green</h5>
                <div class="row s12">
                    <div class="col">
                        <p>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <a href="#rating" class="section table-of-contents review">Read Reviews</a>
                        </p>
                    </div>
                </div>
                <div class="row s12">
                    <a href="#modal2" class="btn modal-trigger seller">Browse Sellers</a>
                    <a href="#modal3" class="btn modal-trigger renter">Browse Renters</a>
                </div>
                <div class="modal" id="modal2">
                    <div class="modal-content">
                        <h5>Sellers</h5>
                        <ul class="collapsible">
                            <li>
                                <div class="collapsible-header valign-wrapper"><img src="images/501439.svg" height="60px" width="60px" class="circle">Name
                                <i class="material-icons email">email</i></div>
                                <div class="collapsible-body">
                                    <span>Buy it at - Rs 500<a href="#" class="review">Visit Profile</a></span>
                                </div>
                            </li>
                            <li>
                                <div class="collapsible-header valign-wrapper"><img src="images/501439.svg" height="60px" width="60px" class="circle">Name
                                <i class="material-icons email">email</i></div>
                                <div class="collapsible-body">
                                    <span>Buy it at - Rs 500<a href="#" class="review">Visit Profile</a></span>
                                </div>
                            </li>
                            <li>
                                <div class="collapsible-header valign-wrapper"><img src="images/501439.svg" height="60px" width="60px" class="circle">Name
                                <i class="material-icons email">email</i></div>
                                <div class="collapsible-body">
                                    <span>Buy it at - Rs 500<a href="#" class="review">Visit Profile</a></span>
                                </div>
                            </li>
                            <li>
                                <div class="collapsible-header valign-wrapper"><img src="images/501439.svg" height="60px" width="60px" class="circle">Name
                                <i class="material-icons email">email</i></div>
                                <div class="collapsible-body">
                                    <span>Buy it at - Rs 500<a href="#" class="review">Visit Profile</a></span>
                                </div>
                            </li>
                            <li>
                                <div class="collapsible-header valign-wrapper"><img src="images/501439.svg" height="60px" width="60px" class="circle">Name
                                <i class="material-icons email">email</i></div>
                                <div class="collapsible-body">
                                    <span>Buy it at - Rs 500<a href="#" class="review">Visit Profile</a></span>
                                </div>
                            </li>
                        </ul>
                        <div class="modal-footer">
                            <a href="" class="modal-close btn">Close</a>
                        </div>
                    </div>
                </div>
                <div class="modal" id="modal3">
                    <div class="modal-content">
                        <h5>Sellers</h5>
                        <ul class="collapsible">
                            <li>
                                <div class="collapsible-header valign-wrapper"><img src="images/501439.svg" height="60px" width="60px" class="circle">Name
                                <i class="material-icons email">email</i></div>
                                <div class="collapsible-body">
                                    <span>Buy it at - Rs 500<a href="#" class="review">Visit Profile</a></span>
                                </div>
                            </li>
                            <li>
                                <div class="collapsible-header valign-wrapper"><img src="images/501439.svg" height="60px" width="60px" class="circle">Name
                                <i class="material-icons email">email</i></div>
                                <div class="collapsible-body">
                                    <span>Buy it at - Rs 500<a href="#" class="review">Visit Profile</a></span>
                                </div>
                            </li>
                            <li>
                                <div class="collapsible-header valign-wrapper"><img src="images/501439.svg" height="60px" width="60px" class="circle">Name
                                <i class="material-icons email">email</i></div>
                                <div class="collapsible-body">
                                    <span>Buy it at - Rs 500<a href="#" class="review">Visit Profile</a></span>
                                </div>
                            </li>
                            <li>
                                <div class="collapsible-header valign-wrapper"><img src="images/501439.svg" height="60px" width="60px" class="circle">Name
                                <i class="material-icons email">email</i></div>
                                <div class="collapsible-body">
                                    <span>Buy it at - Rs 500<a href="#" class="review">Visit Profile</a></span>
                                </div>
                            </li>
                            <li>
                                <div class="collapsible-header valign-wrapper"><img src="images/501439.svg" height="60px" width="60px" class="circle">Name
                                <i class="material-icons email">email</i></div>
                                <div class="collapsible-body">
                                    <span>Buy it at - Rs 500<a href="#" class="review">Visit Profile</a></span>
                                </div>
                            </li>
                        </ul>
                        <div class="modal-footer">
                            <a href="" class="modal-close btn">Close</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12">
                        <div class="card des">
                            <div class="card-content con">
                                <span class="card-title des">Description</span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt 
                                    ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation 
                                    ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in 
                                    reprehenderit in voluptate</p>
                            </div>
                            <div class="card-action">
                                <a href="#modal1" class="modal-trigger">More</a>
                            </div>
                        </div>
                        <div class="modal" id="modal1">
                            <div class="modal-content">
                                <h5>Description</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt 
                                    ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation 
                                    ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in 
                                    reprehenderit in voluptate Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt 
                                    ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation 
                                    ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in 
                                    reprehenderit in voluptate</p>
                            </div>
                            <div class="modal-footer">
                                <a href="" class="modal-close btn">Close</a>
                            </div>
                        </div> 
                    </div>
                </div>
        </div>
        
    </div>
    </div>
    <div class="container">
        <h5>Similar Books</h5>
        <div class="row">
            <ul>
                <li>
                    <div id="one" class="col s3 center section scrollspy">
                        <a href="bookpage.php"><img src="images/turtles.jpg" width="150" height="230"></a>
                        <h6>Turtles All The Way Down</h6>
                        <p>John Green</p>
                        <p><span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span></p>
                    </div>
                </li>
                <li>
                    <div id="two" class="col s3 center section scrollspy">
                        <a href="bookpage.php"><img src="images/fault-stars.jpg" width="150" height="230"></a>
                        <h6>The Fault In Our Stars</h6>
                        <p>John Green</p>
                        <p><span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span></p>
                    </div>
                </li>
                <li>
                    <div id="three" class="col s3 center section scrollspy">
                        <a href="bookpage.php"><img src="images/girl-train.jpg" width="150" height="230"></a>
                        <h6>The Girl On The Train</h6>
                        <p>Paula Hawkins</p>
                        <p><span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span></p>
                    </div>
                </li>
                <li>
                    <div id="four" class="col s3 center section scrollspy">
                        <a href="bookpage.php"><img src="images/jaya.jpg" width="150" height="230"></a>
                        <h6>Jaya</h6>
                        <p>Devdutt Patnaik</p>
                        <p><span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span></p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="container">
        <div id="rating" class="section scrollspy">
            <h5>Ratings and Reviews</h5>
            <div class="row">
                <div class="col offset-s3"><h1 style="font-weight: bolder">4.7</h1></div>
                <div class="col rate"><h6>out of<br>5 Stars</h6></div>
                <h5><div class="col star">
                        <p>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                        </p>
                </div></h5>
            </div>
            <hr><br><br>
            <div class="card z-depth-1">
                <div class="card-content">
                    <div class="row valign-wrapper">
                        <div class="col">
                            <img src="images/501439.svg" height="60px" width="60px" class="circular">
                        </div>
                        <div class="col">
                            <span class="card-title valign-wrapper">Name - Date</span>
                        </div>
                    </div>
                    <div class="col"><p>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                    </p></div>
                    <p>Reviews Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt 
                    ut labore</p>
                </div>
            </div>
            <div class="card">
                <div class="card-content">
                    <div class="row valign-wrapper">
                        <div class="col">
                            <img src="images/501439.svg" height="60px" width="60px" class="circular">
                        </div>
                        <div class="col">
                            <span class="card-title valign-wrapper">Name - Date</span>
                        </div>
                    </div>
                    <div class="col"><p>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                    </p></div>
                    <p>Reviews Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt 
                    ut labore</p>
                </div>
            </div>
            <div class="card">
                <div class="card-content">
                    <div class="row valign-wrapper">
                        <div class="col">
                            <img src="images/501439.svg" height="60px" width="60px" class="circular">
                        </div>
                        <div class="col">
                            <span class="card-title valign-wrapper">Name - Date</span>
                        </div>
                    </div>
                    <div class="col"><p>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                    </p></div>
                    <p>Reviews Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt 
                    ut labore</p>
                </div>
            </div>
            <div class="card">
                <div class="card-content">
                    <div class="row valign-wrapper">
                        <div class="col">
                            <img src="images/501439.svg" height="60px" width="60px" class="circular">
                        </div>
                        <div class="col">
                            <span class="card-title valign-wrapper">Name - Date</span>
                        </div>
                    </div>
                    <div class="col"><p>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                    </p></div>
                    <p>Reviews Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt 
                    ut labore</p>
                </div>
            </div>
            <div class="card">
                <div class="card-content">
                    <div class="row valign-wrapper">
                        <div class="col">
                            <img src="images/501439.svg" height="60px" width="60px" class="circular">
                        </div>
                        <div class="col">
                            <span class="card-title valign-wrapper">Name - Date</span>
                        </div>
                    </div>
                    <div class="col"><p>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                    </p></div>
                    <p>Reviews Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt 
                    ut labore</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>