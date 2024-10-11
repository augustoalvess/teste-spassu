<?php

namespace App\Domain\Register\Services;

use App\Domain\Common\Interfaces\ServiceInterface;
use App\Domain\Register\Models\Livro;
use App\Domain\Register\Models\LivroAssunto;
use App\Domain\Register\Models\LivroAutor;

class LivroService implements ServiceInterface {

    public static function get($columns = ['*'], $filters = [], $or = []) {
        return Livro::where($filters)->orWhere($or)->get($columns);
    }

    public static function list($filters = [], $or = []) {
        return self::get(['codl AS value', 'titulo AS description'], $filters, $or);
    }

    public static function find($code) {
        return Livro::where('codl', $code)->first();
    }

    public static function save($data, $code = null) {
        if (!empty($code))
            return self::update($data, $code);
        return self::insert($data);
    }

    public static function insert($data) {
        $model = new Livro();
        $model->fill($data);
        $model->save();
        self::insertLivroAutores($data, $model);
        self::insertLivroAssuntos($data, $model);
        return true;
    }

    public static function insertLivroAutores($data, $model) {
        foreach ($data['autores'] ?? [] as $autor) {
            $livroautor = LivroAutor::where('id', $autor['id'])->firstOrNew();
            $livroautor->fill($autor);
            $livroautor->livro_codl = $model->codl;
            $livroautor->save();
        }
    }

    public static function insertLivroAssuntos($data, $model) {
        foreach ($data['assuntos'] ?? [] as $assunto) {
            $livroassunto = LivroAssunto::where('id', $assunto['id'])->firstOrNew();
            $livroassunto->fill($assunto);
            $livroassunto->livro_codl = $model->codl;
            $livroassunto->save();
        }
    }

    public static function update($data, $code) {
        $model = self::find($code);
        $model->fill($data);
        $model->save();
        self::updateLivroAutores($data, $model);
        self::updateLivroAssuntos($data, $model);
        return true;
    }

    public static function updateLivroAutores($data, $model) {
        foreach ($model->autores as $livroautor) {
            $find = array_filter($data['autores'], function($autor) use ($livroautor) {
                return $livroautor->id == $autor['id'];
            });
            if (empty($find))
                $livroautor->delete();
        }
        self::insertLivroAutores($data, $model);
    }

    public static function updateLivroAssuntos($data, $model) {
        foreach ($model->assuntos as $livroassunto) {
            $find = array_filter($data['assuntos'], function($assunto) use ($livroassunto) {
                return $livroassunto->id == $assunto['id'];
            });
            if (empty($find))
                $livroassunto->delete();
        }
        self::insertLivroAssuntos($data, $model);
    }

    public static function delete($code) {
        $model = self::find($code);
        return $model->delete();
    }

}