<?include VIEW_DIR . "header.php";?>
<h1><?=$title?></h1>
    <?if (is_array($content)) {
        foreach ($content as $item) { ?>
            <? $book = $item->attributes(); ?>
            <div class="row">
                <div class="col"><?= $book['name']?></div>
                <div class="col"><?= $book['email']?></div>
                <div class="col"><?= $book['password']?></div>
                <div class="col"><?= $book['id_group']?></div>
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
<?include VIEW_DIR . "footer.php";?>