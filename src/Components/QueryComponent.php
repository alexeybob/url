<?php

namespace AB\Url\Components;

use AB\Url\Abstracts;
use AB\Url\Interfaces;

/**
 * @author Alexey Bob <alexey.bob@gmail.com>
 */
final class QueryComponent extends Abstracts\ComponentAbstract implements Interfaces\ComponentInterface
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
            
            parse_str($value, $value);
            
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
     * @param string $name
     */
    public function remove($name) : void
    {
        if (isset($this->value[$name])) {
            unset($this->value[$name]);
        }
    }
    
    /**
     * 
     * @param string $name
     * @param string|integer $value
     */
    public function add($name, $value) : void
    {
        $this->value[$name] = $value;
    }
    
    /**
     * 
     * @return string
     */
    public function getStringValue() : string
    {
        return is_array($this->value) ? http_build_query($this->value) : '';
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