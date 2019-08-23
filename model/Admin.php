<?php

class Admin {
    
    public static function checkAdmin() {
        
        $id = User::checkLogged();
        $user = User::getUserById($id);
        
        if ($user['role'] == 'admin') {
            return true;
        }
        header("Location: /");
    }
}
