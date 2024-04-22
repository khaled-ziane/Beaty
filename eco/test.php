

<?php

// Conncetion to DB
include('../includes/dbconnect.php');





if (isset($_POST['upload_btn'])) {
    
        $name = $_FILES['file']['name'];
        $tmp_name =  $_FILES['file']['tmp_name'];
        // $dst  ='./image/';
        if (isset($name)) {

            if (!empty($name)) {
                // $location = '../uploads/';
                $dst  ='./image/';
            } 
           if(move_uploaded_file($tmp_name,$dst.$name) )  {
               echo "up";
           }else {"no";}
        }
 


       

    


}

// --------------INSERT-----------------



// ------------DELETE---------------- 

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>DashBoard | Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <!-- <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport"> -->
  <link rel="stylesheet" href="../adminLte/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../adminLte/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <!-- <link rel="stylesheet" href="./adminLte/bower_components/Ionicons/css/ionicons.min.css"> -->
  <!-- Theme style -->
  <link rel="stylesheet" href="../adminLte/dist/css/AdminLTE.min.css">
  
  <!-- <link rel="stylesheet" href="./adminLte/dist/css/skins/skin-blue.min.css"> -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <!-- Products -->
               <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"> -->
        <script src="./js/jquery.min.js"></script>
        <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> -->
        <link rel="stylesheet" href="../css/table.css">
        <!-- <script type="text/javascript"  src=" https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script> 
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">  -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.23/datatables.min.css"/>
 
 <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.23/datatables.min.js"></script> 
</head>

<body >

    
    <header style="height:60px;background:black">
  

    </header>
    <div class="roww" >

      <section class="coll-1">

     
        <div >
          <img src="../adminLte/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" style="width:95px;margin:16px 50px 20px 50px">
           
        </div>
       
        <a href="./admin.php">
        <div class="  dash "><i class="fa fa-dashboard"></i>
        Profile
        </div>
        <a href="./admin.php">
        <div class="  dash "><i class="fa fa-dashboard"></i>
        Dashboard
        </div>
        </a>
         <a href="./prods.php">
        <div class=" current dash "><i class="fa fa-list-alt"></i>
        Products
        </div>
        </a>
        <a href="./users.php">
        <div class="  dash "><i class="fa fa-registered"></i>
        Users
        </div>
        </a>
        <a href="./users.php">
        <div class="  dash "><i class="fa fa-registered"></i>
        Orders
        </div>
        </a>
        <a href="./users.php">
        <div class="  dash " style="margin-top:20px"><i class="fa fa-registered"></i>
        Sign Out
        </div>
        </a>
    
    </section>
  
    <section class="coll-2">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->
        <h1>
          Add Product  
        </h1>

        <div class="box box-warning">
              <div class="box-body">
			<form  action = "" method = "POST" enctype="multipart/form-data" >
				 <div class="col-md-6">
									
					
            
						<label>Product Image</label>
						<input type="file" class="form-control input-image" name="file" >
					</div>
				
									
				
				<div style="float:left">
					<input type="submit" class="btn btn-primary" value="Upload" name="upload_btn">
				</div>
       </div>
      
			</form>
	
              
        </div>

        </div>
        
 

    </section>
    <!-- /.content -->
  <!-- </div> -->
  <!-- /.content-wrapper -->
  </div>
  <!-- Main Footer -->
  <footer class="" style="background:black;height:60px;color:#fff">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
  </footer>

<!-- ./wrapper -->



<!-- jQuery 3 -->
<!-- <script src="./adminLte/bower_components/jquery/dist/jquery.min.js"></script> -->
<!-- Bootstrap 3.3.7 -->
<!-- <script src="./adminLte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script> -->
<!-- AdminLTE App -->
<!-- <script src="./adminLte/dist/js/adminlte.min.js"></script> -->
 <!-- table -->

 <script>
   $(document).ready(function(){
    // $('#tableproducts').hide();
     $('#tableproducts').DataTable();
   });
 </script>
 

</body>
</html>