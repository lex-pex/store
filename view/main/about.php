<?php include ROOT . '/view/layers/header.php' ?>
<section>
    <div class="container">
        <div class="row">
            <?php include ROOT . '/view/layers/left_bar.php'; ?>
            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products" style="padding:10px;text-align:center">
                                <h2 class="title text-center">About this Website</h2><b>
                                <p>
                                    The site is a self-sufficient online store.
                                </p>
                                <p>
                                    All functionality is written by hand without frameworks and libraries.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <img width="100%" src="/upload/images/folder/piggy_003_1.gif"/>
                            </div>
                        </div>
                    </div>
                </div>
                <?php include ROOT . '/view/layers/rotator.php'; ?>
            </div>
        </div>
    </div>
</section>
<?php
include ROOT . '/view/layers/footer.php';
