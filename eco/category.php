<?php 
include('../includes/header.php');
$id = $_GET['id'];
$catname = $con->prepare("SELECT * from tbl_category  where id='$id'  ");
$catname->execute();
?>
<!-- Category Name -->
<div class="products pp">
        <div class="row-2">
            <?php foreach($catname as $ro) {?>
            <h2 class="title"><?php echo $ro['categoryname']?> </h2>
            <?php }?>
        </div>
    <div class="row">
        <?php include('../includes/categorycomponent.php');?>
    </div>
</div>  
<script src="../js/smooth.js"></script> 
<?php 
include('../includes/footer.php');
?>