<?php 

// connect to a database
$conn = mysqli_connect('localhost', 'bahig', 'test1234', "bigo's pizzaa");
// check connection
if (!$conn) {
    echo 'There is an issue with the connection ' . mysqli_connect_errno();
}
