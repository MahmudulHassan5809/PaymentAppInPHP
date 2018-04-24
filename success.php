<?php 
if (!empty($_GET['tid']) && !empty($_GET['product'])) {
	$GET = filter_var_array($_GET,FILTER_SANITIZE_STRING);
	
	$product = $GET['product'];
	$tid = $GET['tid'];
}else{

	header('Location: index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Thank You</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

	<div class="container mt-4">
		<h2>Thank You Purchasing <?php echo $product ;?></h2>
		<hr>
		<p>
			Your Transaction id is <?php echo $tid; ?>
		</p>
		<p>
			Check your Email for more Info.
		</p>
		<p>
			<a href="index.php" class="btn btn-light mt-2">Go Back</a>
		</p>
	</div>
	
</body>
</html>