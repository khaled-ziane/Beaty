<?php 
include('../includes/dbconnect.php');
include('../includes/header.php');



if ($_SESSION['useremail']=="" ) {
  header('location:login.php');
}

if(isset($_GET['order_btn'])) {

    $user_id = $_SESSION['id'];
    $product_id = $_GET['order_btn'];
    $qty = $_GET['op'];

    $select =$con->prepare("SELECT * from tbl_address a , tbl_users u where  u.address_id=a.id and u.id='$user_id'  ");
    $select->execute();
   

  $sql = "SELECT * from tbl_products p,tbl_category c  where p.category_id=c.id and p.product_id='$product_id'";
$data = $con->prepare($sql);
$data->execute();
}


?>

<!-- <?php // include('../includes/header.php')?> -->

<div class="order-details">

               <div class="order-item">
                  <?php foreach($select as $row) {?>
                 <div style="border:0.5px solid #333;padding:20px 15px ; margin-bottom:10px;;border-radius:10px ">
                      <h1 >Name: <?php echo $row['username'] .' '. $row['userlastname'] ;?> </h1>
                      <p>Address: <?php echo $row['useraddress'] .', '. $row['usercity'] .', '.$row['usercountry'];?></p>
                      <p>Phone Number: <?php echo $row['userphone']?> </p>
                 </div>
                 <?php }?>
                 <div style="border:0.5px solid #333;padding:20px 15px ;border-radius:10px ">
                 <?php foreach($data as $row) {?>
                    <h2>Order item</h2>
                    <hr style="margin:10px 0 ;">
                      <div class="flex-container">
                        <img src="./image/<?php echo $row['productimage'] ?>" >
                        <div class="flex-right">
                           
                        <h2><?php echo $row['productname'] ?></h2>
                        <p><?php  echo $row['categoryname']?></p>
                        <h3>Price: $<?php echo $row['productprice'] ?></h3>
                        <h3>Qty: <?php echo $qty ?></h3>
                    
                    </div>
                      </div>
                    
               
                </div>
                 </div>
                <div class="order-place" style="border:0.5px solid #333;padding:5px 15px 20px  ; margin-bottom:10px;;border-radius:10px; " >
                <a href="./paymentorder.php?op=<?php echo $qty?>&payment_btn=<?php  echo $row['product_id']?>" class="btn bg-primary" >Place Order</a> 
                <h3>Payment Summary</h3>
                <hr style="margin:10px 0 ;">
                        <div class="kty">
                         <p class="p-left">Items(Qty:<?php echo $qty ?>)</p>
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
                         <p class="p-left">Order Total</p>
                         <p class="p-right">$<?php echo $total = $items + $shipping + $tax ?> </p>
                     </div>
                   
                    </div>
                   

                    <?php }?>
                </div>

                



                <script src="../js/smooth.js"></script>

<?php include('../includes/footer.php')?>