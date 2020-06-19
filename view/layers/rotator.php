<div class="recommended_items">
    <h2 class="title text-center">Hits Today</h2>
    <div class="carousel-inner">
        <div class="cycle-slideshow" data-cycle-fx=carousel
            data-cycle-timeout=5000 data-cycle-carousel-visible=3
            data-cycle-carousel-fluid=true data-cycle-slides="div.item"
            data-cycle-prev="#prev" data-cycle-next="#next">
            <?php $rec = Product::getRecommendedProds();
            foreach ($rec as $p): ?>
            <div class="item">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <a href="/product/<?php echo $p['id']; ?>">
                                <img src="<?php echo $p['image']; ?>" alt="" />
                                <h2>$<?php echo $p['price']; ?></h2>
                                <p><?php echo $p['name']; ?></p>
                            </a>
                            <a href="#" data_id="<?php echo $p['id']; ?>"
                               class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to Cart</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <a class="left recommended-item-control" id="prev" href="#recommended-item-carousel" data-slide="prev"><i class="fa fa-angle-left"></i></a>
        <a class="right recommended-item-control" id="next"  href="#recommended-item-carousel" data-slide="next"><i class="fa fa-angle-right"></i></a>
    </div>
</div>
