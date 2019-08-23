<?php include ROOT . '/view/admin/layers/header.php'; ?>
<div class="col-sm-4">
    <div class="product-image-wrapper">
        <div class="single-products">
            <div class="signup-form">
                <form action="#" method="POST" enctype="multipart/form-data">
                    <style>h4{color: #0480be}</style>
                    <h4>Название товара</h4>
                    <p>
                        <input type="text" name="name" placeholder="" value="<?php echo $product['name']; ?>">
                    </p>
                    <h4>Код товара</h4>
                    <p>
                        <input type="text" name="code" placeholder="" value="<?php echo $product['code']; ?>">
                    </p>
                    <h4>Цена</h4>
                    <p>
                        <input type="text" name="price" placeholder="" value="<?php echo $product['price']; ?>">
                    </p>
                    <h4>Категория</h4>
                    <select name="category_id">
                    <?php foreach ($categories as $c): ?>
                        <option value="<?php echo $c['id']; ?>"
                            <?php if ($product['category_id'] == $c['id']) echo ' selected="selected"'; ?>>
                            <?php echo $c['name']; ?>
                        </option>
                    <?php endforeach; ?>
                    </select>
                    <h4>Марка товара</h4>
                    <input type="text" name="brand" placeholder="" value="<?php echo $product['brand']; ?>"/>

                    <h4>Прикрепить изображение</h4>
                    <p>
                        <img src="<?php echo $product['image']; ?>" width="200" alt="" />
                    </p>
                    <p>
                        <input type="file" name="image" value="<?php echo $product['image']; ?>"/>
                    </p>
                    <h4>Описание</h4>
                    <p>
                        <textarea name="description"><?php echo $product['description']; ?></textarea>
                    </p>
                    <h4>Наличие на складе</h4>
                    <p>
                        <select name="availability">
                            <option value="1" <?php if ($product['availability'] == 1) echo ' selected="selected"'; ?>>Да</option>
                            <option value="0" <?php if ($product['availability'] == 0) echo ' selected="selected"'; ?>>Нет</option>
                        </select>
                    </p>
                    <h4>Новинка</h4>
                    <p>
                        <select name="is_new">
                            <option value="1" <?php if ($product['is_new'] == 1) echo ' selected="selected"'; ?>>Да</option>
                            <option value="0" <?php if ($product['is_new'] == 0) echo ' selected="selected"'; ?>>Нет</option>
                        </select>
                    </p>
                    <h4>Рекомендуемые</h4>
                    <p>
                        <select name="is_recommended">
                            <option value="1" <?php if ($product['is_recommended'] == 1) echo ' selected="selected"'; ?>>Да</option>
                            <option value="0" <?php if ($product['is_recommended'] == 0) echo ' selected="selected"'; ?>>Нет</option>
                        </select>
                    </p>
                    <h4>Статус</h4>
                    <p>
                        <select name="status">
                            <option value="1" <?php if ($product['status'] == 1) echo ' selected="selected"'; ?>>Отображается</option>
                            <option value="0" <?php if ($product['status'] == 0) echo ' selected="selected"'; ?>>Скрыт</option>
                        </select>
                    </p><br/>
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