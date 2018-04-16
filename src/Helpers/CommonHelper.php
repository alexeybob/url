<?php

use AB\Url\Url;

if (! function_exists('aburl')) {
    
    /**
     * 
     * @param string $url
     * @param array $arguments
     * @return Url
     */
    function aburl($url, $arguments = [])
    {
        $obj = new Url($url);
        
        foreach ($arguments as $key => $argument) {
            switch ($key) {
                case 'scheme':
                case 'host':
                case 'port':
                case 'user':
                case 'pass':
                case 'fragment':
                    $obj->$key = $argument;
                    break;
                case 'query':
                    if (in_array(gettype($argument), array('NULL', 'string', 'integer', 'double'))) {
                        $obj->$key = $argument;
                    } elseif (is_array($argument)) {
                        foreach ($argument as $qKey => $qValue) {
                            if (null === $qValue) {
                                $obj->$key->remove($qKey);
                            } else {
                                $obj->$key->add($qKey, $qValue);
                            }
                        }
                    }
                    break;
                case 'path':
                    if (in_array(gettype($argument), array('NULL', 'string', 'integer', 'double'))) {
                        $obj->$key = $argument;
                    } elseif (is_array($argument)) {
                        foreach ($argument as $qKey => $qValue) {
                            if (null === $qValue) {
                                $obj->$key->remove($qKey);
                            } else {
                                $obj->$key->add($qKey, $qValue);
                            }
                        }
                    }
                    break;
            }
        }
        
        return $obj;
    }
}