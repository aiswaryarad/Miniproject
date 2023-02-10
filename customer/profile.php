<?php
 include "../connection.php";
 $email=$_SESSION["email"];
 $user_id = $_SESSION['user_id'];
if(!isset($_SESSION["email"])) 
{
   header("Location:../login.php");
}
else{
if(isset($_POST['submit'])){
$pincode=$_POST['pincode'];
$city=$_POST['city'];
$district=$_POST['district'];
$housename=$_POST['housename'];
$locality=$_POST['locality'];
$postoffice=$_POST['postoffice'];
$state=$_POST['state'];
$select = "SELECT * FROM customer WHERE pincode ='$pincode' and housename='$housename' and city='$city' and district='$district',user_id='$user_id' and locality='$locality' and postoffice='$postoffice' and state='$state'";
    $result=$con->query($select);
    if($result->num_rows>0)
        {
            $_SESSION['msg']="Address already Created !!";     
        }
        else{
    $sql=mysqli_query($con,"insert into customer(pincode,housename,city,district,user_id,locality,postoffice,state)values('$pincode','$housename','$city','$district','$user_id','$locality','$postoffice','$state')");
    
    $_SESSION['msg']="profile completed Successfully !!";
}
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="..\includelink.css">

    <!-- Fancy box css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css" 
    integrity="sha512-nNlU0WK2QfKsuEmdcTwkeh+lhGs6uyOxuUs+n+0oXSYDok5qy0EI0lt01ZynHq6+p/tbgpZ7P+yUb+r71wqdXg==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link type="text/css" href="css/theme.css" rel="stylesheet">
    <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
    <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
    <link rel="stylesheet" href="style2.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<div class="navbara">
  <a href="#home">bioMe</a>
  <div class="dropdowna">
    <button class="dropbtna"><i class="bi fa-lg bi-person-circle"> welcome-<?php echo htmlentities($_SESSION['username']);?></i>
    </button>
    <div class="dropdowna-content">
      <a href="../logout.php">Logout</a>
    </div>
  </div> 
</div>
       <!--  </div> -->
    <!-- </nav>   -->
     <br/>
     <br/> 
     <body>

    <div class="container-fluid">
    
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-light sidenav">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <a href="#" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                        <span class="fs-5 d-none d-sm-inline">Menu</span>
                    </a>
                    
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                        
                    <li class="nav-item">
                            <a href="" class="nav-link align-middle px-0">
                            <i class="fa fa-home"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span> 
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a href="#" class="nav-link align-middle px-0">
                                <i class="fs-4 bi-ui-checks"></i> <span class="ms-1 d-none d-sm-inline">House Types</span>
                            </a>
                        </li> -->
                      
                        
                        <li>
                            <a href="order.php" class="nav-link px-0 align-middle">
                            <i class="fa fa-th"></i> <span class="ms-1 d-none d-sm-inline">My Order</span></a>

                        </li>
                        <li>
                            <a href="profile.php" class="nav-link px-0 align-middle">
                            <i class="fa fa-th"></i> <span class="ms-1 d-none d-sm-inline">Account Settings</span></a>
                            <ul>
                            <a href="profileinformation.php"><li>Profile information</li></a>
		                    <a href="address.php"><li>Manage Address</li></a>
                        </ul>
                        </li>
                        <!-- <li>
                            <a href="manage-order.php" class="nav-link px-0 align-middle">
                            <i class="fa fa-th"></i> <span class="ms-1 d-none d-sm-inline"></span></a>
                        </li> -->
                        <!--<li>
                            <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle ">
                            <i class="fs-4 bi-view-list"></i> <span class="ms-1 d-none d-sm-inline">View</span></a>
                            <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                                <li class="w-100">
                                    <a href="#" class="nav-link px-0" id="tables" onclick="showAllUser()"> <span class="d-none d-sm-inline">Users</span></a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Services</span></a>
                                </li>
                            </ul>
                        </li>
                        <li>
                        <a href="?payment" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-currency-rupee"></i> <span class="ms-1 d-none d-sm-inline">Payments</span></a>
                        </li>
                        <li>
                            <a href="#" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Customers Talk</span> </a>
                        </li>
                    </ul>
                    
                    <hr>-->
                </div>
            </div>
                
<div class="span9">
<div class="content">
<div class="module">
<div class="module-head">
<h3>Manage Address</h3>
</div>
<div class="module-body">
<?php if(isset($_POST['submit']))
{?>
<div class="alert alert-success">
<button type="button" class="close" data-dismiss="alert">×</button>
<strong></strong><?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
</div>
<?php } ?>
<?php if(isset($_GET['del']))
{?>
<div class="alert alert-error">
<button type="button" class="close" data-dismiss="alert">×</button>
<strong>Oh snap!</strong> 	<?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?>
</div>
<?php } ?>
<br />
<form class="form-horizontal row-fluid" name="profileupdate" method="post" enctype="multipart/form-data">
<div class="control-group">
<label class="control-label" for="basicinput">pincode</label>
<div class="controls">
<input type="text" name="pincode" id="pincode" placeholder="Enter pincode " class="span8 tip"  required>
<input type="button" onclick="getDetails()" value="get details"/>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">City</label>
<div class="controls">
<input type="text" name="city" id="city" placeholder="Enter city"  class="span8 tip" pattern="^([A-Za-z]+ )+[A-Za-z]+$|^[A-Za-z]+$" required>
<!-- <select name="city" id="city">
<option value="">select taluk</option>
</select> -->
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">District</label>
<div class="controls">
<input type="text"name="district" id="district" placeholder="Enter district "  class="span8 tip" pattern="^([A-Za-z]+ )+[A-Za-z]+$|^[A-Za-z]+$" required>
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">State</label>
<div class="controls">
<input type="text" name="state" id="state" placeholder="Enter state"  class="span8 tip" pattern="^([A-Za-z]+ )+[A-Za-z]+$|^[A-Za-z]+$" required>
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Post Office</label>
<div class="controls">
<input type="text"name="postoffice"  placeholder="Enter postoffice "  class="span8 tip" pattern="^([A-Za-z]+ )+[A-Za-z]+$|^[A-Za-z]+$" required>
</div>
</div>
<div class="control-group">
<div class="control-group">
<label class="control-label" for="basicinput">Locality</label>
<div class="controls">
<input type="text"name="locality"  placeholder="Enter locality "  class="span8 tip" pattern="^([A-Za-z]+ )+[A-Za-z]+$|^[A-Za-z]+$" required>
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">HouseName</label>
<div class="controls">
<input type="text"name="housename"  placeholder="Enter housename "  class="span8 tip" pattern="^([A-Za-z]+ )+[A-Za-z]+$|^[A-Za-z]+$" required>
</div>
</div>

<div class="control-group">
<div class="controls">
<button type="submit" name="submit" class="btn">Add</button>
<a href="address.php"class="btn">Cancel</a> 

</div>
</div>
</form>
</div>
</div>

<div class="span9">
<div class="content">
<div class="module">
<div class="module-head">
<h3>Manage Addresses</h3>
</div>
<div class="module-body table">
<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped display" width="100%">
<thead>
<tr>
<th>#</th>
<th>Home</th>
</tr>
</thead>
<tbody>
<?php $query=mysqli_query($con,"select * from customer WHERE user_id='$user_id'");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>
<tr>
<td><?php echo htmlentities($cnt);?></td>
<td><?php echo htmlentities($row['housename']);?>(H), <?php echo htmlentities($row['postoffice']);?> P.O,<?php echo htmlentities($row['locality']);?>, <?php echo htmlentities($row['city']);?>, <?php echo htmlentities($row['district']);?>, <?php echo htmlentities($row['pincode']);?>, <?php echo htmlentities($row['state']);?> </td>
<td>
<a href="edit-profile.php?id=<?php echo $row['customer_id']?>" ><i class="icon-edit"></i></a>
<a href="address.php?id=<?php echo $row['user_id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"><i class="icon-remove-sign"></i></a></td>
</tr>
<?php $cnt=$cnt+1; } ?>
</table>
</div>
</div>
</div><!--/.content-->
</div><!--/.span9-->
</div>
</div><!--/.container-->
</div><!--/.wrapper-->
<script type="text/javascript">
    function getDetails()
    {
        var pincode=jQuery('#pincode').val();
        if(pincode==''){
            jQuery('#state').val('');
            jQuery('#district').val('');
        }else{
            jQuery.ajax({
                url:'get.php',
                type:'POST',
                data:'pincode='+pincode,
                success:function(data){
                       var getData=$.parseJSON(data);
                       jQuery('#state').val(getData.state);
                       jQuery('#district').val(getData.district);

                }
            });
        }
    }
</script>
<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
<!-- <script src="scripts/datatables/jquery.dataTables.js"></script> -->
<!-- <script>
$(document).ready(function() {
$('.datatable-1').dataTable({
"pageLength": 5,
"lengthMenu": [5, 10, 20, 25, 50]
});
$('.dataTables_paginate').addClass("btn-group datatable-pagination");
$('.dataTables_paginate > a').wrapInner('<span />');
$('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
$('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
});

</script> -->
</body>
<?php ?>