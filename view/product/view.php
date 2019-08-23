<?php include ROOT . '/view/layers/header.php' ?>

<section>
    <div class="container">
        <div class="row">
            <?php include ROOT . '/view/layers/left_bar.php'; ?>
            <div class="col-sm-9 padding-right">
                <div class="product-details"><!--product-details-->
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="view-product">
                                <img src="<?php echo $product['image']; ?>" alt="" />
                            </div>
                            <?php if ($product['is_new']): ?>
                                <img src="/design/images/home/new.png" class="new" alt=""/>
                            <?php endif; ?>
                        </div>
                        <div class="col-sm-7">
                            <div class="product-information"><!--/product-information-->
                                <!--<img src="images/product-details/new.jpg" class="newarrival" alt="" />-->
                                <h2><?php echo $product['name']; ?></h2>
                                <p>Код товара: <?php echo $product['code']; ?></p>
                                <span>
                                    <!--<form action="/cart/add/<?php //echo $product['id']; ?>">-->
                                        <span>$<?php echo $product['price']; ?></span>
                                        <label>Кол-во:</label>
                                        <input type="text" value="3" />
                                        <button
                                            data_id="<?php echo $product['id']; ?>"
                                            type="submit" class="btn btn-fefault cart add-to-cart">
                                            <i class="fa fa-shopping-cart"></i>
                                            В корзину
                                        </button>
                                    <!--</form>-->
                                </span>
                                <p><b>Наличие:</b>
                                    <?php if ($product['status']): ?>
                                        На складе
                                    <?php else: ?>
                                        Нет в наличии
                                    <?php endif; ?></p>
                                <p><b>Состояние:</b> Новое</p>
                                <p><b>Производитель: </b><?php echo $product['brand']; ?></p>
                            </div><!--/product-information-->
                        </div>
                    </div>
                    <div class="row">                                
                        <div class="col-sm-12">
                            <h5>Описание товара</h5>
                            <p>
                                <?php echo $product['description'] ?>
                            </p>
                        </div>
                    </div>
                    <?php include ROOT . '/view/layers/rotator.php'; ?>
                </div><!--/product-details-->
            </div>
        </div>
    </div>
</section>
<br/><br/>
<?php include ROOT . '/view/layers/footer.php'; ?>
