<?php include ROOT . '/view/admin/layers/header.php'; ?>
<p align="center">
    &nbsp;<a href="/admin/article/create" class="btn btn-default back">
        <i class="fa fa-plus"></i> Добавить статью</a>
</p>
<table class="table-bordered table-striped table">
    <tr>
        <th>#</th>
        <th>id</th>
        <th>Title</th>
        <th>Description</th>
        <th>Sort Order</th>
        <th>Status</th>
        <th>Edit</th>
        <th>Del</th>
    </tr>
    <?php foreach ($articles as $art): ?>
    <tr>
        <td><?php echo $tableCounter ++.')'; ?></td>
        <td><?php echo $art['id'];?></td>
        <td>
            <a href="/article/<?php echo $art['id'];?>">
                <?php echo $art['title'];?>
            </a>
        </td>
        <td><?php echo $art['descr'];?></td>
        <td><?php echo $art['sort_order'];?></td>
        <td><?php echo $art['status'] ? 'Отображен' : 'Скрыт';?></td>
        <td>
            <a href="/admin/article/update/<?php echo $art['id']; ?>"
               title="Редактировать">
                <i class="fa fa-pencil-square-o"></i>
            </a>
        </td> 
        <td>
            <a href="/admin/article/delete/<?php echo $art['id'];?>"
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