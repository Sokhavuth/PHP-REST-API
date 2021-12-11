<?php
//controllers/backend/post/delete.php

function delete($f3){
    if($f3->get('SESSION.role') != 'visitor'){
        require('models/post/deletedb.php');
        deletedb($f3);
    }
    
    $f3->reroute('/backend/post');
}