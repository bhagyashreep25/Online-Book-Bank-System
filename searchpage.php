<?php
session_start();
require_once("./navbar.php");
require_once("./config.php");
// echo $_POST['search'];
$_SESSION['callingPage'] = "searchpage.php";
?>
<html lang="en">
	<head>
    <title>Search Results - <?php echo $_POST['search']?></title>
    <script>
        $(document).ready(function () {
            $('.dropdown-trigger').dropdown();
        });
    </script>
</head>

<style>
	/* h4{
		font-weight: bold;
	} */

	.checked{
		color: orange;
	}
</style>

<body>
	<div class="container">
		<!-- <h4>Search Results for "<?php echo $_POST['search'];?>"</h4> -->
		<div class="row">
            <ul>
                <?php
                $search = ucwords($_POST['search']);
                $query = "SELECT bid, imageurl, name, author, avgrating, genre from book where name like '%".$search."%' or genre='".$_POST['search']."' or keyword='".$_POST['search']."';";
                $result = pg_query($db_connection, $query);
                $i=0;
                if(pg_num_rows($result)>0){
                    echo '<h4>Search Results for "'.$_POST["search"].'"</h4>';
                    while($row = pg_fetch_row($result)){
                    $author = $row[3];
                    $genre = $row[5];
                    $bid = $row[0];
                    $ratingchecked = intval($row[4]);
                    $ratingunchecked = 5 - $ratingchecked;
                    echo '<li>
                    <div id="one" class="col s3 center">
                        <a href="bookpage.php?bid='.$row[0].'"><img src="'.$row[1].'" width="150" height="230"></a>
                        <h6>'.$row[2].'</h6>
                        <p>'.$row[3].'</p>
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
                }
                else{
                    echo '<h4>No Search Results</h4>';
                }
                ?>
            </ul>
        </div>
	</div>
    <div class="container">
        <h5>Similar Books</h5>
        <div class="row">
            <ul>
                <?php
                if(isset($author)){
                    $query2 = "SELECT bid, imageurl, name, author, avgrating from book where (author='".$author."' or genre='".$genre."') and bid!=".$bid.";";
                }
                else{
                    $query2 = "SELECT bid, imageurl, name, author, avgrating from book limit 16";
                }
                $result2 = pg_query($db_connection, $query2);
                $i=0;
                while($row2 = pg_fetch_row($result2)){
                    $ratingchecked1 = intval($row2[4]);
                    $ratingunchecked1 = 5 - $ratingchecked1;
                    echo '<li>
                    <div id="one" class="col s3 center">
                        <a href="bookpage.php?bid='.$row2[0].'"><img src="'.$row2[1].'" width="150" height="230"></a>
                        <h6>'.$row2[2].'</h6>
                        <p>'.$row2[3].'</p>
                        <p>';
                    while($ratingchecked1!=0){
                        echo '<span class="fa fa-star checked"></span>';
                        $ratingchecked1 = $ratingchecked1 - 1;
                    }
                    while($ratingunchecked1!=0){
                        echo '<span class="fa fa-star"></span>';
                        $ratingunchecked1 = $ratingunchecked1 - 1;
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