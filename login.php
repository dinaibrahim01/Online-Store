<?php include 'inc/header.php';?>
<?php require_once 'App.php';?>


<div class="container my-5">
    <div class="row">
        <div class="col-lg-6 offset-lg-3">

            <?php 
            if ($session->hasSession($session->get('errors'))) {
            foreach ($session->get('errors') as $error) {?>
            <div class="alert alert-danger"><?=$error ?></div>
                <?php  }
                $session->unset('errors');
            }
            
            ?>
            <form action="handlers/handleLogin.php" method="POST">
                <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="text" class="form-control" id="email" name = "email">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">password:</label>
                    <input type="number" class="form-control" id="password" name="password">
                </div>
                <center><button on type="submit" class="btn btn-primary" name="submit">Add</button></center>
            </form>
        </div>
    </div>
</div>


<?php include 'inc/footer.php'; ?>