
<?php require ('nav_bar.php'); ?>

<?php  include ('php_code.php'); ?>

<?php  include ('search.php'); ?>



<!DOCTYPE html>  
 <html>  
      <head>  
            <title>Webslesson Tutorial | Make Pagination using Jquery, PHP, Ajax and MySQL</title>  
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
        
           <div class="container">  
                <h3 align="center">Contacts</h3>  
                <div class="table-responsive" id="pagination_data">  
                </div>  
           </div> 





      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      load_data();  
      function load_data(page)  
      {  
           $.ajax({  
                url:"pagination.php",  
                method:"POST",  
                data:{page:page},  
                success:function(data){  
                     $('#pagination_data').html(data);  
                }  
           })  
      }  
      $(document).on('click', '.pagination_link', function(){  
           var page = $(this).attr("id");  
           load_data(page);  
      });  
 });  
 </script>  