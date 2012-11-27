<?php

namespace Secom\Cache;

use \Memcached as MC,
    \RuntimeException;

class Memcached implements Cacheable
{
    private $memcache;

    public function __construct(MC $memcache) {
        $this->memcache = $memcache;

        $stats = $this->memcache->getStats();
        if (!count($stats)) {
            throw new RuntimeException('No memcached server defined!');
        }

        foreach ($stats as $stat) {
            if ($stat['pid'] !== -1) return;
        }

        throw new RuntimeException('Memcached not running!');
    }

    public function set($key, $value, $ttl = 0) {
        $this->memcache->set($key, $value, $ttl);
    }

    public function get($key) {
        return $this->memcache->get($key);
    }

    public function delete($key) {
        $this->memcache->delete($key);
    }

}
