
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


	<?php
/*
        if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }

        $no_of_records_per_page = 5;
        $offset = ($pageno-1) * $no_of_records_per_page;

        $db = mysqli_connect('localhost', 'root', '', 'contacts');

        // Check connection
        if (mysqli_connect_errno()){
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            die();
        }

        $total_pages_sql = "SELECT COUNT(*) FROM info";
        $result = mysqli_query($db,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);

        $sql = "SELECT * FROM info LIMIT $offset, $no_of_records_per_page";
        $res_data = mysqli_query($db,$sql);
        while($row = mysqli_fetch_array($res_data)){
            //here goes the data
        }
        mysqli_close($db);
    ?>
    <ul class="pagination">
        <li><a href="?pageno=1">First</a></li>
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
        </li>
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
        </li>
        <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
    </ul>


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
*/ ?>
</body>
</html>

