<?php
//controllers/frontend/login/checkUser.php

function checkUser($f3){
    $collection = $f3->get('DB')->users;
    $user = $collection->findOne(['email'=>$f3->get('POST.email')]);

    require_once('setting.php');
    $f3->mset([
        'appName'=>$setting['siteTitle'], 
        'title'=>'ទំព័រ​ដើម', 
        'date'=>$setting['date']
    ]);
        
    if($user){
        $password = $collection->findOne(['password'=>$f3->get('POST.password')]);
        if($password){
            $f3->set('SESSION.email', $user['email']);
            $f3->reroute('/admin');
        }else{
            $f3->set('message', 'ពាក្យ​សំងាត់​មិនត្រឹមត្រូវ​ទេ');
            $view = new View;
            echo $view->render('views/login.php');
        }
    }else{
        $f3->set('message', 'Email ​មិនត្រឹមត្រូវ​ទេ');
        $view = new View;
        echo $view->render('views/login.php');
    }
}