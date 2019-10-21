<?php
session_start();
// header("Refresh:0");
require_once("./navbar.php");
require_once("./config.php");
if(isset($_SESSION['addnotif'])){
    $message = "The Seller will contact you for furthur news";
    echo '<script type="text/javascript">alert('.$message.');</script>';
}
$_SESSION['callingPage'] = "bookpage.php?bid=".$_GET['bid'];
// echo $_GET['bid'];
$query = "SELECT imageurl, name, author, description, avgrating, genre from book where bid=".$_GET['bid'].";";
$result = pg_query($db_connection, $query);
$row = pg_fetch_row($result);
$ratingchecked = intval($row[4]);
$ratingunchecked = 5-$ratingchecked;
// echo $row;

$query1 = "SELECT username, price, uid, bid from booklist where bid=".$_GET['bid']." and forsale=1;";
$result1 = pg_query($db_connection, $query1);

$query3 = "SELECT username, price, uid, bid from booklist where bid=".$_GET['bid']." and forrent=1;";
$result3 = pg_query($db_connection, $query3);
?>
<html lang="en">

<head>
    <title>Book Bank - <?php echo $row[1];?></title>
    <link rel="stylesheet" type="text/css" href="css/bookpage-style.css">
    <!-- <script src="//code.jquery.com/jquery-3.4.1.min.js"></script> -->
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
<body>
    <div class="container two">
        <div class="row">
            <div class="col s12 m6">
                    <img src="<?php echo $row[0];?>" width="300" height="460" alt="">
            </div>
            <div class="col s12 m6">
                <h4><?php echo $row[1];?></h4>
                <h5><?php echo $row[2];?></h5>
                <div class="row s12">
                    <div class="col">
                        <p>
                            <?php
                            $temp1 = $ratingchecked;
                            $temp2 = $ratingunchecked;
                            while($temp1!=0){
                                echo '<span class="fa fa-star checked"></span>';
                                $temp1--;
                            }
                            while($temp2!=0){
                                echo '<span class="fa fa-star"></span>';
                                $temp2--;
                            }
                            ?>
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
                        <ul>
                            <?php
                            if(pg_num_rows($result1)>0){
                                while($row3 = pg_fetch_row($result1)){
                                echo '<li>
                                <div class="collapsible-header valign-wrapper"><img src="images/501439.svg" height="60px" width="60px" class="circle">
                                <div class="col">'.$row3[0].'<br>Price: '.$row3[1].'</div>
                                <div class="col offset-m5"><a href="profile.php?uid='.$row3[2].'" class="right review">Visit Profile</a></div>
                                <a href="addnotif.php?requserid='.$_SESSION['id'].'&uid='.$row3[2].'&bid='.$row3[3].'&username='.$row3[0].'&bookname='.$row[1].'&forsale=1"><i class="material-icons email">add_comment</i></a></div>
                                </li>';
                                }
                            }
                            else{
                                echo '<span>No Sellers Available</span>';
                            }
                            ?>
                        </ul>
                        <div class="modal-footer">
                            <a href="" class="modal-close btn">Close</a>
                        </div>
                    </div>
                </div>
                <div class="modal" id="modal3">
                    <div class="modal-content">
                        <h5>Renters</h5>
                        <ul class="">
                            <?php
                            if(pg_num_rows($result3)>0){
                                while($row4 = pg_fetch_row($result3)){
                                echo '<li>
                                <div class="collapsible-header valign-wrapper"><img src="images/501439.svg" height="60px" width="60px" class="circle">
                                <div class="col">'.$row4[0].'<br>Price: '.$row4[1].'</div>
                                <div class="col offset-m5"><a href="profile.php?uid='.$row4[2].'" class="right review">Visit Profile</a></div>
                                <a href="addnotif.php?requserid='.$_SESSION['id'].'&uid='.$row4[2].'&bid='.$row4[3].'&username='.$row4[0].'&bookname='.$row[1].'&forsale=0"><i class="material-icons email">add_comment</i></a></div>
                                </li>';
                                }   
                            }
                            else{
                                echo '<span>No Renters Available</span>';
                            }
                            ?>
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
                                <p><?php echo substr($row[3], 0, 50);?></p>
                            </div>
                            <div class="card-action">
                                <a href="#modal1" class="modal-trigger">More</a>
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="modal" id="modal1">
                    <div class="modal-content">
                        <h5>Description</h5>
                            <p><?php echo $row[3];?></p>
                        <div class="modal-footer">
                            <a href="" class="modal-close btn">Close</a>
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
                <?php
                $query2 = "SELECT bid, imageurl, name, author, avgrating from book where (author='".$row[2]."' or genre='".$row[5]."') and bid!=".$_GET['bid']." limit 4;";
                $result2 = pg_query($db_connection, $query2);
                $i=0;
                while($row2 = pg_fetch_row($result2)){
                    $ratingchecked1 = intval($row2[4]);
                    $ratingunchecked1 = 5 - $ratingchecked;
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
                }
                ?>
            </ul>
        </div>
    </div>
    <div class="container">
        <div id="rating" class="section scrollspy">
            <h5>Ratings and Reviews</h5>
            <div class="row">
                <div class="col offset-s3"><h1 style="font-weight: bolder"><?php echo $row[4]?></h1></div>
                <div class="col rate"><h6>out of<br>5 Stars</h6></div>
                <h5><div class="col star">
                        <p>
                            <?php
                            $temp1 = $ratingchecked;
                            $temp2 = $ratingunchecked;
                            while($temp1!=0){
                                echo '<span class="fa fa-star checked"></span>';
                                $temp1--;
                            }
                            while($temp2!=0){
                                echo '<span class="fa fa-star"></span>';
                                $temp2--;
                            }
                            ?>
                        </p>
                </div></h5>
            </div>
            <hr><br><br>
            <?php
            if(isset($_POST['textarea1']) or !empty($_POST['textarea1'])){
                $insertquery = "INSERT into ratingreview(uid, bid, review, dated, username, countstars) values(".$_SESSION['id'].", ".$_GET['bid'].", '".$_POST['textarea1']."', ".date("Ymd").", '".$_SESSION['name']."', ".$_POST['star-rating'].")";
                $insertresult = pg_query($db_connection, $insertquery);
                unset($_POST['textarea1']);
                // if($insertresult>0){
                //     header("./bookpage.php?bid=".$_GET['bid']);
                // }
            }
            if(isset($_SESSION['id'])){
                $query4 = "SELECT countstars, review, dated from ratingreview where uid=".$_SESSION['id']."and bid=".$_GET['bid'].";";
                $result4 = pg_query($db_connection, $query4);
                if(pg_num_rows($result4)>0){
                    $row1 = pg_fetch_row($result4);
                    $star = intval($row1[0]);
                    $unstar = 5-$star;
                    echo '<div class="card z-depth-1">
                    <div class="card-content">
                    <div class="row valign-wrapper">
                        <div class="col s10">
                            <span class="card-title valign-wrapper">'.$_SESSION['name'].'</span><p>'.$row1[1].'</p>
                    <p>';
                    while($star!=0){
                        echo '<span class="fa fa-star checked"></span>';
                        $star--;
                    }
                    while($unstar!=0){
                        echo '<span class="fa fa-star"></span>';
                        $unstar--;
                    }
                    echo '</p></div>
                    <div class="col center"><span>'.substr($row1[2],0,4).'/'.substr($row1[2],4,2).'/'.substr($row1[2],6,2).'</span></div>
                </div></div>
                </div>';
                }
                else{
                    // write a review
                    echo '<h6>Write a Review</h6>
                    <div class="row">
                    <form class="" action="" method="POST">
                        <div class="input-field col s7">
                            <textarea name="textarea1" class="materialize-textarea validate" placeholder="I like this book because..." required></textarea>
                            <label>Review</label>
                        </div>';
                        echo '<div class="input-field center col s2">
            					<input name="star-rating" type="text" class="validate" required>
								<label for="star-rating">Star Rating</label>
          					</div>
                            <input type="submit" name="Submit" class=" review-submit btn center col s2 seller"></input>
                    </form>
                    </div>';

                       
                }
            }
                if(isset($_SESSION['name'])){
                    $query5 = "SELECT countstars, review, dated, username from ratingreview where uid!=".$_SESSION['id']." and bid=".$_GET['bid'].";";
                }
                else{
                    $query5 = "SELECT countstars, review, dated, username from ratingreview where bid=".$_GET['bid'].";";
                }
                $result5 = pg_query($db_connection, $query5);
                if(pg_num_rows($result5)>0){
                    $row5 = pg_fetch_row($result5);
                    $star1 = intval($row5[0]);
                    $unstar1 = 5-$star1;
                    echo '<div class="card z-depth-1">
                <div class="card-content">
                    <div class="row valign-wrapper">
                        <div class="col">
                            <img src="images/501439.svg" height="60px" width="60px" class="circular">
                        </div>
                        <div class="col">
                            <span class="card-title valign-wrapper">'.$row5[3].' - '.substr($row5[2],0,4).'/'.substr($row5[2],4,2).'/'.substr($row5[2],6,2).'</span>
                        </div>
                    </div>
                    <div class="col"><p>';
                    while($star1!=0){
                        echo '<span class="fa fa-star checked"></span>';
                        $star1--;
                    }
                    while($unstar1!=0){
                        echo '<span class="fa fa-star"></span>';
                        $unstar1--;
                    }
                    echo '</p></div>
                    <p>'.$row5[1].'</p>
                </div>
                </div>';
                }
            ?>
        </div>
    </div>
</body>
</html>
<?php
require_once("./footer.php");
?>