<?php 

require_once'../App.php';

$id = $request->get('id');
$prod = $product->getOne('id');
$result = $product->delete($id);
if ($result) {
    Img::delete($prod['img']);
    $session->set("success",['product deleted successfully']);
    $request->redirect("../index.php");
} else {
    $session->set("errors",['error while deleted']);
    $request->redirect("../index.php");
}


?>