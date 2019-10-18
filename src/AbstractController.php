<?php


namespace App;


abstract class AbstractController
{
    public function updatePost($id)
    {
        $obj = call_user_func_array([$this->model, 'find'], [[$this->primaryKey => $id[0]]]);
        foreach ($_POST as $key => $value) {
            $obj->$key = $value;
        }
        if ($obj->save()) header('location:/index.php/admin/' . $this->folderName);
    }

    public function addPost()
    {
        $jax = new $this->model($_POST);
        if ($jax->save())  header('location:/index.php/admin/' . $this->folderName);
    }

    public function update($id)
    {
        $obj = call_user_func_array([$this->model, 'find'], [[$this->primaryKey => $id[0]]]);

        return new View\View(
            'layout/admin/' . $this->folderName . '/update',
            [
                'title' => $this->titleUpdate,
                'content' => $obj->attributes(),
            ]
        );
    }

    public function add()
    {
        return new View\View(
            'layout/admin/' . $this->folderName . '/add',
            [
                'title' => $this->titleAdd,
            ]
        );
    }

    public function all()
    {
        return new View\View(
            'layout/admin/'. $this->folderName . '/all',
            [
                'title' => $this->titleAll,
                'content' => call_user_func($this->model . '::all'),
            ]
        );
    }

    public function delete($id)
    {
        $obj = call_user_func_array([$this->model, 'find'], [[$this->primaryKey => $id[0]]]);
        //$attr = $art->attributes();&& unlink(HOST . $attr['img_article'])
        if ($obj->delete()) header('location:/index.php/admin/'  . $this->folderName);
    }

}