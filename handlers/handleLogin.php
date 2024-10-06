<?php 
require_once'../App.php';

if ($request->hasRequest($request->post("submit"))) {
    $email = $request->post('email');
    $password = $request->post('password');

    $validate->rules('email',$email,['required','email']);
    $validate->rules('password',$password,['required']);

    if (! $validate->errors) {
        $admin = $admin->login($email,$password);
        if ($admin) {
        $session->set("userName",$admin['username']);
        $session->set("adminId",$admin['id']);
        $request->redirect("../index.php");

        } else {
        $session->set("errors",["credentails not correct"]);
        $request->redirect("../login.php");
        }
 
    } else {
        $session->set("errors",$validate->errors);
        $request->redirect("../login.php");
    }
    


} else {
    $request->redirect("../login.php");
}





?>