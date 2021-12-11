<?php 
//controllers/backend/post/create.php

function create($f3){
    if($f3->get('SESSION.role') != 'visitor'){
        require('models/post/createdb.php');
        createdb($f3);
    }
    
    $f3->reroute('/backend/post');
}