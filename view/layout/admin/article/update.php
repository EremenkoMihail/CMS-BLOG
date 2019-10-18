<?include VIEW_DIR . "layout/admin/header.php";?>
<h1><?=$title?></h1>
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Название статьи</label>
            <input type="text" class="form-control" id="name" name="name" required value="<?=$content['name_article']?>">
        </div>
        <div class="form-group">
            <label for="preview">Превью статьи</label>
            <textarea class="form-control" name="preview" id="preview" rows="3"><?=$content['preview']?></textarea>
        </div>
        <div class="form-group">
            <label for="detail">Текст статьи</label>
            <textarea class="form-control" name="detail" id="detail" rows="5"><?=$content['detail_text']?></textarea>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <img src="<?=$content['img_article']?>" class="img-thumbnail">
            </div>
        </div>
        <div class="form-group">
            <label for="img">Фото для статьи</label>
            <input type="file" class="form-control-file" name="img" id="img">
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
        <button class="btn btn-link"><a href="/index.php/admin/article">Отмена</a></button>
    </form>
<?include VIEW_DIR . "layout/admin/footer.php";?>