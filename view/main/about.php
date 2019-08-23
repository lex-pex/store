<?php include ROOT . '/view/layers/header.php' ?>
<section>
    <div class="container">
        <div class="row">
            <?php include ROOT . '/view/layers/left_bar.php'; ?>
            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <h2 class="title text-center">Об этом сайте</h2><b>
                                <p>
                                    &nbsp;Сайт представляет собой простейший интернет магазин.
                                    Функциональность хотя и минимальная, но полностью
                                    покрывает все базовые потребности не большого
                                    интернет-предприятия.
                                </p>
                                <p>
                                    &nbsp;Движок сайта находится в постоянной разработке, 
                                    развиваясь, уплотняя свой функционал и повышая свою
                                    стессоустойчивость.
                                </p></b>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <img width="100%" src="/upload/images/folder/apple.jpg"/>
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

