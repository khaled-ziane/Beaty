<?php 
include('dbconnect.php');
// $sql = "SELECT * from tbl_products p where p.productcategory='$name' ";
$sql = "SELECT * from tbl_products p,tbl_category c where p.category_id=c.id and c.id='$id' ";
$data = $con->prepare($sql);
$data->execute();

?>
      
      <?php 
       foreach($data as $row) { 
        ?>
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
        
       
       
      
           
            
    
