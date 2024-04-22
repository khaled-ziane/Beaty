

<?php
include('../includes/header-table.php');
if ($_SESSION['useremail']=="" OR $_SESSION['userrole']=="user" ) {
  header('location:login.php');
}
//------------View------------------
if (isset($_GET['view_btn'])){
    $order_id = $_GET['view_btn'];
    $select = "SELECT * from tbl_orders o,tbl_products p,tbl_category c WHERE  o.product_id = p.product_id and  p.category_id=c.id   and  o.id='$order_id' ";
    $data = $con->prepare($select);
    $data->execute();
}

//------------Delete------------------
if(isset($_GET['delete_btn'])) {
  $id = $_GET['delete_btn'];
    $sql = "DELETE FROM tbl_orders WHERE id=$id";
    $delete = $con->query($sql); 
    header('location:orders.php');
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
        <div class="  dash "><i class="fas fa-th-list"></i></i>
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
        <div class=" current dash "><i class="fa fa-registered"></i>
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

        <div class="box box-primary">
                <div class="box-header with-border">
                   <h2 class="box-title">Order Details</h2>
                </div>
            <div class="box-body">
                <div class="col-md-8">
                <div class="order-item">
                <?php foreach($data as $row) { ?>
                    <div style="border:0.5px solid #333;padding:0px 15px 15px ; margin-bottom:10px;;border-radius:10px ">
                      <h1>Name: <?php echo $row['ordername']?></h1>
                      <p>Address: <?php echo $row['orderaddress']?></p>
                      <p>Phone Number: <?php echo $row['orderphone']?></p>
                      <!-- <a href="orders.php?deliver_btn=<?php echo $row['id'] ?>"><button style="padding:10px;" class="btn btn-primary" name="deliver_btn"  >Deliver Order</button></a>  -->
                    </div>
                   
                    <div style="border:0.5px solid #333;padding:0px 15px 15px ;border-radius:10px ">
                    
                    <h2>Order item</h2>
                    <hr style="margin:10px 0 ;">
                      <div class="flex-container">
                        <img src="./image/<?php echo $row['productimage'] ?>" >
                        <div class="flex-right">
                           
                        <h2><?php echo $row['productname']?></h2>
                        <p><?php echo $row['categoryname']?></p>
                        <h4>Price: $<?php echo $row['productprice']?></h4>
                        <h4>Qty: <?php echo $row['orderqty']?></h4>
                    
                    </div>
                      </div>
                    </div>
                    </div>
                </div>
                <div class="col-md-4" style="border:0.5px solid #333;padding:0px 15px 15px ; margin-bottom:10px;;border-radius:10px "  >
                   
                <h3>Payment Summary</h3>
                       <div style="border:1px solid #333;margin-bottom:10px"></div>
                     
                     
                     <div class="kty">
                         <p class="p-left">items(Qty:<?php echo $qty = $row['orderqty']?>)</p>
                         <p class="p-right" >$<?php echo $items = $row['productprice']*$qty ?></p>
                     </div>
                     <div class="shipping">
                         <p class="p-left">Shipping</p>
                         <p class="p-right">$<?php echo $shipping = 50?></p>
                     </div>
                     <div class="tax">
                         <p class="p-left">Tax(5%)</p>
                         <p class="p-right">$<?php  echo $tax =  $items*5/100 ?></p>
                     </div>
                     <div class="total">
                         <p class="p-left">Total</p>
                         <p class="p-right">$<?php echo $total = $items + $shipping + $tax ?></p>
                     </div>
                     <?php }?> 
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