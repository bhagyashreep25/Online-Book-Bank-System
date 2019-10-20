<?php
session_start();
require_once("./navbar.php");
require_once("./config.php");
$_SESSION['callingPage'] = "categories.php?category=".$_GET['category'];
?>
<html lang="en">
	<head>
    <title>Book Bank - Young Adult</title>
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
		<h4><?php echo ucwords($_GET['category']);?></h4>
		<div class="row">
            <ul>
                <?php
                $query2 = "SELECT bid, imageurl, name, author, avgrating from book where genre='".$_GET['category']."' limit 16;";
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