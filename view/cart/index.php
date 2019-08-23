<?php include ROOT . '/view/layers/header.php' ?>
<section>
    <div class="container">
        <div class="row">
            <?php include ROOT . '/view/layers/left_bar.php'; ?>
            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">корзина</h2>
                        <h2>товары в корзине:</h2>
                    <br/>
                    <table class="table-bordered table-striped table">
                        <tr>
                            <th>
                                Код товара:
                            </th>
                            <th>
                                Название:
                            </th>
                            <th>
                                Стоимость:
                            </th>
                            <th>
                                Количество:
                            </th>
                            <th>
                                Удалить:
                            </th>
                        </tr>
                        <tr><td colspan="5">&nbsp;</td></tr>
                        <?php foreach ($products as $product => $prod) : ?>
                        <tr>
                            <td>
                                <?php echo $prod['code']; ?>
                            </td>
                            <td>
                                <a href="/product/<?php echo $prod['id']; ?>">
                                    <?php echo $prod['name']; ?>
                                </a>
                            </td>
                            <td>
                                $ <?php echo $prod['price']; ?>
                            </td>
                            <td>
                                <?php echo $prodsInCart[$prod['id']]; ?>
                            </td>
                            <td>
                                <a href="/cart/del/<?php echo $prod['id']; ?>">
                                    <i class="fa fa-times"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td colspan="2">
                                <h4>Общая стоимость:</h4>
                            </td>
                            <td colspan="3">
                                <h4>$ <?php echo $totalPrice; ?></h4>
                            </td>
                        </tr>
                    </table>
                    <?php if (Cart::countItems() > 0) : ?>
                    <a href="/cart/order/" class="btn btn-default">
                        <i class="fa fa-shopping-cart"></i>
                        Оформить заказ
                    </a>
                    <?php else : ?>
                    <h3>Корзина пуста</h3>
                    <?php endif; ?>
                    <br/><br/><br/>
                    <?php include ROOT . '/view/layers/rotator.php'; ?>
                </div>
                
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/view/layers/footer.php'; ?>



