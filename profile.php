<?php
session_start();
require_once("./navbar.php");
require_once("./config.php");
// echo $_GET['uid'];
$query = "SELECT name, dob, gender, phone, address, currentlyreading, favauthor, favgenre from users where uid=".$_GET['uid'].";";
$result = pg_query($db_connection, $query);
if($result){
	$row = pg_fetch_row($result);
}

$query1 = "select distinct(author) from book;";
$result1 = pg_query($db_connection, $query1);

$query2 = "select distinct(genre) from book;";
$result2 = pg_query($db_connection, $query2);

$query3 = "SELECT bookname, price, forsale from booklist where uid=".$_GET['uid'].";";
$result3 = pg_query($db_connection, $query3);

$query4 = "SELECT name from book";
$result4 = pg_query($db_connection, $query4);
$result6 = pg_query($db_connection, $query4);
$result7 = pg_query($db_connection, $query4);

$query5 = "SELECT bid, imageurl, name, author, avgrating from readbook where uid=".$_GET['uid'].";";
$result5 = pg_query($db_connection, $query5);
?>
<html>
	<head>
		<script>
			$(document).ready(function(){
    			$('.datepicker').datepicker();
  			});
			document.addEventListener('DOMContentLoaded', function () {
        		var options = {
            		// defaultDate: new Date(2018, 1, 3),
            		setDefaultDate: true
        		};
        		var elems = document.querySelector('.datepicker');
        		var instance = M.Datepicker.init(elems, options);
        		// instance.open();
        		instance.setDate(new Date(<?php echo 'substr($row[1], 0, 4)';?>, <?php echo 'substr($row[1], 4, 2)';?>, <?php echo 'substr($row[1], 6, 2)';?>));
    			});
				$(document).ready(function(){
    				$('select').formSelect();
  				});
		</script>
	</head>

	<style>
		.input-field{
			padding-right: 50px;
		}
		.gender{
			color:  grey;
			font-size: 12px;
		}
		label{
			padding-right: 20px;
		}
		.btn{
			margin: 10px;
    		background-color: salmon;
		}
		.btn:hover{
			background-color: tomato;
		}
		.checked{
			color: orange;
		}
	</style>
	<body>
		<div class="container">
			<?php
				if(isset($_SESSION['id'])){
				if($_GET['uid']==$_SESSION['id']){
					$flag=1;
					echo '<h4>Basic Profile</h4>';
					echo  '<form action="updateprofile.php?uid='.$_GET['uid'].'" method="POST">
						<div class="row">
          					<div class="input-field col s6">
            					<input value="'.$row[0].'" name="name" type="text" class="validate">
								<label for="name">Name</label>
          					</div>
      						<div class="input-field col s6">
            					<input value="'.$row[1].'" name="date" type="text" class="datepicker">
								<label for="name">Date of Birth</label>
          					</div>
						</div>
						<div class="row">
							<div class="input-field col s6">
            					<input value="'.$row[3].'" name="phone" type="text" class="validate">
								<label for="name">Contact</label>
          					</div>
							<div class="input-field col s6">
            					<input value="'.$row[4].'" name="address" type="text" class="validate">
								<label for="name">Place of Stay</label>
          					</div>
      					</div>';
					if($row[2]=='M'){
						echo '<div class="row"><div class="col s6"><span class="gender">Gender</span>
							<p><label>
        						<input name="group1" value="M" type="radio" checked /><span>Male</span>
							</label><label>
        						<input name="group1" value="F" type="radio" /><span>Female</span>
      						</label></p></div>';
					}
					else{
						echo '<div class="row"><div class="col s6"><span class="gender">Gender</span>
							<p><label>
        						<input name="group1" value="M" type="radio" /><span>Male</span>
							</label><label>
        						<input name="group1" value="F" type="radio" checked /><span>Female</span>
      						</label></p></div>';
					}
					echo '<div class="input-field col s6">
							<select class="col s6" name="curread">
      						<option value="'.$row[5].'" selected>'.$row[5].'</option>';
					while($row7 = pg_fetch_row($result7)){
						echo '<option value="'.$row7[0].'">'.$row7[0].'</option>';
					}
					echo '</select>
						<label>Currently Reading</label></div>
					<div class="row">
						<div class="input-field col s6">
						<select class="col s6" name="author">
      						<option value="'.$row[6].'" selected>'.$row[6].'</option>';
					while($row1 = pg_fetch_row($result1)){
						echo '<option value="'.$row1[0].'">'.$row1[0].'</option>';
					}
      				echo '</select>
						<label>Favourite Author</label>
					</div>
						<div class="input-field col s6">
						<select class="col s6" name="genre">
      						<option value="'.$row[7].'" selected>'.$row[7].'</option>';
					while($row2 = pg_fetch_row($result2)){
						echo '<option value="'.$row2[0].'">'.$row2[0].'</option>';
					}
      				echo '</select>
						<label>Favourite Genre</label>
					</div>
					<input type="submit" value="save" name="submit" class="btn">
					</form>';
					
					//Books read
					echo '<h4>Books You\'ve Read </h4>';
					echo '<div class="row"><ul>';
					$i=0;
					if(pg_num_rows($result5)>0){
					while($row5 = pg_fetch_row($result5)){
                    $ratingchecked = intval($row5[4]);
                    $ratingunchecked = 5 - $ratingchecked;
                    echo '<li>
                    <div id="one" class="col s3 center">
                        <a href="bookpage.php?bid='.$row5[0].'"><img src="'.$row5[1].'" width="150" height="230"></a>
                        <h6>'.$row5[2].'</h6>
                        <p>'.$row5[3].'</p>
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
					echo  '</ul></div>';
					}
					else{
						echo '<span>No Read Books Yet</span>';
					}
					
					//Add another read book
					echo '<h6>Add another?</h6>';
					echo '<form action="updatebooklist.php?uid='.$_GET['uid'].'" method="POST">
					<div class="row center">
						<div class="input-field col s6 center">
							<select name="name">';
						while($row4 = pg_fetch_row($result4)){
							echo '<option value="'.$row4[0].'">'.$row4[0].'</option>';
						}
      					echo '</select><label>Pick a Book</label></div>
							<div class="col s3">
								<input type="submit" value="add book" name="submit" class="btn">
							</div>
					</div></form>';

					//list of books
					echo '<h4>Books for Sale/Rent</h4>';
					echo '<form action="updatebooklist.php?uid='.$_GET['uid'].'" method="POST">';
					if(pg_num_rows($result3)>0){
					while($row3=pg_fetch_row($result3)){
						if($row3[2]==1){
							$category="Sale";
						}
						else{
							$category="Rental";
						}
						echo '<div class="row center"><div class="input-field center col s4">
            					<input disabled value="'.$row3[0].'" name="book" type="text" class="validate">
								<label for="book">Name</label>
          				</div>
						<div class="input-field center col s4">
            				<input disabled value="'.$row3[1].'" name="price" type="text" class="validate">
							<label for="price">Price</label>
          				</div>
						<div class="input-field center col s4">
            				<input disabled value="'.$category.'" name="category" type="text" class="validate">
							<label for="category">Category</label>
          				</div>';
						// echo '<div class="col center s2">
						// 	<input type="submit" value="delete" name="submit" class="btn">
						// </div>';
						echo '</div></form>';
					}
					}
					else{
						echo '<span>No Books Yet</span>';
					}

					//add new books
					echo '<h6>Add another?</h6>';
					echo '<form action="updatebooklist.php?uid='.$_GET['uid'].'" method="POST">
					<div class="row center">
						<div class="input-field col s4 center">
							<select name="name">';
						while($row4 = pg_fetch_row($result6)){
							echo '<option value="'.$row4[0].'">'.$row4[0].'</option>';
						}
      					echo '</select><label>Pick a Book</label></div>
					  		<div class="input-field center col s3">
            					<input name="price" type="text" class="validate" required>
								<label for="price">Price</label>
          					</div>
							<div class="input-field col s3 center">
								<select name="category">
								<option value="1" selected>Sale</option>
								<option value="0">Rental</option></select>
								<label>Pick a Category</label>
							</div>
							<div class="center col s2">
								<input type="submit" value="add" name="submit" class="btn">
							</div>
					</div></form>';
				}
				else{
					echo '<h4>Basic Profile</h4>';
					echo  '<div class="row">
          					<div class="input-field col s6">
            					<input disabled value="'.$row[0].'" name="name" type="text" class="validate">
								<label for="name">Name</label>
          					</div>
      						<div class="input-field col s6">
            					<input disabled value="'.$row[1].'" name="date" type="text" class="datepicker">
								<label for="name">Date of Birth</label>
          					</div>
						</div>
						<div class="row">
							<div class="input-field col s6">
            					<input disabled value="'.$row[3].'" name="phone" type="text" class="validate">
								<label for="name">Contact</label>
          					</div>
							<div class="input-field col s6">
            					<input disabled value="'.$row[4].'" name="address" type="text" class="validate">
								<label for="name">Place of Stay</label>
          					</div>
      					</div>';
					if($row[2]=='M'){
						echo '<div class="row"><div class="col s6"><span class="gender">Gender</span>
							<p><label>
        						<input disabled name="group1" value="M" type="radio" checked /><span>Male</span>
							</label><label>
        						<input disabled name="group1" value="F" type="radio" /><span>Female</span>
      						</label></p></div>';
					}
					else{
						echo '<div class="row"><div class="col s6"><span class="gender">Gender</span>
							<p><label>
        						<input disabled name="group1" value="M" type="radio" /><span>Male</span>
							</label><label>
        						<input disabled name="group1" value="F" type="radio" checked /><span>Female</span>
      						</label></p></div>';
					}
					echo '<div class="input-field col s6">
            				<input disabled value="'.$row[5].'" name="curread" type="text" class="validate">
							<label for="name">Currently Reading</label>
          				</div>
					</div>
					<div class="row">
						<div class="input-field col s6">
						<select disabled class="col s6" name="author">
      						<option value="'.$row[6].'" selected>'.$row[6].'</option>';
      				echo '</select>
						<label>Favourite Author</label>
					</div>
						<div class="input-field col s6">
						<select disabled class="col s6" name="genre">
      						<option value="'.$row[6].'" selected>'.$row[7].'</option>';
      				echo '</select>
						<label>Favourite Genre</label>
					</div>';

					//Books Read
					echo '<h4>Books They\'ve Read </h4>';
					echo '<div class="row"><ul>';
					$i=0;
					if(pg_num_rows($result5)>0){
					while($row5 = pg_fetch_row($result5)){
                    $ratingchecked = intval($row5[4]);
                    $ratingunchecked = 5 - $ratingchecked;
                    echo '<li>
                    <div id="one" class="col s3 center">
                        <a href="bookpage.php?bid='.$row5[0].'"><img src="'.$row5[1].'" width="150" height="230"></a>
                        <h6>'.$row5[2].'</h6>
                        <p>'.$row5[3].'</p>
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
					echo  '</ul></div>';
					}
					else{
						echo '<span>No Read Books Yet</span>';
					}
				}
				}
				else if(isset($_SESSION['id']) and $_SESSION['id']!=$_GET['uid']){
					echo '<h4>Basic Profile</h4>';
					echo  '<div class="row">
          					<div class="input-field col s6">
            					<input disabled value="'.$row[0].'" name="name" type="text" class="validate">
								<label for="name">Name</label>
          					</div>
      						<div class="input-field col s6">
            					<input disabled value="'.$row[1].'" name="date" type="text" class="datepicker">
								<label for="name">Date of Birth</label>
          					</div>
						</div>
						<div class="row">
							<div class="input-field col s6">
            					<input disabled value="'.$row[3].'" name="phone" type="text" class="validate">
								<label for="name">Contact</label>
          					</div>
							<div class="input-field col s6">
            					<input disabled value="'.$row[4].'" name="address" type="text" class="validate">
								<label for="name">Place of Stay</label>
          					</div>
      					</div>';
					if($row[2]=='M'){
						echo '<div class="row"><div class="col s6"><span class="gender">Gender</span>
							<p><label>
        						<input disabled name="group1" value="M" type="radio" checked /><span>Male</span>
							</label><label>
        						<input disabled name="group1" value="F" type="radio" /><span>Female</span>
      						</label></p></div>';
					}
					else{
						echo '<div class="row"><div class="col s6"><span class="gender">Gender</span>
							<p><label>
        						<input disabled name="group1" value="M" type="radio" /><span>Male</span>
							</label><label>
        						<input disabled name="group1" value="F" type="radio" checked /><span>Female</span>
      						</label></p></div>';
					}
					echo '<div class="input-field col s6">
            				<input disabled value="'.$row[5].'" name="curread" type="text" class="validate">
							<label for="name">Currently Reading</label>
          				</div>
					</div>
					<div class="row">
						<div class="input-field col s6">
						<select disabled class="col s6" name="author">
      						<option value="'.$row[6].'" selected>'.$row[6].'</option>';
      				echo '</select>
						<label>Favourite Author</label>
					</div>
						<div class="input-field col s6">
						<select disabled class="col s6" name="genre">
      						<option value="'.$row[6].'" selected>'.$row[7].'</option>';
      				echo '</select>
						<label>Favourite Genre</label>
					</div>';

					//Books Read
					echo '<h4>Books They\'ve Read </h4>';
					echo '<div class="row"><ul>';
					$i=0;
					if(pg_num_rows($result5)>0){
					while($row5 = pg_fetch_row($result5)){
                    $ratingchecked = intval($row5[4]);
                    $ratingunchecked = 5 - $ratingchecked;
                    echo '<li>
                    <div id="one" class="col s3 center">
                        <a href="bookpage.php?bid='.$row5[0].'"><img src="'.$row5[1].'" width="150" height="230"></a>
                        <h6>'.$row5[2].'</h6>
                        <p>'.$row5[3].'</p>
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
					echo  '</ul></div>';
					}
					else{
						echo '<span>No Read Books Yet</span>';
					}
				}
			?>
		</div>
	</body>
</html>