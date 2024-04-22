<?php
include('../includes/header-table.php');

if ($_SESSION['useremail']=="" OR $_SESSION['userrole']=="user" ) {
    header('location:login.php');
  }

$result1 = $con->prepare("SELECT id FROM tbl_orders");
$result1->execute();
$sum1 =0;
foreach($result1 as $row) {
    $sum1 = $sum1 +1;
}


$result2 = $con->prepare("SELECT product_id FROM tbl_products");
$result2->execute();
$sum2 =0;
foreach($result2 as $row) {
    $sum2 = $sum2 +1;
}

$result3 = $con->prepare("SELECT id FROM tbl_users");
$result3->execute();
$sum3 =0;
foreach($result3 as $row) {
    $sum3 = $sum3 +1;
}


$select1 ="SELECT * from tbl_orders order by id DESC  limit 5  ";
$data1 = $con->prepare($select1);
$data1->execute();

$select2 ="SELECT * from tbl_products order by product_id DESC  limit 5  ";
$data2 = $con->prepare($select2);
$data2->execute();

$select3 ="SELECT * from tbl_users order by id DESC  limit 5  ";
$data3 = $con->prepare($select3);
$data3->execute();
 
 
?>

     <?php include('../includes/nav-table.php');?>
   
       
        <a href="./adminprofile.php">
        <div class="  dash "><i class="fas fa-user-circle"></i>
        Profile
        </div>
        <a href="./dash.php">
        <div class=" current dash "><i class="fa fa-dashboard"></i>
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
          Dashboard
        </h1>
      
        <div class="box box-primary">
              <div class="box-body">
               <div class="dash-container" >
            <div class="dash-flex-container"> 
             <a href="./orders.php"><div class="dash-box-1">
                <div class="dash-flex-left">
               <i class="fas fa-list-alt"></i>
                </div>
                <div class="dash-flex-right">
                <h1><?php echo $sum1?></h1>
                <h3>Orders</h3>
                </div>
            </div> </a> 
           <a href="./prods.php"><div class="dash-box-1 dash-box-2">
                <div class="dash-flex-left">
                <i class="fab fa-product-hunt"></i>
                </div>
                <div class="dash-flex-right">
                <h1><?php echo $sum2?></h1>
                <h3>Products</h3>
                </div>
            </div></a>
            <a href="./users.php"><div class="dash-box-1 dash-box-3">
               <div class="dash-flex-left">
                <i class="fas fa-users"></i>
                </div>
                <div class="dash-flex-right">
                <h1><?php echo $sum3?></h1>
                <h3>Users</h3>
                </div>
            </div></a>
            </div>
       <div class="dash-table-flex" style="display:flex"> 
            <table>
                <thead>
                    <tr>
                    <th> Order</th>
                    <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($data1 as $row) { ?>
                    <tr>
                        <td><?php echo $row['ordername']?></td>
                        <?php if($row['orderstatus']==1) {  ?>
                        <td><?php echo "Delivered"; ?></td>
                        <?php }else { ?>
                            <td><?php echo "Pending"; ?></td>
                            <?php }?>
                    </tr>
                    <?php }?>
                </tbody>

            </table>

            <table>
                <thead>
                    <tr>
                    <th>Product</th>
                    <th>QTY</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($data2 as $row) { ?>
                    <tr>
                        <td><?php echo $row['productname']?></td>
                        <td><?php echo $row['productqty']?></td>
                    </tr>
                    <?php }?>
                </tbody>

            </table>
           

            <table>
                <thead>
                    <tr>
                    <th>User</th>
                    <th>Role</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($data3 as $row) { ?>
                    <tr>
                        <td><?php echo $row['username']?></td>
                        <td><?php echo $row['userrole']?></td>
                    </tr>
                    <?php }?>
                </tbody>

            </table>
            </div>





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