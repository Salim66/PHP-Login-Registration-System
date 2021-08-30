<?php include_once('includes/header.php') ?>

<?php include_once('includes/nav.php') ?>
	
<div class="container">


	<div class="jumbotron">
		<h1 class="text-center"> Home Page</h1>
	</div>

	<?php 
	
		$sql = "SELECT * FROM users";
		$result = query($sql);

		confirm($result);

		$row = fetchArray($result);
	
		echo $row['username'];
	
	?>
	
</div> <!--Container-->




<?php include_once('includes/footer.php') ?>