<?php include ROOT . '/view/admin/layers/header.php'; ?>
<style>h4{color: #0480be}</style>
<div class="col-sm-4">
    <div class="product-image-wrapper">
        <div class="single-products">
            <div class="signup-form">
                <form action="#" method="POST" enctype="multipart/form-data">
                    <h4>Имя заказчика</h4>
                    <p>
                        <input type="text" name="name" placeholder="" value="<?php echo $order['name']; ?>">
                    </p>
                    <h4>Телефон заказчика</h4>
                    <p>
                        <input type="text" name="phone" value="<?php echo $order['phone']; ?>"/>
                    </p>
                    <h4>Коментарий заказчика</h4>
                    <p>
                        <input type="text" name="comment" value="<?php echo $order['comment']; ?>"/>
                    </p>
                    <h4>Дата заказа</h4>
                    <p>
                        <input type="text" name="date" placeholder="" value="<?php echo $order['date']; ?>">
                    </p>
                    <h4>Статус</h4>
                    <select name="status">
                    <?php foreach ($statuses as $stat): ?>
                        <option value="<?php echo $stat; ?>"
                            <?php if ($order['status'] == $stat) echo ' selected="selected"'; ?>>
                            <?php echo Order::getStatusName($stat); ?>
                        </option>
                    <?php endforeach; ?>
                    </select>
                    <h4>Список заказа</h4>
                    <table class="table-admin-medium table-bordered table-striped table ">
                        <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>Quan</th>
                            <th>Del</th>
                        </tr>
                        <?php foreach ($products as $product): ?>
                            <tr>
                                <td><?php echo $product['id']; ?></td>
                                <td>
                                    <a href="/product/<?php echo $product['id']; ?>">
                                        <?php echo $product['name']; ?>
                                    </a>
                                </td>
                                <td>
                                    <input type="text" name="quantity"
                                           value="<?php echo $productsQuantity[$product['id']]; ?>"/>
                                </td>
                                <td>
                                    <input type="checkbox" name="del" value="delId"/>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                    <p>
                        <button type="submit" name="submit" class="btn btn-default">
                            <span style="padding-left: 68px; padding-right: 68px;">
                                Сохранить
                            </span>
                        </button>
                    </p>
                </form>
            </div>
        </div><br/><br/>
    </div>
</div>
<?php if ($errors): ?>
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
<?php include ROOT . '/view/admin/layers/footer.php';