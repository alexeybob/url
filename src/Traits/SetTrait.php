<?php

namespace AB\Url\Traits;

use AB\Url\Components;

/**
 * @author Alexey Bob <alexey.bob@gmail.com>
 */
trait SetTrait
{
    /**
     * 
     * @param string $name
     * @param string|integer|null $value
     * @return $this
     */
    public function __set(string $name, $value)
    {
        $setter = $this->createMethodName('set', $name);

        $this->$setter($value);
        
        return $this;
    }
    
    /**
     * 
     * @param string|null $value
     */
    private function setScheme($value)
    {
        $this->_scheme = new Components\SchemeComponent($value);
    }

    /**
     * 
     * @param string|null $value
     */
    private function setHost($value)
    {
        $this->_host = new Components\HostComponent($value);
    }
    
    /**
     * 
     * @param string|null $value
     */
    private function setPort($value)
    {
        $this->_port = new Components\PortComponent($value);
    }
    
    /**
     * 
     * @param string|null $value
     */
    private function setUser($value)
    {
        $this->_user = new Components\UserComponent($value);
    }
    
    /**
     * 
     * @param string|null $value
     */
    private function setPass($value)
    {
        $this->_pass = new Components\PassComponent($value);
    }
    
    /**
     * 
     * @param string|null $value
     */
    private function setPath($value)
    {
        $this->_path = new Components\PathComponent($value);
    }
    
    /**
     * 
     * @param string|null $value
     */
    private function setQuery($value)
    {
        $this->_query = new Components\QueryComponent($value);
    }
    
    /**
     * 
     * @param string|null $value
     */
    private function setFragment($value)
    {
        $this->_fragment = new Components\FragmentComponent($value);
    }
}
