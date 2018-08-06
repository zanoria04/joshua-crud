

<?php 
		session_start();

		// initialize variables
		$name = "";
		$company = "";
		$contact = "";
		$email = "";
		$id = 0;
		$edit_state = false;
		
		// connect to database
		$db = mysqli_connect('localhost', 'root', '', 'contacts');

		// if save button is clicked
		if (isset($_POST['save'])) {
			$name = $_POST['name'];
			$company = $_POST['company'];
			$contact = $_POST['contact'];
			$email = $_POST['email'];


			$query = "INSERT INTO info (name, company, contact, email) VALUES ('$name', '$company', '$contact', '$email')";
			mysqli_query($db, $query);
			$_SESSION['message'] = "Contact saved"; 
			header('location: homepage.php');
		}

	// update records
	if (isset($_POST['update'])) {
		$id = $_POST['id'];
		$name = $_POST['name'];
		$company = $_POST['company'];
		$contact = $_POST['contact'];
		$email = $_POST['email'];

		mysqli_query($db, "UPDATE info SET name='$name', company='$company', contact='$contact', email='$email' WHERE id=$id");
		$_SESSION['message'] = "Contact updated!"; 
		header('location: homepage.php');
	}

	// delete records
	if (isset($_GET['del'])) {
		$id = $_GET['del'];
		mysqli_query($db, "DELETE FROM info WHERE id=$id");
		$_SESSION['message'] = "Contact deleted!"; 
		header('location: homepage.php');
	}

	// retrieve records
	$results = mysqli_query($db, "SELECT * FROM info");

?>
