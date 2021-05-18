<?php

namespace src\Applications\Http\Controllers;

use Memcached;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class MemcacheController extends Controller
{
    public function create(): string
    { 
        $this->memcached->add('testKey', 'Test Value');

        $key = $this->memcached->get('testKey');

        return $key;
    }

    public function update(): string
    { 
        $this->memcached->replace('testKey', 'New Value');

        $key = $this->memcached->get('testKey');

        return $key;
    }

    public function delete(): void
    { 
        $this->memcached->delete('testKey');

        $this->memcached->get('testKey');

        if ($this->memcached->getResultCode() == Memcached::RES_NOTFOUND) {
            abort(404, 'Key not found');
        }
    }
}