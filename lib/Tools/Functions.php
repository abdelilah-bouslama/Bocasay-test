<?php
namespace lib\Tools;

class Functions
{
    /**
     * @param string $value
     * @param integer $options
     * @param integer $depth
     * 
     * @return string
     */
    public static function jsonEncode($value, $options = 0, $depth = 512)
    {
        return json_encode($value, $options, $depth);
    }

    /**
     * @param string $json
     * @param boolean $toArray
     * 
     * @return array
     */
    public static function jsonDecode($json, $toArray = true)
    {
        return json_decode($json, $toArray);
    }

    /**
     * @param object $object
     * 
     * @return void
     */
    public static function get_class($object)
    {
        return get_class($object);
    }

    /**
     * @param string $className
     * 
     * @return boolean
     */
    public static function class_exists($className)
    {
        return class_exists($className);
    }
    
    /**
     * @param string $name
     * @param string $value
     * @param boolean $caseinsensitive
     * 
     * @return void
     */
    public static function setConstant($name, $value, $caseinsensitive = false)
    {
        define($name, $value, $caseinsensitive);
    }

    /**
     * @param string $name
     * 
     * @return mixed
     */
    public static function getConstant($name)
    {
        return constant($name);
    }

    /**
     * @param string $targetUri
     * @return void
     */
    public static function redirect($targetUri)
    {
        header("location: " . $targetUri);
    }
}