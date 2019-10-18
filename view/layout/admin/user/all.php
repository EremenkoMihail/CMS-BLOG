<? include  VIEW_DIR . "layout/admin/header.php";?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
    <h3 class="h3">Пользователи</h3>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-0">
            <button type="button" class="btn btn-sm btn-outline-link">
                <a href="/index.php/admin/add/user">Добавить пользователя</a>
            </button>
        </div>
    </div>
</div>
<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Имя</th>
            <th scope="col">Email</th>
            <th scope="col">ID группы</th>
            <th scope="col">Управление</th>
        </tr>
    </thead>
    <tbody>
    <?if (is_array($content)) {
        foreach ($content as $item) { ?>
            <? $book = $item->attributes(); ?>
            <tr>
                <th><?= $book['id']?></th>
                <th><?= $book['name']?></th>
                <th><?= $book['email']?></th>
                <th><?= $book['id_group']?></th>
                <th>
                    <button type="button" class="btn btn-sm btn-outline-secondary"><a href="/index.php/admin/delete/user/<?= $book['id']?>/">Удалить</a></button>
                    <button type="button" class="btn btn-sm btn-outline-secondary"><a href="/index.php/admin/update/user/<?= $book['id']?>/">Редактировать</a></button>
                </th>
            </tr>
            <?
        }
    }?>
    </tbody>
</table>
<? include VIEW_DIR . "layout/admin/footer.php";?>