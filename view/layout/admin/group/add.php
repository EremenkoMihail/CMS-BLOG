<?include VIEW_DIR . "layout/admin/header.php";?>
<h3><?=$title?></h3>
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name_group">Название группы</label>
            <input type="text" class="form-control" id="name_group" name="name_group" required>
        </div>
        <div class="form-group">
            <label for="description_group">Описание</label>
            <textarea class="form-control" name="description_group" id="description_group" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Добавить</button>
        <button class="btn btn-link"><a href="/index.php/admin/group">Отмена</a></button>
    </form>
<?include VIEW_DIR . "layout/admin/footer.php";?>