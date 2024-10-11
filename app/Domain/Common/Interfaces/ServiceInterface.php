<?php

namespace App\Domain\Common\Interfaces;

interface ServiceInterface {
    public static function get($columns = ['*'], $filters = [], $or = []);
    public static function list($filters = [], $or = []);
    public static function find($code);
    public static function save($data, $code = null);
    public static function insert($data);
    public static function update($data, $code);
    public static function delete($code);
}

