<?php include ROOT . '/view/layers/header.php' ?>
<section>
    <div class="container">
        <div class="row">
            <?php include ROOT . '/view/layers/left_bar.php'; ?>
            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <h2 class="title text-center">Website Entrance</h2>
                    <section>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="signup-form">
                                        <form action="#" method="post">
                                            <input type="email" name="mail" placeholder="E-mail" />
                                            <input type="password" name="pass" placeholder="Пароль" />
                                            <button type="submit" name="subm" class="btn btn-default">
                                                Вход
                                            </button>
                                        </form>
                                        <br/>
                                        <form action="/register/" method="post">
                                            <button type="submit" name="redirect" class="btn btn-default">
                                                Регистрация
                                            </button>
                                        </form>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
<!--                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="signup-form">
                                        
                                        
                                    </div>
                                </div>
                            </div>
                        </div>-->
                        <?php if (isset($errors) && is_array($errors)): ?>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <ul>
                                    <?php foreach ($errors as $e): ?>
                                        <li style="color:#F08080;font-weight:bold">
                                            <?php echo $e; ?>
                                        </li>
                                    <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    </section>
                    <br/><br/>
                    
                </div>
                <?php include ROOT . '/view/layers/rotator.php'; ?>
            </div>
        </div>
    </div>
</section>

<?php
include ROOT . '/view/layers/footer.php';



