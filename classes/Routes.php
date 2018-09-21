<?php
Route::set('index.php', function(){
    // echo '<h1>About Page</h1';
    IndexCtrl::CreateView('Index');
});
Route::set('about', function(){
    // echo '<h1>About Page</h1';
    AboutCtrl::CreateView('About');
});
Route::set('login', function(){
    LoginCtrl::CreateView('Login');
});
Route::set('register', function(){
    RegisterCtrl::CreateView('Register');
});
Route::set('newOrder', function(){
    LoginCtrl::CreateView('NewOrder');
});
?>