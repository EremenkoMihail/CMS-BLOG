<?php


namespace App;

use App\Model\UserTools;
use App\Model\Groups;

class AccessTools
{
    public static function verification($access)
    {
        if (UserTools::statusSession()) {
            $result = false;
            switch ($_SESSION['id_group']) {
                case 1:
                    $result = true;
                    break;
                case 2:
                    if ($access > 1)
                        $result = true;
                    break;
                case 3:
                    if ($access > 2)
                        $result = true;
                    break;
            }
            return $result;
        } elseif ($access > 3) {
            return true;
        } else {
            return false;
        }
    }

}