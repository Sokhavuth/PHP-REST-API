<?php
//controllers/backend/paginate.php

function paginate($f3){
    require('models/post/paginatedb.php');
    $post = paginatedb($f3);
   
    $arrPost = [];
    $data = [];
    while($post->id){
        $arrPost = [];
        array_push($arrPost, $post->id,$post->title,$post->thumb,$post->video,$post->postDate);
        array_push($data, $arrPost);
        $post->skip();
    }
    
    echo json_encode($data);
}
