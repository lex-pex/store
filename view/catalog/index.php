<?php include ROOT . '/view/layers/header.php' ?>
<section>
    <div class="container">
        <div class="row">
            <?php include ROOT . '/view/layers/left_bar.php'; ?>
            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <h2 class="title text-center">каталог</h2>
                    <?php foreach ($products as $product): ?>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <a href="/product/<?php echo $product['id']; ?>">
                                            <img src="<?php echo $product['image']; ?>" alt="" />
                                            <h2>$<?php echo $product['price']; ?></h2>
                                            <p><?php echo $product['name']; ?></p>
                                        </a>
                                        <!--<a href="/cart/add/"-->
                                        <a href="#"  data_id="<?php echo $product['id']; ?>"
                                           class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>
                                            В корзину
                                        </a>
                                    </div>
                                    <?php if ($product['is_new']): ?>
                                        <img src="/design/images/home/new.png" class="new" alt=""/>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div><?php echo $pager->get(); ?></div>
                <?php include ROOT . '/view/layers/rotator.php'; ?>
            </div>
        </div>
    </div>
</section>

<?php
include ROOT . '/view/layers/footer.php';



