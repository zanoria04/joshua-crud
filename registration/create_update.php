<?php include ('nav_bar.php'); ?>

<?php  include ('php_code.php');


// fetch the record to be updated
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$edit_state = true;
		$rec = mysqli_query($db, "SELECT * FROM info WHERE id=$id");
	    $record = mysqli_fetch_array($rec);
		$name = $record['name'];
		$company = $record['company'];
		$contact = $record['contact'];
		$email = $record['email'];
		$id = $record['id'];
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>create_update</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<form method="post" action="php_code.php" >

	<input type="hidden" name="id" value="<?php echo $id; ?>">

		<div class="input-group">
			<label>Name</label>
			<input type="text" name="name" value="<?php echo $name; ?>">
		</div>

		<div class="input-group">
			<label>Company</label>
			<input type="text" name="company" value="<?php echo $company; ?>">
		</div>

		<div class="input-group">
			<label>Contact</label>
			<input type="text" name="contact" value="<?php echo $contact; ?>">
		</div>

		<div class="input-group">
			<label>Email Address</label>
			<input type="text" name="email" value="<?php echo $email; ?>">
		</div>

		<div class="input-group">
		<?php if ($edit_state == false): ?>
			<button class="btn" type="submit" name="save" >Save</button>
		<?php else: ?>
			<button class="btn" type="submit" name="update" style="background: #556B2F;" >Update</button>
		<?php endif ?>

		</div>
	</form>



</body>
</html>



