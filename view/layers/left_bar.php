<?php $categories = Category::getCategoriesList(); ?>
<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>категории</h2>
        <?php foreach ($categories as $category): ?>
        <div>
            <div class="left_menu">
                <ul>
                    <li>
                        <a href="/category/<?php echo $category['id']; ?>"
                            class="<?php if ($categoryId == $category['id']) echo 'choosed'; ?>">
                            <?php echo $category['name']; ?></a>
                    </li>
                </ul>
            </div>
        </div>
        <?php endforeach; ?>
        <br/><br/><br/>
        <div class="left-sidebar">
            <div class="advert">
                <h2>РЕКЛАМА</h2>
                <img width="80%" align="center" src="/upload/images/folder/advert.gif"/>
                <br/><br/><br/>
            </div>
        </div>
    </div> 
</div>