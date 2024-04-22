

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

//-------------Change Status------------
if(isset($_GET['change_btn'])) {
    $id = $_GET['change_btn'];
     $op = $_GET['op'];

     if ($op == 'active') {
         $status = 1;
  $sql2 = "UPDATE tbl_products p ,tbl_orders o SET p.productqty=p.productqty-o.orderqty where p.product_id=o.product_id and o.id='$id' ";
$update2 = $con->prepare($sql2);
$update2->execute();
     }else {
         $status = 0;
         $sql2 = "UPDATE tbl_products p ,tbl_orders o SET p.productqty=p.productqty+o.orderqty where p.product_id=o.product_id and o.id='$id' ";
         $update2 = $con->prepare($sql2);
         $update2->execute();
     }

   $sql = "UPDATE  tbl_orders SET  orderstatus='$status' WHERE id='$id'";
 $update = $con->prepare($sql);
$update->execute();
header('location:orders.php');
}

//-----------Select Data---------------
$sql = "SELECT * from tbl_orders  ";
$data = $con->query($sql);

//------------Delele All Data-----------
if(isset($_GET['delete_all_btn'])) {
    $sql = "DELETE FROM tbl_orders ";
    $delete = $con->query($sql); 
    header('location:orders.php');
  }
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
        <div class="  dash "><i class="fas fa-users"></i>
        Users
        </div>
        </a>
        <a href="./orders.php">
        <div class=" current dash "><i class="fas fa-list-alt"></i>
        Orders
        </div>
        </a>
      
    
    </section>
  
    <section class="coll-2 cc ">

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
                    <h2>Manage <b>Orders</b></h2>
                    <a href="orders.php?delete_all_btn"><button type="button" class="btn btn-danger" name="delete_all_btn">Delete All Orders</button></a>
                  
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
                    <!-- <th>id</th> -->
                    <th>Name</th>
                    <th>Date</th>
                    <th>Address</th>
                    <th>phone</th>
                    <th>Status</th>
                    <th>Details</th>
                    <th>Delete</th>
                   
                  </tr>
                </thead>
               
                <tbody>
                  <!-- Fetch Data From DataBase   -->
                  <?php 
                   foreach($data as $row) {
                  ?>
                  <tr>
                 
                   
                  <!-- <td> '.$row['id'].'</td> -->
                  <td> <?php  echo  $row['ordername'] ?> </td>
                  <td> <?php echo $row['orderdate'] ?> </td>
                  <td> <?php echo $row['orderaddress'] ?> </td>
                  <td> <?php echo   $row['orderphone'] ?></td>
                 <!-- <td > '. $status.'</td> -->
                 <td>
                     <?php 
                        if ($row['orderstatus']==1) {
                            $status = "Delivered";
                              echo  '<a href="?op=desactive&change_btn='.$row['id'].'" style="color:green;font-weight:bold " >'.$status.'</a>';
                         
                         }else {
                            $status = "Pending";
                        
                           echo '<a href="?op=active&change_btn='.$row['id'].' " style="color:orange ; font-weight:bold">'.$status.'</a>';
                         }
                    ?>   
                  </td>
                  <td>
                  <a href="vieworder.php?view_btn=<?php echo $row['id'] ?> " class="delete" ><button type="button" class="btn btn-primary">Details</button></a>
                  </td>	
                  <td>
                  <a href="vieworder.php?delete_btn=<?php echo $row['id'] ?> " class="delete" ><button type="button" class="btn btn-danger">Delete</button></a>
                  </td>
                 
                          
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