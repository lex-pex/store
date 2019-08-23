<?php include ROOT . '/view/admin/layers/header.php'; ?>
<table class="table-bordered table-striped table">
    <tr>
        <th>id</th>
        <th>Name</th>
        <th>Customer_Phone</th>
        <th>Comment</th>
        <th>Date</th>
        <th>Processing</th>
        <th>View</th>
        <th>Edit</th>
        <th>Del</th>
    </tr>
    <?php foreach ($orders as $order): ?>
    <tr>
        <td><?php echo $order['id'];?></td>
        <td><?php echo $order['name'];?></td>
        <td><?php echo $order['phone'];?></td>
        <td><?php echo $order['comment'];?></td>
        <td><?php echo $order['date'];?></td>
        <td>
            <?php echo Order::getStatusName($order['status']); ?>
        </td>
        <td>
            <a href="/admin/order/view/<?php echo $order['id']; ?>"
               title="Смотреть">
                <i class="fa fa-eye"></i>
            </a>
        </td>
        <td>
            <a href="/admin/order/update/<?php echo $order['id']; ?>"
               title="Редактировать">
                <i class="fa fa-pencil-square-o"></i>
            </a>
        </td>
        <td>
            <a href="/admin/order/delete/<?php echo $order['id'];?>"
               title="Удалить">
                <i class="fa fa-times"></i>
            </a>
        </td>
    </tr>
    <?php endforeach; ?>
    <tr>
        <td colspan="9">&nbsp;</td>
    </tr>
</table>
<?php include ROOT . '/view/admin/layers/footer.php';