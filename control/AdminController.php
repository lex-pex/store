<?php

class AdminController {

    public function actionIndex() {
        Admin::checkAdmin();
        $title = $_SESSION['u']['name'];
        
        require_once(ROOT.'/view/admin/index.php');
        return true;
        
    }

}
