<?include VIEW_DIR . "layout/admin/header.php";?>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h3 class="h3"><?=$title?></h3>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-0">
                <button type="button" class="btn btn-sm btn-outline-link">
                    <a href="/index.php/admin/add/group">Добавить группу</a>
                </button>
            </div>
        </div>
    </div>
    <table class="table table-striped">
        <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Название группы</th>
            <th scope="col">Описание</th>
            <th scope="col">Действия</th>
        </tr>
        </thead>
        <tbody>
        <?if (is_array($content)) {
            foreach ($content as $item) { ?>
                <? $val = $item->attributes(); ?>
                <tr>
                    <th><?= $val['id_group']?></th>
                    <th><?= $val['name_group']?></th>
                    <th><?= $val['description_group']?></th>
                    <th>
                        <button type="button" class="btn btn-sm btn-outline-secondary"><a href="/index.php/admin/delete/group/<?=$val['id_group']?>/">Удалить</a></button>
                        <button type="button" class="btn btn-sm btn-outline-secondary"><a href="/index.php/admin/update/group/<?=$val['id_group']?>/">Редактировать</a></button>
                    </th>
                </tr>
                <?
            }
        }?>
        </tbody>
    </table>
<?include VIEW_DIR . "layout/admin/footer.php";?>