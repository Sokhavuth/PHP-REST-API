<?php
//controllers/frontend/login/createUserTable.php

function createUserTable($f3){
    $sql = "CREATE TABLE IF NOT EXISTS users (
        userID TEXT,
        email TEXT,
        username TEXT,
        password TEXT,
        role TEXT,
        thumb TEXT,
        info TEXT,
        video TEXT,
        date TEXT
    )";

    $f3->get('DB')->exec($sql);

    $user = new DB\SQL\Mapper($f3->get('DB'),'users');
    $user->userID = uniqid();
    $user->email = 'root@khmerweb.app';
    $user->username = 'root';
    $user->password = md5('password');
    $user->role = 'admin';
    $user->thumb = '';
    $user->info = '';
    $user->video = '';
    $user->date = '';
    $user->save();
}