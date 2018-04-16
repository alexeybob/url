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
    private function setScheme($value) : void
    {
        $this->_scheme = new Components\SchemeComponent($value);
    }

    /**
     * 
     * @param string|null $value
     */
    private function setHost($value) : void
    {
        $this->_host = new Components\HostComponent($value);
    }
    
    /**
     * 
     * @param string|null $value
     */
    private function setPort($value) : void
    {
        $this->_port = new Components\PortComponent($value);
    }
    
    /**
     * 
     * @param string|null $value
     */
    private function setUser($value) : void
    {
        $this->_user = new Components\UserComponent($value);
    }
    
    /**
     * 
     * @param string|null $value
     */
    private function setPass($value) : void
    {
        $this->_pass = new Components\PassComponent($value);
    }
    
    /**
     * 
     * @param string|null $value
     */
    private function setPath($value) : void
    {
        $this->_path = new Components\PathComponent($value);
    }
    
    /**
     * 
     * @param string|null $value
     */
    private function setQuery($value) : void
    {
        $this->_query = new Components\QueryComponent($value);
    }
    
    /**
     * 
     * @param string|null $value
     */
    private function setFragment($value) : void
    {
        $this->_fragment = new Components\FragmentComponent($value);
    }
}
