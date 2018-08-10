
<?php require ('nav_bar.php'); ?>

<?php

// Make the script run only if there is a page number posted to this script
if(isset($_POST['pn'])){
	$rpp = preg_replace('#[^0-9]#', '', $_POST['rpp']);
	$last = preg_replace('#[^0-9]#', '', $_POST['last']);
    $pn = preg_replace('#[^0-9]#', '', $_POST['pn']);
    
	// This makes sure the page number isn't below 1, or more than our $last page
	if ($pn < 1) { 
    	$pn = 1; 
	} else if ($pn > $last) { 
    	$pn = $last; 
    }
    
	// Connect to our database here
    include_once("php_code.php");
    
	// This sets the range of rows to query for the chosen $pn
    $limit = 'LIMIT ' .($pn - 1) * $rpp .',' .$rpp;
    
	// This is your query again, it is for grabbing just one page worth of rows by applying $limit
	$sql = "SELECT name, company, contact, email FROM contacts ORDER BY id DESC $limit";
	$query = mysqli_query($db, $sql);
	$dataString = '';
	while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
		$id = $row["id"];
		$name = $row["name"];
        $company = $row["company"];
        $contact = $row["contact"];
        $email = $row["email"];

		$dataString .= $id.'|'.$name.'|'.$compan.'|'.$itemdate.'||';
    }
    
	// Close your database connection
    mysqli_close($db);

	// Echo the results back to Ajax
	echo $dataString;
	exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>

	<title>CRUD: CReate, Update, Delete PHP MySQL</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>


<?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>



<table>
	<thead>
		<tr>
			<th>Name</th>
			<th>Company</th>
			<th>Contact</th>
			<th>Email</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	<tbody>
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['name'];    ?></td>
			<td><?php echo $row['company']; ?></td>
			<td><?php echo $row['contact']; ?></td>
			<td><?php echo $row['email'];   ?></td>
			<td>
				<a href="create_update.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="php_code.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
	</tbody>

</table>

 
</body>
</html>



