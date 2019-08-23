<?php include ROOT . '/view/admin/layers/header.php'; ?>
<p align="center">
    &nbsp;<a href="/admin/category/create" class="btn btn-default back">
        <i class="fa fa-plus"></i> Добавить категорию</a>
</p>
<table class="table-bordered table-striped table">
    <tr>
        <th>id</th>
        <th>Name</th>
        <th>Sort Priority (0-99)</th>
        <th>Status</th>
        <th>Edit</th>
        <th>Del</th>
    </tr>
    <?php foreach ($categories as $cat): ?>
    <tr>
        <td><?php echo $cat['id'];?></td>
        <td><?php echo $cat['name'];?></td>
        <td><?php echo $cat['sort_order'];?></td>
        <td><?php echo $cat['status'] ? 'Отображен' : 'Скрыт';?></td>
        <td>
            <a href="/admin/category/update/<?php echo $cat['id']; ?>"
               title="Редактировать">
                <i class="fa fa-pencil-square-o"></i>
            </a>
        </td>
        <td>
            <a href="/admin/category/delete/<?php echo $cat['id'];?>"
               title="Удалить">
                <i class="fa fa-times"></i>
            </a>
        </td>
    </tr>
    <?php endforeach; ?>
    <tr>
        <td colspan="6">&nbsp;</td>
    </tr>
</table>

<?php include ROOT . '/view/admin/layers/footer.php';