<?php
//controllers/frontend/login/checkUser.php

function checkUser($f3){
    $user=new DB\SQL\Mapper($f3->get('DB'),'users');
    $user->load(array('email=? AND password=?',$f3->get('POST.email'),md5($f3->get('POST.password'))));
    
    require('setting.php');
    $f3->mset([
        'appName'=>$setting['siteTitle'], 
        'pageTitle'=>'ទំព័រ​លការផ្សាយ', 
        'date'=>$setting['date']
    ]);

    if($user->userID){
        $f3->set('SESSION.userID', $user->userID);
        $f3->set('SESSION.role', $user->role);
        $f3->reroute('/backend/post');
    }else{
        $f3->set('message', 'Email និងឬ​ ពាក្យ​សំងាត់​​មិនត្រឹមត្រូវ​ទេ!');
        echo View::instance()->render('views/frontend/login.html');
    }
}