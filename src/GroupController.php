<?php


namespace App;


class GroupController extends AbstractController
{
    public $model = 'App\Model\Groups';
    public $primaryKey = 'id_group';
    public $folderName = 'group';
    public $titleUpdate = 'Редактирование группы пользователей';
    public $titleAdd = 'Добавление группы пользователей';
    public $titleAll = 'Группы пользователей';

}