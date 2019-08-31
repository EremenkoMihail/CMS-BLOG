<?php


namespace App\Model;

use \ActiveRecord\Model;

class Groups extends \ActiveRecord\Model
{
    static $table_name = 'users_group';
    static $primary_key = 'id_group';

    // must have
    static $validates_presence_of = array(
        array('name_group'));
}