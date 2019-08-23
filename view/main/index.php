<?php include ROOT . '/view/layers/header.php' ?>
<section>
    <div class="container">
        <div class="row">
            <?php include ROOT . '/view/layers/left_bar.php'; ?>
            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <h2 class="title text-center">статьи</h2>
                    <?php foreach ($articles as $article): ?>
                    <?php if ($article['status']): ?>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <a href="/article/<?php echo $article['id']; ?>">
                                            <img src="<?php echo $article['image']; ?>" alt="" />
                                            <h2><?php echo $article['title']; ?></h2>
                                            <p><?php echo $article['descr']; ?></p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                <?php include ROOT . '/view/layers/rotator.php'; ?>
            </div>
        </div>
    </div>

</section>

<?php include ROOT . '/view/layers/footer.php'; 
