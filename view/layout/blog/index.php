<?include "header.php";?>
    <div class="container">

        <div class="row jumbotron p-4 p-md-5 text-white rounded bg-dark">
            <? $val = array_shift($content)->attributes(); ?>
            <div class="col-md-4">
                <img class="img-fluid rounded" src="<?=$val['img_article']?>">
            </div>
            <div class="col-md-8">
                <h1 class="display-4 font-italic"><?= $val['name_article']?></h1>
                <p class="lead my-3"><?=$val['preview']?></p>
                <p class="lead mb-0"><a href="/index.php/blog/detail/<?=$val['id_article']?>/" class="text-white font-weight-bold">Читать подробнее...</a></p>
            </div>
        </div>

        <div class="row mb-2">
            <?if (!empty($content)) {
                foreach ($content as $item) { ?>
                    <?$val = $item->attributes(); ?>
                    <div class="col-md-12">
                        <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm position-relative">
                            <div class="col p-4 d-flex flex-column position-static">
                                <strong class="d-inline-block mb-2 text-primary">World</strong>
                                <h3 class="mb-0"><?= $val['name_article']?></h3>
                                <div class="mb-1 text-muted"><?=$val['date_article']?></div>
                                <p class="card-text mb-auto"><?= $val['preview']?></p>
                                <a href="/index.php/blog/detail/<?=$val['id_article']?>/" class="stretched-link">Подробнее</a>
                            </div>
                            <div class="col-auto d-none d-lg-block">
                            </div>
                            <div class="col-12 p-4 flex-column position-static">
                                <img class="img-fluid rounded mx-auto d-block" src="<?=$val['img_article']?>">
                            </div>
                        </div>
                    </div>
                    <?
                }
            }?>
        </div>
    </div>
<? include "footer.php";?>