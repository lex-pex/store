<?php include ROOT . '/view/layers/header.php' ?>
<section>
    <div class="container">
        <div class="row">
            <?php include ROOT . '/view/layers/left_bar.php'; ?>
            <h2 class="title text-center"><?php echo $article['title']; ?></h2>
            <div class="col-sm-9 padding-right">
                <div class="product-details">
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="view-product">
                                <img src="<?php echo $article['image']; ?>" alt="<?php echo $article['title']; ?>" />
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="product-information">
                                <p><i><?php echo $article['descr']; ?></i></p>
                                <p><?php echo $article['text'] ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <p>&nbsp;</p>
                            <p>&nbsp;</p>
                        </div>
                    </div>
                    <?php include ROOT . '/view/layers/rotator.php'; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<br/><br/>
<?php include ROOT . '/view/layers/footer.php'; ?>