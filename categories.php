<?php
session_start();
$_SESSION['callingPage'] = "categories.php";
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
    <title>Book Bank - Young Adult</title>
    <script>
        $(document).ready(function () {
            $('.dropdown-trigger').dropdown();
        });
    </script>
</head>

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

	.nav{
		background-color: #4d6d9a;
	}

    .person {
        padding: 20px;
    }

    .dropdown-content {
        width: max-content !important;
        height: auto !important;
    }

    .btn-floating {
        background-color: white;
        text-decoration-color: #4d6d9a;
    }

    .btn-floating:hover {
        background-color: skyblue;
        color: white;
    }

    .nav-wrapper form {
        margin: auto;
    }

    .nav-wrapper .input-field {
        padding: 7px;
    }

    .nav-wrapper form #search {
        height: 45px;
        /* background-color: whitesmoke; */
    }

	/* h4{
		font-weight: bold;
	} */

	.checked{
		color: orange;
	}
</style>

<body>
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
                <!-- <li style="float:right"><a href="login.php">Login</a></li> -->
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
	<div class="container">
		<h4>Young Adult</h4>
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
</body>
</html>