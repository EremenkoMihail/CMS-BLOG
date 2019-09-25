<?include VIEW_DIR . "layout/admin/header.php";?>
<h3><?=$title?></h3>
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name_group">Название группы</label>
            <input type="text" class="form-control" id="name_group" name="name_group" required  value="<?=$content['name_group']?>">
        </div>
        <div class="form-group">
            <label for="description_group">Описание</label>
            <textarea class="form-control" name="description_group" id="description_group" rows="3"><?=$content['description_group']?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
        <button class="btn btn-link"><a href="/index.php/admin/groups">Отмена</a></button>
    </form>
<?include VIEW_DIR . "layout/admin/footer.php";?>