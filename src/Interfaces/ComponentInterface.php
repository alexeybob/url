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
    public function validate($value);
    
    /**
     * 
     * @param string|null $value
     */
    public function set($value);
    
    /**
     * 
     * @return string
     */
    public function getStringValue();
}
