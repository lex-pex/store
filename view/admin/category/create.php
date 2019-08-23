<?php include ROOT . '/view/admin/layers/header.php'; ?>
<div class="col-sm-4">
    <div class="product-image-wrapper">
        <div class="single-products">
            <div class="signup-form">
                <form action="#" method="POST">
                    <style>h4{color: #0480be}</style>
                    <h4>Название категории</h4>
                    <p>
                        <input type="text" name="name" placeholder="" value="">
                    </p>
                    <h4>Порядок сортировки</h4>
                    <p>
                        <input type="text" name="sort_order" placeholder="" value="">
                    </p>
                    <h4>Статус</h4>
                    <p>
                        <select name="status">
                            <option value="1" selected="selected">Отображается</option>
                            <option value="0">Скрыт</option>
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