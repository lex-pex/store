<?php include ROOT . '/view/layers/header.php' ?>
<section>
    <div class="container">
        <div class="row">
            <?php include ROOT . '/view/layers/left_bar.php'; ?>
            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <h2 class="title text-center">Оформление заказа</h2>
                    <?php if ($result) : ?>
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <h3>Заказ оформлен</h3>
                                <h3>Всего товаров: <?php echo $amountItems; ?></h3>
                                <h3>На сумму: $ <?php echo $totalPrice; ?></h3>
                                <br/>
                                <p>Наш менеджер свяжется с Вами.</p>
                                <br/>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <h3>Что-нибудь еще?</h3>
                                <h3>Подпишитесь на рассылку СУПЕР предложений</h3>
                                <br/>
                                <p>
                                    Наш менеджер поможет Вам быть в курсе всего,
                                    самых лучших и выгодных предложений, акций,
                                    викторин, призов и подарков
                                </p>
                                <br/>
                            </div>
                        </div>
                    </div>
                    <?php else : ?>
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <h2>Всего товаров: <?php echo $amountItems; ?></h2>
                                    <h2>На сумму: $ <?php echo $totalPrice; ?></h2>
                                    <br/>
                                    <p>
                                        Для оформления заказа заполните форму ниже.
                                        Наш менеджер свяжется с Вами.
                                    </p>
                                    <br/>
                                    <div class="signup-form">
                                        <form action="#" method="post">
                                            <input type="text" name="name" placeholder="Имя" value="<?php echo $name; ?>" />
                                            <input type="text" name="phone" placeholder="Телефон" value="<?php echo $phone; ?>" />
                                            <textarea type="text" name="comment" placeholder="Коментарий к заказу"
                                                      value="<?php echo $comment; ?>"></textarea><br/><br/>
                                            <button type="submit" name="submit" class="btn btn-default">
                                                Оформить
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php if (isset($errors) && is_array($errors)): ?>
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <?php foreach ($errors as $e): ?>
                                    <h5 style="color:#F08080;font-weight:bold">
                                        <?php echo $e; ?>
                                    </h5>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <br/><br/><br/>
                </div>
                <?php include ROOT . '/view/layers/rotator.php'; ?>
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/view/layers/footer.php'; ?>



