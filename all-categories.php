<?php
session_start();
require_once("./navbar.php");
require_once("./config.php");
$_SESSION['callingPage'] = "all-categories.php";
// echo $_SESSION['callingPage'];
?>
<html lang="en">
	<head>
    <title>Book Bank - All Categories</title>
    <script>
        $(document).ready(function () {
            $('.dropdown-trigger').dropdown();
        });
    </script>
</head>

<style>
	.checked{
		color: orange;
	}
</style>

<body>
	<div class="container">
		<h4>Young Adult</h4>
		<div class="row">
            <ul>
                <?php
                $query1 = "SELECT max(bid) from book;";
                $result1 = pg_query($db_connection, $query1);
                $row1 = pg_fetch_row($result1);
                // $query2 = "SELECT imageurl, name, author, avgrating from book where bid< ".$row1[0]."limit 8;";
                $query2 = "SELECT bid, imageurl, name, author, avgrating from book where genre='young adult' limit 8;";
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
		<h4>Mythology</h4>
		<div class="row">
            <ul>
                <?php
                $query2 = "SELECT bid, imageurl, name, author, avgrating from book where genre='mythology' limit 8;";
                $result2 = pg_query($db_connection, $query2);
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
                    if($i%4==0){
                        echo '</ul></div><div class="row"><ul>';
                    }
                }
                ?>
            </ul>
        </div>
		<h4>Thriller</h4>
		<div class="row">
            <ul>
                <?php
                $query2 = "SELECT bid, imageurl, name, author, avgrating from book where genre='thriller' limit 8;";
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
                    if($i%4==0){
                        echo '</ul></div><div class="row"><ul>';
                    }
                }
                ?>
            </ul>
        </div>
		<h4>Romance</h4>
		<div class="row">
            <ul>
                <?php
                $query2 = "SELECT bid, imageurl, name, author, avgrating from book where genre='romance' limit 8;";
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
                    if($i%4==0){
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