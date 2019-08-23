<?php include ROOT . '/view/admin/layers/header.php'; ?>
<p align="center">
    &nbsp;<a href="/admin/product/create" class="btn btn-default back">
        <i class="fa fa-plus"></i> Добавить позицию</a>
</p>
<table class="table-bordered table-striped table">
    <tr>
        <th>#</th>
        <th>id</th>
        <th>Code</th>
        <th>Position title</th>
        <th>Price</th>
        <th>Status</th>
        <th>Edit</th>
        <th>Del</th>
    </tr>
    <?php foreach ($products as $product): ?>
    <tr>
        <td><?php echo $tableCounter ++.')'; ?></td>
        <td><?php echo $product['id'];?></td>
        <td><?php echo $product['code'];?></td>
        <td>
            <a href="/product/<?php echo $product['id'];?>">
                <?php echo $product['name'];?>
            </a>
        </td>
        <td><?php echo $product['price'];?></td>
        <td><?php echo $product['status'] ? 'Отображен' : 'Скрыт';?></td>
        <td>
            <a href="/admin/product/update/<?php echo $product['id']; ?>"
               title="Редактировать">
                <i class="fa fa-pencil-square-o"></i>
            </a>
        </td> 
        <td>
            <a href="/admin/product/delete/<?php echo $product['id'];?>"
               title="Удалить">
                <i class="fa fa-times"></i>
            </a>
        </td>
    </tr>
    <?php endforeach; ?>
    <tr>
        <td colspan="7">&nbsp;</td>
    </tr>
</table>
<?php include ROOT . '/view/admin/layers/footer.php';