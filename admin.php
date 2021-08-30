<?php include_once('includes/header.php') ?>


<?php include_once('includes/nav.php') ?>
	
<div class="container">


	<div class="jumbotron">
		<h1 class="text-center">
			<?php
			
				if(loggedIn()){
					echo "Logged In";
				}else {
					redirect("index.php");
				}

			?>
		</h1>
	</div>





</div>




<?php include_once('includes/footer.php') ?>