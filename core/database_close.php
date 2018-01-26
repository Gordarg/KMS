<?php
// Solve the problem
// You must check if connection is open then close it

/*
    TODO: Add to database_conn.php as close() function
*/
try {
    mysqli_close($conn);
} catch (Exception $exp) {}
?>