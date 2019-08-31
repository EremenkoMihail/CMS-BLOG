<? include  "header.php";?>
<div class="row">
    <h2 class="col">Пользователи</h2>
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
<? include "footer.php";?>