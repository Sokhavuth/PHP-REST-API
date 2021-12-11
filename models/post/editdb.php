<?php
//controllers/backend/post/editdb.php

function editdb($f3,$limit){
    $post = new DB\SQL\Mapper($f3->get('DB'),'posts');
    $post->load(['id=?',$f3->get('PARAMS.id')]);
    $posts = new DB\SQL\Mapper($f3->get('DB'),'posts');
    $posts->load([], ['order'=>'postDate DESC', 'limit'=>$limit]);

    return [$post, $posts];
}