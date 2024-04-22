<?php 
include('../includes/dbconnect.php');
include('../includes/header.php');

if($_SESSION['useremail']=="" ) {
    header('location:login.php');
}



if(!isset($_GET['order_btn'])) {
 
}

if(isset($_GET['order_btn'])) {
    $user_id = $_SESSION['id'];
    $product_id = $_GET['order_btn'];
    $qty = $_GET['op'];

    $address =$con->prepare("SELECT * from tbl_address a , tbl_users u where  u.address_id=a.id and u.id='$user_id'  ");
    $address->execute();

    $sql = "SELECT * from tbl_products p,tbl_category c  where p.category_id=c.id and p.product_id='$product_id'";
    $data = $con->prepare($sql);
    $data->execute();

    $select =$con->prepare("select * from tbl_users where id='$user_id' ");
    $select->execute();
    foreach($select as $row) {
        if(!$row['address_id']=="") {  
        foreach($address as $roww) { 
        ?>
         <!-- Already Have an Address -->
          <!-- <?php // include('../includes/header.php')?> -->
<div class="order-details">
<div class="order-item">
  <div style="border:0.5px solid #333;padding:20px 15px ; margin-bottom:10px;;border-radius:10px ">
       <h1 >Name: <?php echo $roww['username'] .' '. $roww['userlastname'] ;?> </h1>
       <p>Address: <?php echo $roww['useraddress'] .', '. $roww['usercity'] .', '.$roww['usercountry'];?> </p>
       <p>Phone Number: <?php echo $roww['userphone'] ;?> </p>
  </div>
   <?php } ?>
  <div style="border:0.5px solid #333;padding:20px 15px ;border-radius:10px ">
    <?php foreach($data as $roww) {?>
        <h2>Order item</h2>
                    <hr style="margin:10px 0 ;">
                      <div class="flex-container">
                        <img src="./image/<?php echo $roww['productimage'] ?>" >
                        <div class="flex-right">
                           
                        <h2><?php echo $roww['productname'] ?></h2>
                        <p><?php  echo $roww['categoryname']?></p>
                        <h3>Price: $<?php echo $roww['productprice'] ?></h3>
                        <h3>Qty: <?php echo $qty ?></h3>
                    
                    </div>
                      </div>
                    
               
                </div>
    </div>
 <div class="order-place" style="border:0.5px solid #333;padding:5px 15px 20px  ; margin-bottom:10px;;border-radius:10px; " >
 <a href="./placeorder.php?op=<?php echo $qty?>&order_btn=<?php  echo $roww['product_id']?>" class="btn bg-primary" >Continue</a> 
 <h3>Payment Summary</h3>
   <hr style="margin:10px 0 ;">
                <div class="kty">
                         <p class="p-left">Items(Qty:<?php echo $qty ?>)</p>
                         <p class="p-right" >$<?php echo $items = $roww['productprice']*$qty ?></p>
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
         <!-- fin Have an Address -->
      <?php
       
        } 
        
        
        
        // Enter your Shipping Address 
        else {  
            
            if(isset($_POST['add_btn'])) {
                $user_id = $_SESSION['id'];
                $address = $_POST['txtaddress'];
                $city = $_POST['txtcity'];
                $postal = $_POST['txtpostal'];
                $country = $_POST['txtcountry'];
                $phone = $_POST['txtphone'];
                echo $firstname;
                echo  $lastname;
                $sql = "select * from tbl_users where id='$user_id' ";  
                $data = $con->prepare($sql);
                $data->execute();

                print_r($data->execute());
                 foreach($data as $row) {
                     if($row['address_id']=="") {
                         echo "Please Enter Your Address !";
                         $insert = $con->prepare("INSERT INTO tbl_address (useraddress , usercity , userpostal , usercountry , userphone)value('$address', '$city', '$postal', '$country', '$phone') ");
                         $insert->execute();
                         $update = $con->prepare("UPDATE tbl_users u,tbl_address a SET address_id =a.id where u.id='$user_id' and a.useraddress='$address'");
                         $update->execute();
                     }
                 }

                 header('location:userdetails.php?op='.$qty.'&order_btn='.$product_id);
                  
            }
            ?>
            <!-- <?php // include('../includes/header.php')?> -->
           
            <div class="user-details">
                  <div class="user-item">

                 
                   <h1>Deleviring Details</h1>
                   <h3>Please Enter a Shipping Address for this order. When you finished Click "Continue" button  </h3>
                   </div>
                     <hr>
                           <div class="user-info">
                               <form action="" method="POST">
                              
                               <div class="form-group">
                                    <label>Address </label>
                                    <br>
                                    <input type="text" class="form-control" name="txtaddress" required>
                                </div>
                                <div class="form-group">
                                    <label>City </label>
                                    <br>
                                    <input type="text" class="form-control" name="txtcity" required>
                                </div>
                                <div class="form-group">
                                    <label>Postal Code </label>
                                    <br>
                                    <input type="text" class="form-control" name="txtpostal" required>
                                </div>
                                <div class="form-group">
                                    <label>Country </label>
                                    <br>
                                    <input type="text" class="form-control" name="txtcountry" required>
                                </div>
                                <div class="form-group">
                                    <label>Phone Number </label>
                                    <br>
                                    <input type="text" class="form-control" name="txtphone" required>
                                </div>
                             
                                   <button  type="submit" class="btn bg-primary " name="add_btn">Insert</button>
                             
                                </form>
            
                            </div>        
            </div>

        
        <?php 
            
        }
    }





?>



<?php }?>

                



