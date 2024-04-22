<?php
include('../includes/header-table.php');

if ($_SESSION['useremail']=="" OR $_SESSION['userrole']=="user" ) {
  header('location:login.php');
}

$user_id = $_SESSION['id'];
$select ="SELECT * from tbl_users u, tbl_address a where u.address_id = a.id and u.id='$user_id'";
$data = $con->prepare($select);
$data->execute();


?>

<?php include('../includes/nav-table.php');?>
    
  
       
<a href="./adminprofile.php">
        <div class=" current dash "><i class="fas fa-user-circle"></i>
        Profile
        </div>
        <a href="./dash.php">
        <div class="  dash "><i class="fa fa-dashboard"></i>
        Dashboard
        </div>
        </a>

        <a href="./categs.php">
        <div class=" dash "><i class="fas fa-th-list"></i></i>
        Category
        </div>
        </a>
         <a href="./prods.php">
        <div class="  dash "><i class="fab fa-product-hunt"></i>
        Products
        </div>
        </a>
        <a href="./users.php">
        <div class="  dash "><i class="fas fa-users"></i>
        Users
        </div>
        </a>
        <a href="./orders.php">
        <div class="  dash "><i class="fas fa-list-alt"></i>
        Orders
        </div>
        </a>
       
    
    </section>
  
    <section class="coll-2 cc">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->
        <h1>
          Profile Information
          <a href="./updateadminprofile.php?/info" class="btn btn-warning" style="float:right;margin-right:10px">Edit Profile</a>
        </h1>
      
        <div class="box box-warning">
              <div class="box-body">
               
              <div class="container-profile-admin">
    <?php foreach($data as $row) { ?>
    <!-- <hr style="margin-bottom:60px"> -->
    <div class="box-col-1">
     <label  for="">First Name</label>
     <h3><?php echo $row['username']?></h3>
     </div>
     <hr>
     <div class="box-col-1">
     <label for="">Last Name</label>
     <h3><?php echo $row['userlastname']?></h3>
     
     </div>
      <hr>
      
      <div class="box-col-1">
     <label for="">Email</label>
     <h3><?php echo $row['useremail']?></h3>
     
     </div>
     <hr>
    
     
     <div class="box-col-1">
     <label for="">Password</label>
     <h3><?php echo $row['userpassword']?></h3>
     
     </div>
     <hr>
   
    
     <div class="box-col-1">
     <label for="">Phone</label>
     <h3><?php echo $row['userphone']?></h3>
     
     </div>
   
     <?php }?>
</div>
              

        </div>

        </div>
        
 

    </section>
  </div>
  <?php include('../includes/footer-table.php') ;?>





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