<?php

    include_once "../config/dbconnect.php";
    
	$id = $_GET['id'];
    $query="UPDATE users SET Status=0 where user_id = $id"; // delete query;

    $data=mysqli_query($conn,$query);

    if($data){
        echo" active";
        /*echo '<script type="text/javascript">window.onload = function () { alert("successfully activated"); }
            </script>';*/
		header("Location:manageseller.php");
    }
    else{
        echo"Not able to activate";
    }
    
?>