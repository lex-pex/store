<?php include ROOT . '/view/layers/header.php' ?>
<section>
    <div class="container">
        <div class="row">
            <?php include ROOT . '/view/layers/left_bar.php'; ?>
            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <h2 class="title text-center">кабинет пользователя</h2>
                    <section>
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-9 padding-right">
                                    <div class="product-details">
                                        <div class="row">
                                            <div class="col-sm-5">
                                                <div class="view-product">
                                                    <img src="/upload/images/user/no_photo.png" alt="" />
                                                </div>
                                            </div>
                                            <div class="col-sm-7">
                                                <div class="product-information">
                                                    <h2>Пользователь: <br/><b><?php echo $name; ?></b></h2>
                                                    <h2>E-Mail: <br/><b><?php echo $mail; ?></b></h2>
                                                    <br/>
                                                    <a class="btn btn-default" href="/cabinet/edit/">Редактировать данные</a>
                                                    <br/><br/>
                                                    <a class="btn btn-default" href="/cart/">Список покупок</a>
                                                    <?php if($isAdmin) : ?>
                                                    <br/><br/>
                                                    <a class="btn btn-default" href="/admin/">Админ-панель</a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <p><b>Преимущества пользователя:</b></p>
                                                <p> - Сохранять понравившиеся еденицы</p>
                                                <p> - Вести записки относительно сравнения</p>
                                                <p> - Оставлять для себя уведомления</p>
                                                <p> - Оставлять коментарии товарам</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <br/><br/>
                    <?php include ROOT . '/view/layers/rotator.php'; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
include ROOT . '/view/layers/footer.php';



