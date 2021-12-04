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