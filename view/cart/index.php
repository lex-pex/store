<?php include ROOT . '/view/layers/header.php' ?>
<section>
    <div class="container">
        <div class="row">
            <?php include ROOT . '/view/layers/left_bar.php'; ?>
            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Cart</h2>
                        <h2>Items in the cart:</h2>
                    <br/>
                    <table class="table-bordered table-striped table">
                        <tr>
                            <th>Product Code:</th>
                            <th>Name:</th>
                            <th>Price:</th>
                            <th>Amount:</th>
                            <th>Delete:</th>
                        </tr>
                        <tr><td colspan="5">&nbsp;</td></tr>
                        <?php foreach ($products as $product => $prod) : ?>
                        <tr>
                            <td><?php echo $prod['code']; ?></td>
                            <td><a href="/product/<?php echo $prod['id']; ?>"><?php echo $prod['name']; ?></a></td>
                            <td>$ <?php echo $prod['price']; ?></td>
                            <td><?php echo $prodsInCart[$prod['id']]; ?></td>
                            <td><a href="/cart/del/<?php echo $prod['id']; ?>"><i class="fa fa-times"></i></a></td>
                        </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td colspan="2"><h4>Total:</h4></td>
                            <td colspan="3"><h4>$ <?php echo $totalPrice; ?></h4></td>
                        </tr>
                    </table>
                    <?php if (Cart::countItems() > 0) : ?>
                    <a href="/cart/order/" class="btn btn-danger">Confirm the order</a>
                    <?php else : ?>
                    <h3>Cart is empty</h3>
                    <?php endif; ?>
                    <br/><br/><br/>
                    <?php include ROOT . '/view/layers/rotator.php'; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include ROOT . '/view/layers/footer.php'; ?>
