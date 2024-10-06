<?php include 'inc/header.php'; ?>

<?php 
require_once  './App.php'
?>
<?php 
$products = $product->getAll();
?>
<div class="container my-5">

    <div class="row">
    <?php 
            if ($session->hasSession($session->get('success'))) {
                foreach ($session->get('success') as $succ) {?>
                    <div class="alert alert-success"><?=$succ ?></div>
                        <?php  }
                        $session->unset('success');
                    }
            ?> 
            <?php 
            if(!empty($products)){
            
            
            ?>

<?php 
foreach ($products as $product){ ?>
    <div class="col-lg-4 mb-3">



            <div class="card">
            <img src="images/<?=$product['img']?>" class="card-img-top">
            <div class="card-body">
            <h5 class="card-title"><?=$product['name']?></h5>
            <p class="text-muted"><?=$product['price']?>EGP</p>
            <p class="card-text"><?= Str::limit($product['desc'])?></p>
            <a href="show.php?id=<?=$product['id']?>" class="btn btn-primary">Show</a>
            <?php 
            if ($session->hasSession($session->get("adminId"))) {
            
            ?>
            <a href="edit.php?id=<?=$product['id']?>" class="btn btn-info">Edit</a>
            <a href="handlers/delete.php?id=<?=$product['id']?>" class="btn btn-danger">Delete</a>
            <?php } ?>
            </div>
        </div>
        
        
    </div> 

    <?php  }}else { ?>
        <div class="alert alert-warning">NO PRODUCTS</div>
    <?php } ?>
    </div>

</div>



<?php include 'inc/footer.php'; ?>