<?php
$con=mysqli_connect("localhost:4306","root","","internshipportal");
if($con){
    echo "Connection Success".mysqli_connect_error();
}else{
    echo "Connection".mysqli_connect_error();
}


?>