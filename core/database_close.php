<?php
// Solve the problem
// You must check if connection is open then close it
try {
    mysqli_close($conn);
} catch (Exception $exp) {}
?>