<?php include ROOT . '/view/layers/header.php' ?>
<section>
    <div class="container">
        <div class="row">
            <?php include ROOT . '/view/layers/left_bar.php'; ?>
            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <h2 class="title text-center">регистрация</h2>
                    <?php if ($res): include ROOT.'/view/user/invite.php'; else: ?>
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="signup-form">
                                    <form action="#" method="post">
                                        <input type="text" name="name" placeholder="Имя" value="<?php echo $name ?>" />
                                        <input type="email" name="mail" placeholder="E-mail" value="<?php echo $mail ?>" />
                                        <input type="password" name="pass" placeholder="Пароль" value="<?php echo $pass ?>"/>
                                        <button type="submit" name="subm" class="btn btn-default">
                                            Регистрация
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
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
                </div>
                <?php include ROOT.'/view/layers/rotator.php'; ?>
            </div>
        </div>
    </div>
</section>

<?php
include ROOT . '/view/layers/footer.php';



