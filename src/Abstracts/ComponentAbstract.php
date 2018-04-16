<?php

namespace AB\Url\Abstracts;

/**
 * @author Alexey Bob <alexey.bob@gmail.com>
 */
abstract class ComponentAbstract
{
    /**
     * 
     * @return boolean
     */
    public function has() : bool
    {
        if (null !== $this->value) {
            return true;
        } elseif (
            is_array($this->value)
            && count($this->value) > 0
        ) {
            return true;
        } elseif (
            is_string($this->value)
            && strlen($this->value) > 0
        ) {
            return true;
        }
        
        return false;
    }
}