<?php

namespace Secom\Cache;

use \Memcached as MC;

class Memcached implements Cacheable
{

    private $memcache;

    public function __construct(MC $memcache) {
        $this->memcache = $memcache;
    }

    public function set($key, $value, $ttl = 300) {
        $this->memcache->set($key, $value, $ttl);
    }

    public function get($key) {
        return $this->memcache->get($key);
    }

    public function delete($key) {
        $this->memcache->delete($key);
    }

}