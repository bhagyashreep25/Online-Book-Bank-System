<?php
session_start();
require_once("./navbar.php");
require_once("./config.php");
?>
<head>
	<title>Book Bank - Add Book</title>
</head>
<style>
	.btn{
			margin: 10px;
    		background-color: salmon;
	}
	.btn:hover{
		background-color: tomato;
	}
</style>
<body>
	<div class="container">
		<h4>Add Book</h4>
		<form action="addbooktable.php" method="POST">
			<div class="row center">
				<div class="input-field center col s6">
            		<input name="name" type="text" class="validate" required autofocus>
					<label for="name">Name</label>
          		</div>
				<div class="input-field center col s6">
            		<input name="author" type="text" class="validate" required>
					<label for="author">Author</label>
          		</div>
			</div>
			<div class="row center">
				<div class="input-field center col s6">
            		<input name="genre" type="text" class="validate" required>
					<label for="genre">Genre</label>
          		</div>
				<div class="input-field center col s6">
					<textarea id="des" name="des" class="materialize-textarea"></textarea>
          			<label for="des">Description</label>
          		</div>
			</div>
			<div class="row center">
				<div class="input-field center col s6">
					<textarea id="iurl" name="iurl" class="materialize-textarea"></textarea>
          			<label for="iurl">Image URL</label>
          		</div>
				<div class="input-field center col s6">
            		<input name="price" type="text" class="validate">
					<label for="price">Price</label>
          		</div>
			</div>
			<div class="row center">
				<div class="col offset-s5">
					<input type="submit" value="submit" name="submit" class="btn">
				</div>
			</div>
		</form>
	</div>
</body>