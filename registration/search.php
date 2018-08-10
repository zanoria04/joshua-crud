<?php

if(isset($_POST['search']))
{
    $searchContact = $_POST['Search_Contact'];
    // search in all table columns
    
    // using concat mysql function
    $query = "SELECT * FROM `contacts` WHERE CONCAT(`id`, `name`, `company`, 'contact', `email`) LIKE '%".$searchContact."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `contacts`";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect('localhost', 'root', '', 'registration');
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>