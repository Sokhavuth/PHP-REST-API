<?php
//controllers/backend/post/delete.php

function deletedb($f3){
    $post = new DB\SQL\Mapper($f3->get('DB'),'posts');
    $post->load(['id=?',$f3->get('PARAMS.id')]);
    $post->erase();
}