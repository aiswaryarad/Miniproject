<?php
include "../connection.php";
if(!isset($_SESSION["email"])) 
{
    header("Location:../login.php");
}
else{
$pid=intval($_GET['id']);
if(isset($_POST['submit']))
{
$productname=$_POST['productName'];
$productimage1=$_FILES["productimage"]["name"];
$t=$_FILES["productimage"]["tmp_name"];
$file_ext=strtolower(end(explode('.',$_FILES['productimage']['name'])));
$f="uploads/".$productimage1;
$expensions= array("jpeg","jpg","png");
if(in_array($file_ext,$expensions)=== false){
    $_SESSION['msg']="extension not allowed, please choose a JPEG or PNG file.";
}
else
{
move_uploaded_file($t, $f);   
//move_uploaded_file($productimage1,"uploads/$productimage1");
$sql=mysqli_query($con,"update  product set product_image='$productimage1' where product_id='$pid' ");
$_SESSION['msg']="Product Image Updated Successfully !!";
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
</head>
<body>
<div class="navbara">
  <a href="#home">PackQuipo</a>
  <div class="dropdowna">
    <button class="dropbtna"><i class="bi fa-lg bi-person-circle"> welcome seller</i>
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
    <div class="container-fluid">
    
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-light sidenav">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <a href="#" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                        <span class="fs-5 d-none d-sm-inline">Menu</span>
                    </a>
                    
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                        
                    <li class="nav-item">
                            <a href="admin_index.php" class="nav-link align-middle px-0">
                            <i class="fa fa-home"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span> 
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a href="#" class="nav-link align-middle px-0">
                                <i class="fs-4 bi-ui-checks"></i> <span class="ms-1 d-none d-sm-inline">House Types</span>
                            </a>
                        </li> -->
                        
                        <li>
                            <a href="insert-product.php" class="nav-link px-0 align-middle">
                            <i class="fa fa-th"></i> <span class="ms-1 d-none d-sm-inline">InsertProduct</span></a>
                        </li>
                        <li>
                            <a href="manage-products.php" class="nav-link px-0 align-middle">
                            <i class="fa fa-th"></i> <span class="ms-1 d-none d-sm-inline">ManageProduct</span></a>
                        </li>
                        <li>
                            <a href="manage-order.php" class="nav-link px-0 align-middle">
                            <i class="fa fa-th"></i> <span class="ms-1 d-none d-sm-inline">ViewOrders</span></a>
                        </li>
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
<div class="module-body">
<?php if(isset($_POST['submit']))
{?>
<div class="alert alert-success">
<button type="button" class="close" data-dismiss="alert">×</button>
<?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
</div>
<?php } ?>
<br />
<form class="form-horizontal row-fluid" name="insertproduct" method="post" enctype="multipart/form-data">
<h4>Update Image</h4>
<?php
$query=mysqli_query($con,"select product_name,product_image from product where product_id='$pid'");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>
<div class="control-group">
<label class="control-label" for="basicinput">Product Name</label>
<div class="controls">
<input type="text"name="productName"  readonly value="<?php echo htmlentities($row['product_name']);?>" class="span8 tip" required>
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Current Product Image</label>
<div class="controls">
<img src="uploads/<?php echo htmlentities($row['product_image']);?>" width="200" height="100">
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">New Product Image1</label>
<div class="controls">
<input type="file" name="productimage" id="productimage" value="" class="span8 tip" required>
</div>
</div>
<?php } ?>
<div class="control-group">
<div class="controls">
<button type="submit" name="submit" class="btn">Update</button>
</div>
</div>
</form>
</div>
</div>
</div><!--/.content-->
</div><!--/.span9-->
</div>
</div><!--/.container-->
</div><!--/.wrapper-->
<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
<script src="scripts/datatables/jquery.dataTables.js"></script>
<script>
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

</script>
</body>
<?php ?>