<?php

namespace AB\Url\Traits;

use AB\Url\Components;

/**
 * @author Alexey Bob <alexey.bob@gmail.com>
 */
trait GetTrait
{
    /**
     * 
     * @param string $name
     * @return mixed
     */
    public function __get(string $name)
    {
        $getter = $this->createMethodName('get', $name);
        
        return $this->$getter();
    }
    
    /**
     * 
     * @return \AB\Url\Components\SchemeComponent
     */
    private function getScheme() : Components\SchemeComponent
    {
        return $this->_scheme;
    }
    
    /**
     * 
     * @return \AB\Url\Components\HostComponent
     */
    private function getHost() : Components\HostComponent
    {
        return $this->_host;
    }
    
    /**
     * 
     * @return \AB\Url\Components\PortComponent
     */
    private function getPort() : Components\PortComponent
    {
        return $this->_port;
    }
    
    /**
     * 
     * @return \AB\Url\Components\UserComponent
     */
    private function getUser() : Components\UserComponent
    {
        return $this->_user;
    }
    
    /**
     * 
     * @return \AB\Url\Components\PassComponent
     */
    private function getPass() : Components\PassComponent
    {
        return $this->_pass;
    }
    
    /**
     * 
     * @return \AB\Url\Components\PathComponent
     */
    private function getPath() : Components\PathComponent
    {
        return $this->_path;
    }
    
    /**
     * 
     * @return \AB\Url\Components\QueryComponent
     */
    private function getQuery() : Components\QueryComponent
    {
        return $this->_query;
    }
    
    /**
     * 
     * @return \AB\Url\Components\FragmentComponent
     */
    private function getFragment() : Components\FragmentComponent
    {
        return $this->_fragment;
    }
}