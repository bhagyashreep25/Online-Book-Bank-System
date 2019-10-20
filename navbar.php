<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/navbar-style.css">
</head>

    <!-- <div class="container main">
        <div class="row">
            <!-- <div class="col"><img src="images/logo.jpg" width="80px" height="80px"></div> comment -->
            <!-- <div class="col"><img src="images/2015250.png" width="80px" height="80px"></div> comment
            <div class="col"><img src="images/501439.svg" width="80px" height="80px"></div>
            <div class="col"><a href="" class="brand-logo">Book Bank</a></div>
            <div class="col s6 center"> 
                <div class="container">
                    <form>
                        <div class="input-field transparent search">
                            <i class="material-icons prefix">search</i>
                            <input id="search" type="search" required>
                            <label for="search">Search</label>
                            <i class="material-icons">close</i>
                        </div>
                    </form>
                </div>
            </div>
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
                        <form action="searchpage.php" method="POST">
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
                <li><a href="categories.php?category=young adult">Young Adult</a></li>
                <li><a href="categories.php?category=mythology">Mythology</a></li>
                <li><a href="categories.php?category=thriller">Thriller</a></li>
                <li><a href="categories.php?category=romance">Romance</a></li>
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
                <li><a href="notifications.php?uid=<?php echo $_SESSION['id'];?>" class="black-text">Notifications</a></li>
                <li><a href="logout.php" class="black-text">Log Out</a></li>
            </ul>
        </div>
    </nav>