<?php

require("includes/common.php");

    $contact_id = $_GET['id'];

    $query = "DELETE FROM contacts WHERE id = '$contact_id' ";
    mysqli_query($con, $query) or die(mysqli_error($con));
    
    header('location: index.php');
?>
