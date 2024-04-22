<?php 
include('../includes/header.php');
$catname = $con->prepare("SELECT * from tbl_category");
$catname->execute();
?>
<!-- Category Name -->
<div class="categories">
      <div class="categ-test">
        <div class="row-2">
            <h2 class="title" style="margin-bottom:20px">All Categories</h2>
        </div>
    <div class="row">
        <?php foreach($catname as $row) {?>
         <div class="col-3">
             <h2><?php echo $row['categoryname']?></h2>
             <a href="./category.php?id=<?php echo $row['id']?>">  <img src="./image/<?php echo $row['categoryimage']?>" ></a>
         </div>
        <?php }?>
    </div>
    </div>
</div> 
<script src="../js/smooth.js"></script>  
<?php 
include('../includes/footer.php');
?>