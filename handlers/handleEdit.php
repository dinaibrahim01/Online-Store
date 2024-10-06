<?php
require_once '../App.php';
$id = $request->get('id');


if ($request->hasRequest($request->post('submit'))) {

    $name = $request->post('name');
    $desc = $request->post('desc');
    $price = $request->post('price');
    $img = $request->file('img');


    //validation
    $validate->rules('name',$name,['required','string','max:100']);
    $validate->rules('desc',$desc,['required','string']);
    $validate->rules('price',$price,['required','number']);
    $validate->rules('img',$img['name'],['img']);



    if(! $validate->errors){
        $prod = $product->getOne('id');
        if($img['name']){
            $img = new Img($img);
            $result = $product->updateproduct($name,$desc,$price,$img->new_name,$id);
            if($result){

                $img->upload();
                $img->delete($prod['img']);
                $session->set("success",['product update successfully']);
                $request->redirect("../index.php");
            }else{
                $session->set("errors",['error while update product']);
                $request->redirect("../edit.php?id=$id");
            }

        }else{
            $result = $product->updateproduct($name,$desc,$price,$prod['img'],$id);
            if ($result){
                $session->set("success",['product update successfully']);
                $request->redirect("../index.php");
            }else{
                $session->set("errors",['error while update product']);
                $request->redirect("../edit.php?id=$id");
            }
        }
    }else{
        $session->set('errors',$validate->errors);
        $request->redirect("../edit.php?id=$id");
    }
}
