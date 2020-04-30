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
            <th scope="col">Вход</th>
        </tr>
    </thead>
    <tbody>
    <?if (is_array($content)) {
        foreach ($content as $item) { ?>
            <? $user = $item->attributes(); ?>
            <tr>
                <th><?= $user['id']?></th>
                <th><?= $user['name']?></th>
                <th><?= $user['email']?></th>
                <th><?= $user['id_group']?></th>
                <th>
                    <button type="button" class="btn btn-sm btn-outline-secondary"><a href="/index.php/admin/delete/user/<?= $user['id']?>/">Удалить</a></button>
                    <button type="button" class="btn btn-sm btn-outline-secondary"><a href="/index.php/admin/update/user/<?= $user['id']?>/">Редактировать</a></button>
                </th>
                <th>
                    <form action="/index.php/signinForAdmin/" method="post">
                        <input type="hidden" name="email" value="<?=$user['email']?>">
                        <input type="hidden" name="password" value="<?=$user['password']?>">
                        <button type="submit" class="btn btn-sm btn-outline-secondary">Войти</button>
                    </form>
                </th>
            </tr>
            <?
        }
    }?>
    </tbody>
</table>
<? include VIEW_DIR . "layout/admin/footer.php";?>