<?php

namespace App\Domain\Register\Services;

use App\Domain\Common\Interfaces\ServiceInterface;
use App\Domain\Register\Models\Assunto;

class AssuntoService implements ServiceInterface {

    public static function get($columns = ['*'], $filters = [], $or = []) {
        return Assunto::where($filters)->orWhere($or)->get($columns);
    }

    public static function list($filters = [], $or = []) {
        return self::get(['codas AS value', 'descricao AS description'], $filters, $or);
    }

    public static function find($code) {
        return Assunto::where('codas', $code)->first();
    }

    public static function save($data, $code = null) {
        if (!empty($code))
            return self::update($data, $code);
        return self::insert($data);
    }

    public static function insert($data) {
        $model = new Assunto();
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