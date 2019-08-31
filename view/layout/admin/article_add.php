<?include "header.php";?>
<h3><?=$title?></h3>
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Название статьи</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="preview">Превью статьи</label>
            <textarea class="form-control" name="preview" id="preview" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="detail">Текст статьи</label>
            <textarea class="form-control" name="detail" id="detail" rows="5"></textarea>
        </div>
        <div class="form-group">
            <label for="img">Фото для статьи</label>
            <input type="file" class="form-control-file" name="img" id="img">
        </div>
        <button type="submit" class="btn btn-primary">Добавить</button>
        <button class="btn btn-link"><a href="/index.php/admin/article">Отмена</a></button>
    </form>
<?include "footer.php";?>