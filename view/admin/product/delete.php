<?php include ROOT . '/view/admin/layers/header.php'; ?>
<section>
    <div class="container">
        <div class="row">

            <h4>Подтверждение удаления</h4>
            <h4>товара по <b>id: # <?php echo $id; ?></b></h4>
            <h3>Продолжить?</h3>
            <br/>
            <form method="POST">
                <a class="btn btn-fefault cart add-to-cart" href="/admin/product/">< Назад</a>
                <input class="btn btn-fefault cart add-to-cart" type="submit" name="submit" value="Удалить" />
            </form>
        </div>
    </div>
</section>
<?php include ROOT . '/view/admin/layers/footer.php';