<?php

namespace Secom\Cache;

interface Cacheable
{
    public function set($key, $value, $ttl = 300);
    public function get($key);
    public function delete($key);
}