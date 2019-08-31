<?include VIEW_DIR . "header.php";?>
<h1><?=$title?></h1>
    <?if (is_array($content)) {
        foreach ($content as $item) { ?>
            <? $book = $item->attributes(); ?>
            <div class="row">
                <div class="col"><?= $book['name_group']?></div>
                <div class="col"><?= $book['id']?></div>
            </div>
            <?
        }
    } else {
        ?>
        <div class="row">
            <div class="col-sm-12">
                <?=$content?>
            </div>
        </div>
    <?}?>
    <form method="post">
        <input type="checkbox" name="ff" value="ок">
        <input type="submit" value="Отправить">
    </form>
<?include VIEW_DIR . "footer.php";?>