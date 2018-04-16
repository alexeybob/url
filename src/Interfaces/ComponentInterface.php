<?php

namespace AB\Url\Interfaces;


/**
 * @author Alexey Bob <alexey.bob@gmail.com>
 */
interface ComponentInterface
{
    /**
     * 
     * @param string|null $value
     * @return boolean
     * @throws \Exception
     */
    public function validate($value) : bool;
    
    /**
     * 
     * @param string|null $value
     */
    public function set($value) : void;
    
    /**
     * 
     * @return string
     */
    public function getStringValue() : string;
}
