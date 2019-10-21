<?php
session_start();
require_once("./navbar.php");
require_once("./config.php");
$_SESSION['callingPage'] = "./index.php";
?>
<html lang="en">

<head>
    <title>Book Bank</title>
    <script>
        $(document).ready(function () {
            $('.carousel').carousel();
        });
        setInterval(function () {
            $('.carousel').carousel('next');
        }, 3000);
        $(document).ready(function () {
            $('.dropdown-trigger').dropdown();
        });
    </script>
</head>

<style>
    .carousel {
        height: 350px;
        margin: 0px;
    }

    .checked {
        color: orange;
    }

    .scrolling-wrapper-flexbox {
        overflow-x: scroll;
        overflow-y: hidden;
        white-space: nowrap;
        .list {
            display: inline-block;
        }
        height: 80px;
        /* margin-bottom: 20px; */
        width: 100%;
        -webkit-overflow-scrolling: touch;
        &::-webkit-scrollbar {
            display: none;
        }
    }
</style>

<body>
    <div class="carousel center">
        <?php
        $query = "SELECT bid, imageurl from book where avgrating>=4.5 limit 5;";
	    $result = pg_query($db_connection, $query);
        while($row = pg_fetch_row($result)){
            echo '<a class="carousel-item" href="bookpage.php?bid='.$row[0].'"><img src="' . $row[1] . '"></a>';
        }
    ?>
    </div>
    <div class="container books">
        <br><br>
        <h5>Newly Added</h5>
        <div class="row">
            <ul>
                <?php
                $query1 = "SELECT max(bid) from book;";
                $result1 = pg_query($db_connection, $query1);
                $row1 = pg_fetch_row($result1);
                $query2 = "SELECT bid, imageurl, name, author, avgrating from book where bid< ".$row1[0]." and bid>1030 limit 8;";
                // $query2 = "SELECT bid, imageurl, name, author, avgrating from book where bid=1026 limit 8;";
                $result2 = pg_query($db_connection, $query2);
                $i=0;
                while($row2 = pg_fetch_row($result2)){
                    $ratingchecked = intval($row2[4]);
                    $ratingunchecked = 5 - $ratingchecked;
                    echo '<li>
                    <div id="one" class="col s3 center">
                        <a href="bookpage.php?bid='.$row2[0].'"><img src="'.$row2[1].'" width="150" height="230"></a>
                        <h6>'.$row2[2].'</h6>
                        <p>'.$row2[3].'</p>
                        <p>';
                    while($ratingchecked!=0){
                        echo '<span class="fa fa-star checked"></span>';
                        $ratingchecked = $ratingchecked - 1;
                    }
                    while($ratingunchecked!=0){
                        echo '<span class="fa fa-star"></span>';
                        $ratingunchecked = $ratingunchecked - 1;
                    }
                    echo '</p>
                    </div>
                    </li>';
                    $i++;
                    if($i==4){
                        echo '</ul></div><div class="row"><ul>';
                    }
                }
                ?>
            </ul>
        </div>
    </div>

    <div class="container books">
        <br><br>
        <h5>Sellers Near You</h5>
        <div class="row">
            <ul>
                <?php
                $query2 = "SELECT bid, imageurl, name, author, avgrating from book where bid<1010 limit 8;";
                $result2 = pg_query($db_connection, $query2);
                $i=0;
                while($row2 = pg_fetch_row($result2)){
                    $ratingchecked = intval($row2[4]);
                    $ratingunchecked = 5 - $ratingchecked;
                    echo '<li>
                    <div id="one" class="col s3 center">
                        <a href="bookpage.php?bid='.$row2[0].'"><img src="'.$row2[1].'" width="150" height="230"></a>
                        <h6>'.$row2[2].'</h6>
                        <p>'.$row2[3].'</p>
                        <p>';
                    while($ratingchecked!=0){
                        echo '<span class="fa fa-star checked"></span>';
                        $ratingchecked = $ratingchecked - 1;
                    }
                    while($ratingunchecked!=0){
                        echo '<span class="fa fa-star"></span>';
                        $ratingunchecked = $ratingunchecked - 1;
                    }
                    echo '</p>
                    </div>
                    </li>';
                    $i++;
                    if($i==4){
                        echo '</ul></div><div class="row"><ul>';
                    }
                }
                ?>
            </ul>
        </div>
    </div>

    <div class="container books">
        <br><br>
        <h5>Recommended For You</h5>
        <div class="row">
            <ul>
                <?php
                $query2 = "SELECT bid, imageurl, name, author, avgrating from book where bid>1020 and bid<1030 limit 8;";
                $result2 = pg_query($db_connection, $query2);
                $i=0;
                while($row2 = pg_fetch_row($result2)){
                    $ratingchecked = intval($row2[4]);
                    $ratingunchecked = 5 - $ratingchecked;
                    echo '<li>
                    <div id="one" class="col s3 center">
                        <a href="bookpage.php?bid='.$row2[0].'"><img src="'.$row2[1].'" width="150" height="230"></a>
                        <h6>'.$row2[2].'</h6>
                        <p>'.$row2[3].'</p>
                        <p>';
                    while($ratingchecked!=0){
                        echo '<span class="fa fa-star checked"></span>';
                        $ratingchecked = $ratingchecked - 1;
                    }
                    while($ratingunchecked!=0){
                        echo '<span class="fa fa-star"></span>';
                        $ratingunchecked = $ratingunchecked - 1;
                    }
                    echo '</p>
                    </div>
                    </li>';
                    $i++;
                    if($i==4){
                        echo '</ul></div><div class="row"><ul>';
                    }
                }
                ?>
            </ul>
        </div>
    </div>
</body>
</html>
<?php
require_once("./footer.php");
?>