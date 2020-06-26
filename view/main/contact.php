<?php include ROOT . '/view/layers/header.php' ?>
<section>
    <div class="container">
        <div class="row">
            <?php include ROOT . '/view/layers/left_bar.php'; ?>
            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <h2 class="title text-center">Contact with us</h2>
                    <?php if ($res): include ROOT.'/view/main/mailsent.php'; else: ?>
                    <div class="col-md-8">
                        <div class="product-image-wrapper">
                            <div class="single-products" style="padding: 10px">
                                <h2 class="title text-center">Contact details</h2>
                                <p>Developer's <b>Email: </b></p>
                                <p>address@mail.com</p>
                                <h2 class="title text-center">send message</h2>
                                <div class="signup-form">
                                    <form action="#" method="post">
                                        <input type="email" name="mail" placeholder="E-mail" value="<?php echo $mail ?>" />
                                        <textarea name="text" placeholder="Сообщение"><?php echo $text ?></textarea>
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
                                        <hr/>
                                        <button type="submit" name="submit" class="btn btn-default">Send</button>
                                    </form>
                                </div>
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

