<?php 
include('../includes/dbconnect.php');
include('../includes/header.php');


if(!isset($_GET['view_btn'])) { 
}

if(isset($_GET['view_btn'])) {
    $product_id = $_GET['view_btn'];
    $sql = "SELECT * from tbl_products p,tbl_category c  where p.category_id=c.id and p.product_id='$product_id'";
$data = $con->prepare($sql);
$data->execute();
if(isset($_SESSION['useremail'])) {
    if(isset($_POST['buy_btn'])) {
        $qty = $_POST['txtqty'];
        echo $qty;
        header('location:userdetails.php?op='.$qty.'&order_btn='.$product_id);
        }
} else {  
    if(isset($_POST['buy_btn'])) {
    $qty = $_POST['txtqty'];
    echo $qty;
    header('location:login.php');
} 
}

}

$comments = $con->prepare("SELECT count(*) as total from tbl_comment c where c.product_id='$product_id'");
$comments->execute();

foreach($comments as $row ) {
    $total = $row['total'];
}

$rate = $con->prepare("SELECT rating_val as total_rate from tbl_rating r where r.product_id='$product_id'");
$rate->execute();
$total_rate=0;
$r=0;
foreach($rate as $row ) {
    $total_rate = $total_rate+$row['total_rate'];
    $r= $r+1;  
}
if($r==0){$m="Nan"; } else { 
    $moyenne_rate = $total_rate/$r;
    $m=number_format($moyenne_rate,1);}






