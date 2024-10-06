<?php include 'inc/header.php'; ?>

<?php require_once  './App.php'?>

<?php 
//$id =$_GET['id'];

$id = $request->get('id');
$product =$product->getOne($id);


?>
<div class="container my-5">

    <div class="row">


    <div class="col-lg-6">
            <img src="images/<?=$product['img']?>" class="card-img-top">
            </div>
            <div class="col-lg-6">
            <h5 ><?=$product['name']?></h5>
            <p class="text-muted">price:<?=$product['price']?>EGP</p>
            <p><?=$product['desc']?></p>
            <a href="index.php" class="btn btn-primary">Back</a>
            <?php 
            if ($session->hasSession($session->get("adminId"))) {
            
            ?>
            <a href="edit.php?id=<?=$product['id']?>" class="btn btn-info">Edit</a>
            <a href="handlers/delete.php?id=<?=$product['id']?>" class="btn btn-danger">Delete</a>
            <?php } ?>
        </div>
        
    </div>
</div>



<?php include 'inc/footer.php'; ?>