<?php
//models/post/paginatedb.php

function paginatedb($f3){
    require('setting.php');
    $limit = $setting['backendPostLimit'];
    $page = (int)($f3->get('PARAMS.page'));

    $post = new DB\SQL\Mapper($f3->get('DB'),'posts');
    $post->load([], ['order'=>'postDate DESC', 'offset'=>$page*$limit, 'limit'=>$limit]);

    return $post;
}