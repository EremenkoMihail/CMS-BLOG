<?php


namespace App;


class ArticleController extends AbstractController
{
    public $model = 'App\Model\Articles';
    public $primaryKey = 'id_article';
    public $folderName = 'article';
    public $titleUpdate = 'Редактирование статьи';
    public $titleAdd = 'Добавление статьи';
    public $titleAll = 'Статьи';

    public function updatePost($id)
    {
        $this->uploadFileAndDate();
        parent::updatePost($id);
    }
    public function addPost()
    {
        $this->uploadFileAndDate();
        parent::addPost();
    }
    private function uploadFileAndDate ()
    {
        $_POST['date_article'] = date("d-m-Y H:i:s");

        if (!empty($_FILES)) {
            $uploaddir = HOST . '/upload/article/';
            $uploadfile = $uploaddir . basename($_FILES['img']['name']);
            if (move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile)) {
                $_POST['img_article'] = str_replace(HOST, '', $uploadfile);
            }
        }
    }
}