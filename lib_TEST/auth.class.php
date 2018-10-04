<?php
class Auth{

    public static function loggedIn(){
        return isset($_SESSION['user_id']);
    }

    public static function userId(){
        
        return $_SESSION['user_id'];
    }

    public static function userLevel(){
        return $_SESSION['user_level'];
    }

    public static function isAdmin(){
        if (isset( $_SESSION['user_level']) &&  $_SESSION['user_level'] == 0){
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    public static function userName(){
        return $_SESSION['full_name'];
    }

    
}