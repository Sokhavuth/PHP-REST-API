<?php
//controllers/frontend/login/createUserTable.php

function createTable($f3){
    $sql = "CREATE TABLE IF NOT EXISTS posts (
        id TEXT,
        title TEXT,
        content TEXT,
        category TEXT,
        thumb TEXT,
        postDate TEXT,
        video TEXT,
    )";

    $f3->get('DB')->exec($sql);

    //$user = new DB\SQL\Mapper($f3->get('DB'),'posts');
}