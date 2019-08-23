<?php include ROOT . '/view/layers/header.php' ?>
<section>
    <div class="container">
        <div class="row">
            <?php include ROOT . '/view/layers/left_bar.php'; ?>
            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <h2 class="title text-center">Связь с нами</h2>
                    <?php if ($res): include ROOT.'/view/main/mailsent.php'; else: ?>
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <h2 class="title text-center">Контактные данные</h2>
                                <p>Developer's <b>Email: </b>javaenginee@gmail.com</p>
                                <h2 class="title text-center">отправить сообщение</h2>
                                <div class="signup-form">
                                    <form action="#" method="post">
                                        <input type="email" name="mail" placeholder="E-mail" value="<?php echo $mail ?>" />
                                        <textarea name="text" placeholder="Сообщение" value="<?php echo $text ?>"></textarea>
                                        <br/>
                                        <?php if (isset($errors) && is_array($errors)): ?>
                                            <ul>
                                                <?php foreach ($errors as $e): ?>
                                                    <li style="color:#F08080;font-weight:bold">
                                                        <?php echo $e; ?>
                                                    </li>    
                                                <?php endforeach; ?>
                                            </ul>
                                        <?php endif; ?>
                                        <br/>
                                        <button type="submit" name="submit" class="btn btn-default">
                                            Отправить
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <p>Ждем ваших писем, сообщений, предложений,
                                    приветов. Не оставляем без ответов.</p>
                                <img width="100%" src="/upload/images/folder/mailsent.gif"/>
                            </div>
                        </div>
                    </div>
                </div>
                <?php include ROOT.'/view/layers/rotator.php'; ?>
            </div>
        </div>
    </div>
</section>

<?php
include ROOT . '/view/layers/footer.php';



