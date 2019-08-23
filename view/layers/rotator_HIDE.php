</div><!--features_items-->
<div class="recommended_items"><!--recommended_items-->
    <h2 class="title text-center">Хиты сегодня</h2>
    
    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="item active">
                
                
                <?php   $recommended = Product::getRecommendedProds();
                        for ($i = 1; $i < 4; $i ++) : 
                            $p = $recommended[$i]; ?>
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="<?php echo $p['image']; ?>" alt="" />
                                <h2>$<?php echo $p['price']; ?></h2>
                                <p><?php echo $p['name']; ?></p>
                                <a href="#" data_id="<?php echo $p['id']; ?>"
                                   class="btn btn-default add-to-cart">
                                    <i class="fa fa-shopping-cart"></i>
                                    В корзину
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endfor; ?>
            </div>
            <div class="item">
                <?php for ($i = 4; $i < 7; $i ++) : 
                    $p = $recommended[$i]; ?>
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="<?php echo $p['image']?>" alt="" />
                                <h2>$<?php echo $p['price']; ?></h2>
                                <p><?php echo $p['name']; ?></p>
                                <a href="#" data_id="<?php echo $p['id']; ?>"
                                   class="btn btn-default add-to-cart">
                                    <i class="fa fa-shopping-cart"></i>
                                    В корзину
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endfor; ?>
                
                
            </div>
        </div>
        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
            <i class="fa fa-angle-left"></i>
        </a>
        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
            <i class="fa fa-angle-right"></i>
        </a>			
    </div>
    
</div><!--/recommended_items-->