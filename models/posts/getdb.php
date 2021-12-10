<?php
//models/posts/gedb.php

function getdb($f3, $limit){
    $post = new DB\SQL\Mapper($f3->get('DB'),'posts');
    $post->load([], ['order'=>'postDate DESC', 'limit'=>$limit]);
    return $post;
}