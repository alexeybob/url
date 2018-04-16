<?php

namespace AB\Url\Traits;

/**
 * @author Alexey Bob <alexey.bob@gmail.com>
 */
trait UrlTrait
{
    /**
     * 
     * @param string $data
     * @throws \Exception
     */
    public function init(string $data)
    {
        $this->_url = $data;
        
        $url = parse_url($this->_url);
        
        if (false === $url) {
            throw new \Exception('Invalid url "' . $data . '"');
        }
        
        $this->scheme(isset($url['scheme']) ? $url['scheme'] : null);
        $this->host(isset($url['host']) ? $url['host'] : null);
        $this->port(isset($url['port']) ? $url['port'] : null);
        $this->user(isset($url['user']) ? $url['user'] : null);
        $this->pass(isset($url['pass']) ? $url['pass'] : null);
        $this->path(isset($url['path']) ? $url['path'] : null);
        $this->query(isset($url['query']) ? $url['query'] : null);
        $this->fragment(isset($url['fragment']) ? $url['fragment'] : null);
    }
    
    /**
     * 
     * @param string $type
     * @param string $name
     * @return string
     * @throws \Exception
     */
    private function createMethodName(string $type, string $name)
    {
        $methodName = $type . ucfirst($name);
        
        if (false === method_exists($this, $methodName)) {
            throw new \Exception('Invalid method "' . $methodName . '"');
        }
        
        return $methodName;
    }
}