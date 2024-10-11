<?php

namespace App\Domain\Register\Services;

use App\Domain\Common\Interfaces\ServiceInterface;
use App\Domain\Register\Models\Category;

class CategoryService implements ServiceInterface {

    public static function get($columns = ['*'], $filters = [], $or = []) {
        return Category::contract()->where($filters)->orWhere($or)->get($columns);
    }

    public static function list($filters = [], $or = []) {
        return self::get(['id AS value', 'description'], $filters, $or);
    }

    public static function find($code) {
        return Category::contract()->where('code', $code)->first();
    }

    public static function save($data, $code = null) {
        if (!empty($code))
            return self::update($data, $code);
        return self::insert($data);
    }

    public static function insert($data) {
        $model = new Category();
        $model->fill($data);
        $model->save();
        return true;
    }

    public static function update($data, $code) {
        $model = self::find($code);
        $model->fill($data);
        $model->save();
        return true;
    }

    public static function delete($code) {
        $model = self::find($code);
        return $model->delete();
    }

}