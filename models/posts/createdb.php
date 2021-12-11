<?php 
//models/post/createdb.php

function createdb($f3){
    if($f3->get('SESSION.role') != 'visitor'){
        $title = $f3->get('POST.title');
        $content = $f3->get('POST.content');
        $category = $f3->get('POST.category');
        $thumb = $f3->get('POST.thumb');
        $date = $f3->get('POST.date');
        $video = $f3->get('POST.video');
        $userID = $f3->get('SESSION.userID');
        $editID = $f3->get('POST.editID');
       
        $post = new DB\SQL\Mapper($f3->get('DB'),'posts');
        if($editID){
            $post->load(['id=?',$editID]);
        }else{
            $post->id = uniqid();
        }

        $post->title = $title;
        $post->content = $content;
        $post->category = $category;
        $post->thumb = $thumb;
        $post->postDate = $date;
        $post->video = $video;
        $post->userID = $userID;
        $post->save();
    }
}