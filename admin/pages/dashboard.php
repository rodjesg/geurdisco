<?php
	$title = "dashboard";
	include '../includes/header.php';
?>

<style>
	header{
		position: relative;
		top: 5px;
		margin: 15px 15px 20px 15px;
		height: 160px;
		background-color: crimson;
		text-align: left center;
		padding-top: 2px;
		padding-left: 35px;
		color: white;
		border-radius: 5px;
	}

	h1{
		text-align: center;
		padding-top: 30px;
	}

	aside{
		position: relative;
		margin-right: 15px;
		background-color: darkcyan;
		height: 40px;
		margin: 15px 10px 15px 15px;
		border-radius: 5px;
		padding-top: 30px;
		padding-left: 20px;
	}

	aside a{
		display: inline;
		color: darkseagreen;
		padding-right: 20px;
		text-decoration: none;
	}

	aside a:hover{
		background: white;
	}
</style>

<?php
include 'includes/menu.php'
?>

<main>
	<h2>Dashboard</h2>
</main>

<?php
include '../includes/footer.php';
?>