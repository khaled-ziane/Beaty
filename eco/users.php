

<?php


include('../includes/header-table.php');

if ($_SESSION['useremail']=="" OR $_SESSION['userrole']=="user" ) {
  header('location:login.php');
}



//--------------Delevier---------------
if(isset($_GET['deliver_btn'])) {
    $id = $_GET['deliver_btn'];
    $sql = "UPDATE  tbl_orders SET  orderstatus='1' WHERE id='$id'";
 $update = $con->prepare($sql);
$update->execute();
header('location:orders.php');
    
}


//-----------Select Data---------------
$sql = "SELECT * from tbl_users u , tbl_address a where u.address_id = a.id ";
$data = $con->query($sql);



?>

<?php include('../includes/nav-table.php');?>
    
<a href="./adminprofile.php">
        <div class="  dash "><i class="fas fa-user-circle"></i>
        Profile
        </div>
        <a href="./dash.php">
        <div class="  dash "><i class="fa fa-dashboard"></i>
        Dashboard
        </div>
        </a>
        <a href="./categs.php">
        <div class="  dash "><i class="fas fa-th-list"></i></i>
        Category
        </div>
        </a>
         <a href="./prods.php">
        <div class="  dash "><i class="fab fa-product-hunt"></i>
        Products
        </div>
        </a>
        <a href="./users.php">
        <div class=" current dash "><i class="fas fa-users"></i>
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
          
        </h1>

        <div class="box box-warning">
              <div class="box-body">
              <div class="container-xl" >
          <div class="table-responsive">
            <div class="table-wrapper">
              <div class="table-title">
               <div class="roww" >
                  <!-- <div class="col-sm-6">
                    <h2>Manage <b>Employees</b></h2>
                  </div> -->
                  <div class=" adduser">
                    <h2>Users <b>Details</b></h2>
                  
                  
                  </div>
                </div>
              </div>
              
              <table id="tableproducts" class="table table-striped table-hover">
               
                <thead>
                  <tr>
                    <!-- <th>
                      <span class="custom-checkbox">
                        <input type="checkbox" id="selectAll">
                        <label for="selectAll"></label>
                      </span>
                    </th> -->
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Date</th>
                  </tr>
                </thead>
               
                <tbody>
                  <!-- Fetch Data From DataBase   -->
                  <?php 
                   foreach($data as $row) {
                  ?>
                  <tr>
                  <td>#<?php echo $row['id'] ?></td>
                  <td> <?php echo $row['username'] ?> </td>
                  <td> <?php echo $row['useremail'] ?> </td>
                  <td> <?php echo $row['useraddress'] .', '. $row['usercity'] .', '.$row['usercountry'];?></td>
                  <td> <?php echo   $row['userphone'] ?></td>
                  <td style="width:160px"> <?php echo   $row['userdate'] ?></td>
                   
                 
                          
                  </tr>
                  
                  <?php } ?> 
                  
              
                     
                
              </tbody>
            </table>
   
        	</div>        
        </div>

        </div>
        
 

    </section>

  </div>
 
  <?php include('../includes/footer-table.php') ;?>

 <script>
   $(document).ready(function(){
    // $('#tableproducts').hide();
     $('#tableproducts').DataTable();
   });
 </script>
</body>
</html>