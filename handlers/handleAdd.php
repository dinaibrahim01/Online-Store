<?php
require_once '../App.php';


if ($request->hasRequest($request->post('submit'))) {

    $name = $request->post('name');
    $desc = $request->post('desc');
    $price = $request->post('price');
    $img = $request->file('img');


    //validation
    $validate->rules('name',$name,['required','string','max:100']);
    $validate->rules('desc',$desc,['required','string']);
    $validate->rules('price',$price,['required','number']);
    $validate->rules('img',$img['name'],['required','img']);



    if(! $validate->errors){
        $img = new Img($img);
        $result = $product->addproduct($name,$desc,$price,$img->new_name);
        if($result){
            $img->upload();
            $session->set('success',['product added successfully']);
            $request->redirect("../index.php");
        }else{
            $session->set('errors',['error while add product']);
            $request->redirect("../add.php");
        }


} else {
    $session->set('name',$name);
    $session->set('desc',$desc);
    $session->set('price',$price);
    $session->set('errors',$validate->errors);
    $request->redirect("../add.php");
}

}else{
    $request->redirect("../add.php");
}