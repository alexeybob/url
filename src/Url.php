<?php

namespace AB\Url;

/**
 * @author Alexey Bob <alexey.bob@gmail.com>
 * 
 * @example 'http://username:password@hostname:9090/segment1/segment2/segment3/segment4/segment5/segment6?arg1=value1&arg2=value2&arg3=value3&arg4=value4&arg5=value5#anchor'
 */
class Url
{
    use Traits\SetTrait, Traits\GetTrait, Traits\UrlTrait;
    
    /**
     *
     * @var string
     */
    private $_url;
    
    /**
     *
     * @var \AB\Url\Components\SchemeComponent
     */
    private $_scheme;
    
    /**
     *
     * @var \AB\Url\Components\HostComponent
     */
    private $_host;
    
    /**
     *
     * @var \AB\Url\Components\PortComponent
     */
    private $_port;
    
    /**
     *
     * @var \AB\Url\Components\UserComponent
     */
    private $_user;
    
    /**
     *
     * @var \AB\Url\Components\PassComponent
     */
    private $_pass;
    
    /**
     *
     * @var \AB\Url\Components\PathComponent
     */
    private $_path;
    
    /**
     *
     * @var \AB\Url\Components\QueryComponent
     */
    private $_query;
    
    /**
     *
     * @var \AB\Url\Components\FragmentComponent
     */
    private $_fragment;
    
    
    
    /**
     * 
     * @param string|null $url
     */
    public function __construct($url = null)
    {
        if (null !== $url) {
            $this->init($url);
        }
    }
    
    /**
     * 
     * @param string $name
     * @param array $arguments
     * @return mixed
     */
    public function __call(string $name, array $arguments)
    {
        if (count($arguments) > 0) {
            
            // set
            $setter = $this->createMethodName('set', $name);
            
            $this->$setter(... $arguments);
            
            return $this;
        }
        
        // get
        $getter = $this->createMethodName('get', $name);
        
        return $this->$getter();
    }
    
    /**
     * 
     * @return string
     * @throws \Exception
     */
    public function __toString()
    {
        $url = 
            $this->scheme
                . '://' . ($this->user->has() ? ($this->user . ':') : '')
                . ($this->pass->has() ? ($this->pass . '@') : '')
                . $this->host . ($this->port->has() ? (':' . $this->port) : '')
                . $this->path
                . ($this->query->has() ? ('?' . $this->query) : '')
                . ($this->fragment->has() ? ('#' . $this->fragment) : '');
        
        if (false === parse_url($url)) {
            throw new \Exception('Invalid url "' . $url . '"');
        }
        
        return $url;
    }
}
