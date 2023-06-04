<?php
// Include the file that establishes the database connection
require_once 'connection.php';

// SQL query to set all GroupID values to NULL
$sql = "UPDATE student SET GroupID=NULL";

// Execute the SQL query and check for errors
if ($con->query($sql) === TRUE) {
    echo "All GroupID values set to NULL successfully";
} else {
    echo "Error updating GroupID values: " . $con->error;
}

// Close the database connection
$con->close();
?>
