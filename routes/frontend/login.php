<?php
//routes/frontend/login.php

$f3->route('GET /login', function($f3){
    require('controllers/frontend/login/get.php');
    get($f3);
});