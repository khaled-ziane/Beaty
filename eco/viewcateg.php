

<?php

include('../includes/header-table.php');
if ($_SESSION['useremail']=="" OR $_SESSION['userrole']=="user" ) {
    header('location:login.php');
  }

if (isset($_GET['view_btn'])){
    $id = $_GET['view_btn'];
    $select = "SELECT * from tbl_category   where id='$id'";
    $data = $con->prepare($select);
    $data->execute();
   
  
}


?>

<?php include('../includes/nav-table.php');?>
  
       
        <a href="./adminprofile.php">
        <div class="  dash "><i class="fa fa-dashboard"></i>
        Profile
        </div>
        <a href="./dash.php">
        <div class="  dash "><i class="fa fa-dashboard"></i>
        Dashboard
        </div>
        </a>
        
        <a href="./categs.php">
        <div class=" current dash "><i class="fas fa-th-list"></i></i>
        Category
        </div>
        </a>
         <a href="./prods.php">
        <div class="  dash "><i class="fa fa-list-alt"></i>
        Products
        </div>
        </a>
        <a href="./users.php">
        <div class="  dash "><i class="fa fa-registered"></i>
        Users
        </div>
        </a>
        <a href="./orders.php">
        <div class="  dash "><i class="fa fa-registered"></i>
        Orders
        </div>
        </a>
       
    
    </section>
  
    <section class="coll-2 cc">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->
        <h1>
          View Category 
        </h1>

        <div class="box box-warning">
              <div class="box-body">
              <div class="row">
           <!-- <div class="col1" style="width:500px;margin:30px "> -->
           <div class="col-md-6 " style="margin:20px ">
           <?php foreach($data as $row) { ?>
                 <ul class="list-group" >
  <li class="list-group-item d-flex justify-content-between align-items-center" style="padding:20px;text-align:center;background:#dddddd;font-size:20px">
    Category Details
   
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center"  style="padding:20px;font-size:16px" >
    ID 
    <span class="badge badge-primary badge-pill" style="font-size:16px;"><?php echo $row['id']?></span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center"  style="padding:20px ;font-size:16px">
    Name
    <span class="badge badge-primary badge-pill" style="font-size:16px;"><?php echo $row['categoryname']?></span>
  </li>
 
</ul>
           <?php }?>   
           </div>
           <div class="col-md-5" style="margin:20px">
           <li class="list-group-item d-flex justify-content-between align-items-center" style="padding:20px;text-align:center;background:#dddddd;font-size:20px">
    Category Image
    </li>
              <img src="./image/<?php echo $row['categoryimage']?>" style="width:400px;height:400px"> 
           </div>

       </div>
			
	
              
        </div>

        </div>
        
 

    </section>
  
  </div>
  <?php include('../includes/footer-table.php') ;?>->

 <script>
   $(document).ready(function(){
    // $('#tableproducts').hide();
     $('#tableproducts').DataTable();
   });
 </script>
 

</body>
</html>