<? include  VIEW_DIR . "layout/admin/header.php";?>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h3 class="h3">Статьи</h3>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-0">
                <button type="button" class="btn btn-sm btn-outline-link">
                    <a href="/index.php/admin/add/article">Добавить статью</a>
                </button>
            </div>
        </div>
    </div>
    <table class="table table-striped">
        <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Название</th>
            <th scope="col">Превью</th>
            <th scope="col">Дата</th>
            <th scope="col">Управление</th>
        </tr>
        </thead>
        <tbody>
        <?if (is_array($content)) {
            foreach ($content as $item) { ?>
                <? $val = $item->attributes(); ?>
                <tr>
                    <th><?= $val['id_article']?></th>
                    <th><?= $val['name_article']?></th>
                    <th><?= $val['preview']?></th>
                    <th><?= $val['date_article']?></th>
                    <th>
                        <button type="button" class="btn btn-sm btn-outline-secondary"><a href="/index.php/admin/delete/article/<?=$val['id_article']?>/">Удалить</a></button>
                        <button type="button" class="btn btn-sm btn-outline-secondary"><a href="/index.php/admin/update/article/<?=$val['id_article']?>/">Редактировать</a></button>
                    </th>
                </tr>
                <?
            }
        }?>
        </tbody>
    </table>
<? include VIEW_DIR . "layout/admin/footer.php";?>