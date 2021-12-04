<?php
//routes/frontend/login.php

$f3->route('GET /login', function($f3){
    if($f3->get('SESSION.userID')){
        $f3->reroute('/backend/post');
    }else{
        require('controllers/frontend/login/get.php');
        get($f3);
    }
        
});

$f3->route('POST /login', function($f3){
    require('controllers/frontend/login/checkUser.php');
    checkUser($f3);
});

$f3->route('GET /backend/logout', function($f3){
    if($f3->get('SESSION.userID')){
        $f3->clear('SESSION');
        $f3->reroute('/');
    }else{
        $f3->reroute('/login');
    }
});