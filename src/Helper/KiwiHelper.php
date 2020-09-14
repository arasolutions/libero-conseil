<?php


namespace App\Helper;


class KiwiHelper
{

    /**
     * @param $objectId integer
     * @param $options mixed
     * @return false|string
     */
    public static function list($objectId, $options)
    {
        $url = 'https://www.kiwicloudcms.com/api/call?cle_api=' . $_SERVER['KIWI_API_KEY'] . '&methode=liste&obj_id=' . $objectId;

        foreach($options as $option => $val){
            $url .= '&' . $option . '=' . $val;
        }

        $result = file_get_contents($url);
        return $result;
    }
}