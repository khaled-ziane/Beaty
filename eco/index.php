
 <?php 
include('../includes/header.php');
$select = $con->prepare("SELECT * from tbl_category");
$select->execute();

 $select2 = $con->prepare("SELECT * from tbl_products  order by product_id DESC  limit 4 ");
 $select2->execute();

?>

<div class="header-main">
<main>
        <div class="box-1">  
            <h1 style="font-size:60px">Shop With US <br> Browse Our Products</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. <br>
                Aperiam voluptatem obcaecati, vel, ipsum laborum eum    <br>
                repellendus aut eveniet sequi nesciunt, reprehenderit    <br>
                 eaque doloremque mollitia voluptate tempora totam natus. <br>
                  Neque et laudantium repellendus quod voluptatum nulla ad,<br>  asperiores quas natus voluptate.</p>
            <a href="./products.php" class="btn bg-primary" style="text-align:center">Show More</a>
        </div>
        <div class="box-2">
             <img src="../img/anna-Rv.png" alt="main-photo">
        </div>
    </main>
</div>
 <!-- Categories -->
 <div class="categories " >
     <div class="row">
        <?php foreach($select as $row) {?>
         <div class="col-3">
             <h2><?php echo $row['categoryname']?></h2>
             <a href="./category.php?id=<?php echo $row['id']?>">  <img src="./image/<?php echo $row['categoryimage']?>" ></a>
         </div>
        <?php }?>
     </div>
 </div>
    <!-- Latest Products -->
    <div class="products">
        <div class="row-2">
            <h2>Latest Products</h2>
        </div>
        <div class="row">
        <?php foreach($select2 as $row) { ?>
            <div class="col-4">
            <a href="./productdetails.php?view_btn=<?php echo $row['product_id']?>">
            <img src="../eco/image/<?php echo $row['productimage'] ?>" >
                <h3 class="product-name"><?php echo $row['productname']?></h3>
                </a>
                <div class="product-rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                  </div>
                  <h4 class="product-price">$<?php echo $row['productprice']?></h4>
            </div>
            <?php }?>
           
           
           
        </div>
    </div>
    <!-- Offre Chebab -->
    <div class="offer">
        <div class="row">
            <div class="col-2">
                <img src="./image/8-Rv.png" >
           </div>
        <div class="col-2">
            <p> Exclusively available and Popular Product on Beauty </p>
            <h1>Smart Watch  <br> Get it Now !!!!</h1>
            <p>Don't Forget to Buy This it's a Good Oppertunity 
                for u So go fast Buy it it's gonna be gone for a 
                few days ...... 
            </p>
            <a href="" class="btn bg-primary" style="text-align:center">Buy Now</a>
        </div>
       
    </div>
    </div>
    <!-- testimonial -->
    <div class="testimonial">
        <div class="row">
            <div class="col-3">
                <i  class="fa fa-quote-left text-primary" ></i>
                <p>Lorem ipsum dolor sit
                     amet consectetur adipisicing 
                     elit. Repellendus, corrupti
                      possimus aut ipsa odio, 
                      sint veritatis rem libero
                       officiis quaerat, rerum nam
                        voluptates placeat quisquam
                         eligendi quos molestias 
                         itaque vero? possimus aut ipsa odio, 
                         sint .</p>
                         <div class="product-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                      </div>
                      <img src="../img/buyerRv.jpg" alt="">
                      <h3>Khaled</h3>

            </div>
            <div class="col-3">
                <i class="fa fa-quote-left text-primary"></i>
                <p>Lorem ipsum dolor sit
                     amet consectetur adipisicing 
                     elit. Repellendus, corrupti
                      possimus aut ipsa odio, 
                      sint veritatis rem libero
                       officiis quaerat, rerum nam
                        voluptates placeat quisquam
                         eligendi quos molestias 
                         itaque vero?</p>
                         <div class="product-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                      </div>
                      <img src="../img/buyerRv.jpg" alt="">
                      <h3>Khaled </h3>

            </div>
            <div class="col-3">
                <i class="fa fa-quote-left text-primary"></i>
                <p>Lorem ipsum dolor sit
                     amet consectetur adipisicing 
                     elit. Repellendus, corrupti
                      possimus aut ipsa odio, 
                      sint veritatis rem libero
                       officiis quaerat, rerum nam
                        voluptates placeat quisquam
                         eligendi quos molestias 
                         itaque vero?  possimus aut ipsa odio, 
                         sint</p>
                         <div class="product-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                      </div>
                      <img src="../img/buyerRv.jpg" alt="">
                      <h3>Khaled</h3>

            </div>
        </div>
        
    </div>


    
    <script src="../js/smooth.js"></script>
   
    
<?php 
    include('../includes/footer.php');
?>
    