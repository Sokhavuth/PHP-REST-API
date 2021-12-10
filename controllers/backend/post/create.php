<?php 
//controllers/backend/post/create.php

function create($f3){
    if($f3->get('SESSION.role') != 'visitor'){
        $title = $f3->get('POST.title');
        $content = $f3->get('POST.content');
        $category = $f3->get('POST.category');
        $thumb = $f3->get('POST.thumb');
        $date = $f3->get('POST.date');
        $video = $f3->get('POST.video');
        $userID = $f3->get('SESSION.userID');
    
        $post = new DB\SQL\Mapper($f3->get('DB'),'posts');

        $post->id = uniqid();
        $post->title = $title;
        $post->content = $content;
        $post->category = $category;
        $post->thumb = $thumb;
        $post->postDate = $date;
        $post->video = $video;
        $post->userID = $userID;
        $post->save();
    }
    
    $f3->reroute('/backend/post');
}