if(isset($_POST['comment_btn'])) {
    $comment = $_POST['txtcomment'];
    $product_id = $_GET['view_btn'];
    $user_id = $_SESSION['id'];
    $added_on = date('y-m-d h:i:s');
    $insert = $con->prepare("INSERT into tbl_comment (product_id, user_id , comment_text, commentdate ) 
              values ('$product_id','$user_id','$comment','$added_on')");
    $insert->execute();
    header('location:productdetails.php?view_btn='.$product_id);

}

$select = $con->prepare("SELECT * from tbl_comment c,tbl_users u,tbl_products p  
        where c.user_id=u.id  and c.product_id=p.product_id   and c.product_id='$product_id'  order by c.comment_id DESC");
$select->execute();

if(isset($_GET['comment_id'])) {
    $comment_id = $_GET['comment_id'];
    $product_id = $_GET['product_id'];
    $delete = $con->prepare("DELETE from tbl_comment where comment_id='$comment_id'");
    $delete->execute();
    header('location:productdetails.php?view_btn='.$product_id);
}

if(isset($_POST['rating_btn'])) {
    $rating =$_POST['txtrating'];
    $product_id = $_GET['view_btn'];
    $user_id = $_SESSION['id'];
    $added_on = date('y-m-d h:i:s');

       $select_rating = $con->prepare("SELECT * from tbl_rating where user_id='$user_id' and product_id='$product_id'");
       $select_rating->execute();
       $x = false ; 
       foreach($select_rating as $row) {
            if($row['user_id'] ==$user_id and $row['product_id']==$product_id and $x==false) {
                $update_rating = $con->prepare("UPDATE  tbl_rating set product_id='$product_id', user_id='$user_id' , rating_val='$rating', ratingdate='$added_on' where product_id='$product_id' and user_id='$user_id' ");
                $update_rating->execute();
                $x=true;
               
            }   
       }
       if($x==false) {
        $insert_rating = $con->prepare("INSERT into tbl_rating (product_id, user_id , rating_val, ratingdate ) values ('$product_id','$user_id','$rating','$added_on')");
        $insert_rating->execute(); 
   
       }
header('location:productdetails.php?view_btn='.$product_id);
   
}

if(isset($_SESSION['useremail'])) {

    $test_rating = $con->prepare("SELECT * from tbl_rating where user_id='$user_id' and product_id='$product_id'");
$test_rating->execute();
foreach($test_rating as $row) {
    if($row['user_id'] ==$user_id and $row['product_id']==$product_id) {
      $test = 'Thank You for Rating';
    }
}

}




// ----------------Related Product---------------------
/*---------Getting id of category */
$get_id = $con->prepare("SELECT id from tbl_products p,tbl_category c where p.category_id=c.id and p.product_id='$product_id' ");
$get_id->execute();
foreach($get_id as $row) {
    $cat_id = $row['id'];
}
$related = $con->prepare("SELECT * from tbl_products p,tbl_category c where p.category_id=c.id and p.category_id='$cat_id' limit 4 ");
$related->execute();

?>

<!-- <?php //include('../includes/header.php') ?> -->
    <!-- Product Details -->
    <div class="product-details">
        <div class="row">
            <div class="col-2">
                <?php foreach($data as $row) {   ?>
                <div class="showcase-image">
                    <img src="./image/<?php  echo $row['productimage']?>" >
                </div>
            </div>
            <div class="col-2">

                
                <div class="showcase-content">
                <h1><?php  echo $row['productname']?></h1>
                <p class="categ-py"><?php  echo $row['categoryname']?></p>
                <!-- <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i> -->
                <h2 style="color:#FF523B">(<?php echo $m ?>/5.0 Stars) <span style="font-size:17px;color:#189CC8;font-weight:normal"><?php echo $r ?> Reviews | <?php echo $total ?> Comments</span> </h2>
                <hr style="margin-top:10px">
                <h3>Price : $<?php  echo $row['productprice'] ?></h3> 
                <h3 style="color:green">In Stock : <?php echo $q =  $row['productqty']?>  </h3>
                <form action="" method="POST">
                <select name="txtqty" id="">
                    <?php for ($i=1 ;$i<=$q ; $i++) { ?>
                        <option  > <?php echo $i ?></option>
                        
                  <?php   }  ?> 
                  
                
                    
                    
                    
                </select>
                <a href=""><button type="submit" name="buy_btn" class="btn bg-primary "> Buy Now </button></a>
                     <div >
                    
                </form> 
                </div>
                <h3  style="margin:0px">About this item</h3>
                  <br>
                <p ><?php  echo $row['productdescription']?></p>

                </div>
                    <!-- Comment  + Reviews -->
                  
       <h2 style="margin-bottom:20px"><?php echo $total ?> Comments</h2>
       <?php foreach($select as $row) {  ?>
       <div class="flex-comment-container" >
       <img src="./image/user.png" style="width:50px"  >
       <div>
       <h3><?php echo $row['username']." ".$row['userlastname'] ; ?></h3>
       <p><i class="far fa-calendar-alt"></i> <?php echo $row['commentdate'] ?></p>
       </div>
         <?php if(isset($_SESSION['useremail'])) {  if($_SESSION['id']==$row['user_id']) {  ?>
         <a href="?product_id=<?php echo $row['product_id'] ?> &&comment_id=<?php echo $row['comment_id'] ?> " ><i class="fas fa-trash" ></i></a>
         <?php }} ?>
       </div>
       <p><?php echo $row['comment_text'] ?></p>
      <?php }?>
  <?php if(isset($_SESSION['useremail'])) {  ?>

  <div class="add-rating">
      <form action="" method="POST">
  <select name="txtrating" >
      <option >1.0</option>
      <option >2.0</option>
      <option >3.0</option>
      <option >4.0</option>
      <option >5.0</option>
  </select>
  <button  type="submit" name="rating_btn" >Rate this Product </button> <span > <?php if(isset($test)) echo $test  ?> </span>
  </form>
  </div>


   <form action="" method="POST">
  <div class="add-comment">
  <input type="text" name="txtcomment" placeholder="Add a Publish Comment">
  <button type="submit" name="comment_btn" style="float:right"><i class="fas fa-plus-circle"></i></button>
  </div>
  </form>
<?php }?>
  <!-- end comment -->

                <?php }?>
               
            </div>
        </div>

        <hr style="margin-top:20px">

        <!-- ------------Related Products------>
        <div>
          <h2 style="margin:20px 0 30px 10px;color:#FF523B">Products related to this item</h2>
          <div class="row">
          <?php 
          foreach($related as $row) { ?>
            <div class="col-4">
            <a href="./productdetails.php?view_btn=<?php echo $row['product_id']?>">
            <img src="../eco/image/<?php echo $row['productimage'] ?>" >
        <h3 class="product-name"><?php echo $row['productname']?></h3>
            </a>

        <p class="product-category"><?php echo $row['categoryname']?></p>
        <div class="product-rating">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-o"></i>
          </div>
          <h4 class="product-price">$<?php echo $row['productprice']?></h4>
        </div>

           
            <?php } ?> 
       </div>
   <!-- -----------end Related Products---- -->
        </div>
    </div>

   

    <script src="../js/smooth.js"></script>
<?php include('../includes/footer.php')?>
