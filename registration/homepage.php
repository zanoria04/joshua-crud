
<?php require ('nav_bar.php'); ?>

<?php  include ('php_code.php'); ?>

<?php  include ('search.php'); ?>


	

<!DOCTYPE html>
<html lang="en">
<head>

	<title>CRUD: CReate, Update, Delete PHP MySQL</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<script>
/*function showUser(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","show_contact.php?id="+str,true);
        xmlhttp.send();
    }
}*/
</script>

</head>
<body>



<form class="form-inline my-2 my-lg-0" action="homepage.php" method="post" >
            <input class="form-control mr-sm-2" type="text" placeholder="Search Contact" name="Search_Contact" style="width: 400px;" >
            <button class="btn btn-secondary my-2 my-sm-0" type="submit" name="search">Search</button>
</form>          


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
	<?php while ($row = mysqli_fetch_array($search_result)) { ?>
		<tr>
			<td><?php echo $row['name'];    ?></td>
			<td><?php echo $row['company']; ?></td>
			<td><?php echo $row['contact']; ?></td>
			<td><?php echo $row['email'];   ?></td>
			<td>
				<a href="create_update.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a onclick="return confirm('Are you sure? the contact will be deleted permanently.')" href="php_code.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
	</tbody>

</table>








<!--
<form>
<select name="contacts" onchange="showUser(this.value)">
  <option value="">Select a person:</option>
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">Joseph Swanson</option>
  <option value="4">Glenn Quagmire</option>
  </select>
</form>
<br> 


<div id="txtHint"></div>-->








 
</body>
</html>

