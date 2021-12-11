<?php
//routes/backend/post.php

$f3->route('GET /backend/post', function($f3){
    if($f3->get('SESSION.userID')){
        require('controllers/backend/post/get.php');
        get($f3);
    }else{
        $f3->reroute('/login');
    }
});

$f3->route('POST /backend/post', function($f3){
    if($f3->get('SESSION.userID')){
        require('controllers/backend/post/create.php');
        create($f3);
    }else{
        $f3->reroute('/login');
    }
});

$f3->route('GET /backend/post/edit/@id', function($f3){
    if($f3->get('SESSION.userID')){
        require('controllers/backend/post/edit.php');
        edit($f3);
    }else{
        $f3->reroute('/login');
    }
});

$f3->route('GET /backend/post/delete/@id', function($f3){
    if($f3->get('SESSION.userID')){
        require('controllers/backend/post/delete.php');
        delete($f3);
    }else{
        $f3->reroute('/login');
    }
});

$f3->route('GET /backend/post/paginate/@page', function($f3){
    if($f3->get('SESSION.userID')){
        require('controllers/backend/post/paginate.php');
        paginate($f3);
    }else{
        $f3->reroute('/login');
    }
});