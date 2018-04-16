<?php

namespace AB\Url\Components;

use AB\Url\Abstracts;
use AB\Url\Interfaces;

/**
 * @author Alexey Bob <alexey.bob@gmail.com>
 */
final class FragmentComponent extends Abstracts\ComponentAbstract implements Interfaces\ComponentInterface
{
    /**
     *
     * @var string
     */
    protected $value;
    
    /**
     *
     * @var string
     */
    private $validationRule = '/^[^\s]{1,5000}$/i';
    
    
    
    /**
     * 
     * @param string|null $value
     */
    public function __construct($value)
    {
        $this->set($value);
    }
    
    /**
     * 
     * @param string|null $value
     */
    public function set($value) : void
    {
        if ($this->validate($value)) {
            $this->value = $value;
        }
    }
    
    /**
     * 
     * @param string|null $value
     * @return boolean
     * @throws \Exception
     */
    public function validate($value) : bool
    {
        if (null === $value) {
            return true;
        }
        
        if (0 === preg_match($this->validationRule, urlencode($value), $matches, PREG_OFFSET_CAPTURE)) {
            throw new \Exception('Invalid path "' . $value . '"');
        }

        return true;
    }
    
    /**
     * 
     * @return string
     */
    public function getStringValue() : string
    {
        return (string)$this->value;
    }
    
    /**
     * 
     * @return string
     */
    public function __toString()
    {
        return $this->getStringValue();
    }
}