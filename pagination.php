
<?php

$conn = mysqli_connect('localhost','root',"",'crud') or die('connectin  faild');






?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>pagination</title>
	<link rel="stylesheet" href="css/bootstrap.min.css"> 
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery-.js"></script>
	
</head>
<body>
	<h1 class="text-center">pagination</h1>
	<div id="main">
		<div id="header">
			<h1>php $ ajax pagination</h1>
			
		</div>
		<div id="table-data">
			<table class="table">
				<tr>
					<th>id</th>
					<th>student name</th>
				</tr>
				<tr>
					<td>1</td>
					<td>student name</td>
				</tr>
			</table>
			
			<div id="pagination">
				<a class="active" id="1" href="">1</a>
				<a id="2" href="">2</a>
				<a id="3" href="3">a</a>
			</div>
		</div>
	</div>
</body>
</html>