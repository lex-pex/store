<?php


class AdminCategoryController {
    
    public function actionIndex() {
        Admin::checkAdmin();
        $title = 'Категории';
        $categories = Category::getCategoriesList(false);
        require_once(ROOT.'/view/admin/category/index.php');
        return true;
        
    }
    
    public function actionCreate() {

        Admin::checkAdmin();
        $title = 'Создание категории';
        $categories = Category::getCategoriesList();

        $errors = false;
        $category = array();

        if (isset($_POST['submit'])) {

            $category['name'] = mb_strtolower(trim($_POST['name']), 'UTF-8');
            $category['sort_order'] = trim($_POST['sort_order']);
            $category['status'] = $_POST['status'];

            if (!isset($category['name']) || empty($category['name'])) {
                $errors[] = 'Заполните поле Название';
            }

            if ($this->exists($category['name'], $categories)) {
                $errors[] = 'Такая категория уже есть';
            }
            
            if ($errors == false) {
                if(Category::createCategory($category)) {
                    header("Location: /admin/category");
                }
            }
        }

        require_once(ROOT.'/view/admin/category/create.php');
        return true;
    }

    private function exists($str, $array) {
        for ($i = 0; $i < count($array); $i ++) {
            foreach ($array[$i] as $val) {
                if(strnatcasecmp($str, $val) == 0) {
                    return true;
                }
            }
        }
        return false;
    }

    public function actionUpdate($id) {
        Admin::checkAdmin();
        $title = 'Изменение категории # '.$id;

        $currentCategory = Category::getCategoryById($id);

        $errors = false;
        $category = array();

        if (isset($_POST['submit'])) {

            $category['name'] = mb_strtolower(trim($_POST['name']), 'UTF-8');
            $category['sort_order'] = trim($_POST['sort_order']);
            $category['status'] = $_POST['status'];

            if (!isset($category['name']) || empty($category['name'])) {
                $errors[] = 'Заполните поле Название';
            }

            if ($errors == false) {
                if(Category::updateCategoryById($id, $category)) {
                    header("Location: /admin/category");
                }
            }
        }
        
        require_once(ROOT.'/view/admin/category/update.php');
        return true;
    }
    
    public function actionDelete($id) {
        Admin::checkAdmin();
        $title = 'Удаление категории';
        $res = false;
        if (isset($_POST['submit'])) {
            $res = Category::deleteById($id);
            $this->actionIndex();
        } else {
            require_once(ROOT.'/view/admin/category/delete.php');
        }
        return true;
    }
}
