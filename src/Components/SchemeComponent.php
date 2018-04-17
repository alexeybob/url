<?php

namespace AB\Url\Components;

use AB\Url\Abstracts;
use AB\Url\Interfaces;

/**
 * @author Alexey Bob <alexey.bob@gmail.com>
 */
final class SchemeComponent extends Abstracts\ComponentAbstract implements Interfaces\ComponentInterface
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
    private $validationRule = '/^(file|http|https|ftp|ftps|php|zlib|bzip2|zip|data|glob|phar|ssh2|rar|ogg|expect)$/i';
    
    
    
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
        if (null === $value) {
            return true;
        }
        
        if (0 === preg_match($this->validationRule, $value, $matches, PREG_OFFSET_CAPTURE)) {
            throw new \Exception('Invalid scheme "' . $value . '"');
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