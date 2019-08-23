<?php include ROOT . '/view/admin/layers/header.php'; ?>
<div class="col-sm-4">
    <div class="product-image-wrapper">
        <div class="single-products">
            <div class="signup-form">
                <form action="#" method="POST" enctype="multipart/form-data">
                    <style>h4{color: #0480be}</style>
                    <h4>Заголовок статьи</h4>
                    <p>
                        <input type="text" name="title" placeholder="" value="<?php echo $article['title']; ?>">
                    </p>
                    <h4>Краткое описание</h4>
                    <p>
                        <input type="text" name="descr" placeholder="" value="<?php echo $article['descr']; ?>">
                    </p>
                    <h4>Текст</h4>
                    <p>
                        <input type="text" name="text" placeholder="" value="<?php echo $article['text']; ?>">
                    </p>
                    <h4>Порядок сортировки</h4>
                    <input type="text" name="sort_order" placeholder="" value="<?php echo $article['sort_order'] ?>"/>
                    <h4>Статус</h4>
                    <p>
                        <select name="status">
                            <option value="1" <?php if ($article['status'] == 1) echo ' selected="selected"'; ?>>Отображается</option>
                            <option value="0" <?php if ($article['status'] == 0) echo ' selected="selected"'; ?>>Скрыт</option>
                        </select>
                    </p>
                    <h4>Прикрепить изображение</h4>
                    <p>
                        <img src="<?php echo $article['image']; ?>" width="200" alt="" />
                    </p>
                    <p>
                        <input type="file" name="image" value="<?php echo $article['image']; ?>"/>
                    </p>
                    <p>
                        <button type="submit" name="submit" class="btn btn-default">
                            <span style="padding-left: 68px; padding-right: 68px;">
                                Сохранить
                            </span>
                        </button>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>
<?php if (isset($errors) && is_array($errors)): ?>
    <div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                <ul>
                <?php foreach ($errors as $e): ?>
                    <li style="color:#F08080;font-weight:bold">
                        <?php echo $e; ?>
                    </li><br/>
                <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php include ROOT . '/view/admin/layers/footer.php';