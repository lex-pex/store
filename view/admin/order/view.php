<?php include ROOT . '/view/admin/layers/header.php'; ?>
<section>
    <table class="table-admin-small table-bordered table-striped table">
        <tr>
            <td>Номер заказа</td>
            <td><?php echo $order['id']; ?></td>
        </tr>
        <tr>
            <td>Имя клиента</td>
            <td><?php echo $order['name']; ?></td>
        </tr>
        <tr>
            <td>Телефон клиента</td>
            <td><?php echo $order['phone']; ?></td>
        </tr>
        <tr>
            <td>Комментарий клиента</td>
            <td><?php echo $order['comment']; ?></td>
        </tr>
        <?php if ($order['user_id'] != 0): ?>
            <tr>
                <td>ID клиента</td>
                <td><?php echo $order['user_id']; ?></td>
            </tr>
        <?php endif; ?>
        <tr>
            <td><b>Статус заказа</b></td>
            <td><?php echo Order::getStatusName($order['status']); ?></td>
        </tr>
        <tr>
            <td><b>Дата заказа</b></td>
            <td><?php echo $order['date']; ?></td>
        </tr>
    </table>
    <h4>Список заказа</h4>
    <table class="table-admin-medium table-bordered table-striped table ">
        <tr>
            <th>id</th>
            <th>Код товара</th>
            <th>Название</th>
            <th>Цена</th>
            <th>Кол-во</th>
        </tr>
        <?php foreach ($products as $product): ?>
            <tr>
                <td><?php echo $product['id']; ?></td>
                <td><?php echo $product['code']; ?></td>
                <td>
                    <a href="/product/<?php echo $product['id']; ?>">
                        <?php echo $product['name']; ?>
                    </a>
                </td>
                <td>$<?php echo $product['price']; ?></td>
                <td><b><?php echo $productsQuantity[$product['id']]; ?></b></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="/admin/order/" class="btn btn-default back"><i class="fa fa-arrow-left"></i> Назад</a>
    <a href="/admin/order/update/<?php echo $order['id']; ?>" class="btn btn-default back">Редактировать</a>
    <br/><br/>
</section>
<?php include ROOT . '/view/admin/layers/footer.php';