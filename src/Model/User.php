<?php


namespace App\Model;

use \ActiveRecord\Model;

class User extends \ActiveRecord\Model
{
    // must have
    static $validates_presence_of = array(
        array('name'), array('email'), array('password'), array('id_group'));
}