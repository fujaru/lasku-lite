<?php defined('SYSPATH') or die('No direct script access.');

class AppConfig {
    
    public static $cache = array();
    
    public static function get_item($name) {
        if(isset(self::$cache[$name])) {
            return self::$cache[$name];
        }
        
        $query = DB::query(Database::SELECT, "
            SELECT * FROM `config` 
            WHERE `name` = :name
        ");
        $query->param(':name', $name);
        $rs = $query->execute();
        if(count($rs) == 0) {
            throw new Exception("Config item not found: {$name}");
        }
        self::$cache[$name] = $rs[0]['value'];
        
        return $rs[0]['value'];
    }
    
    public static function set_item($name, $value) {
        self::$cache[$name] = $value;
        
        $query = DB::query(Database::UPDATE, "
            UPDATE `config` 
            SET `value` = :value 
            WHERE `name` = :name
        ");
        $query->param(':name', $name);
        $query->param(':value', $value);
        $query->execute();
    }
}
