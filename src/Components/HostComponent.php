<?php

namespace AB\Url\Components;

use AB\Url\Abstracts;
use AB\Url\Interfaces;

/**
 * @author Alexey Bob <alexey.bob@gmail.com>
 */
final class HostComponent extends Abstracts\ComponentAbstract implements Interfaces\ComponentInterface
{
    /**
     *
     * @var string
     */
    protected $value;
    
    /**
     * @todo Strict expression
     * 
     * @var string
     */
    private $validationRule = '/^[0-9a-z-.]{1,248}[^.]{2,5}$/i';
    
    
    
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
    public function set($value)
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
    public function validate($value)
    {
        if (0 === preg_match($this->validationRule, $value, $matches, PREG_OFFSET_CAPTURE)) {
            throw new \Exception('Invalid host "' . $value . '"');
        }

        return true;
    }
    
    /**
     * 
     * @return string
     */
    public function getStringValue()
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