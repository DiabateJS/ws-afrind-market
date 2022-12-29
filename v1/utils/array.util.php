<?php
class ArrayManager {
    public static function arrayKeysExists($keys,$tab){
        $res = false;
        if (count($keys) > 0){
            $res = true;
            for ($i = 0 ; $i < count($keys) ; $i++){
                $res = $res && array_key_exists($keys[$i],$tab);
            }
        }
        return $res;
    }
}

?>