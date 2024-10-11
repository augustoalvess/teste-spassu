<?php

namespace App\Domain\Register\Services;

use App\Domain\Common\Interfaces\ServiceInterface;
use App\Domain\Register\Models\Product;
use App\Domain\Register\Models\ProductItem;
use App\Domain\Register\Models\ProductProvider;

class LivroService implements ServiceInterface {

    public static function get($columns = ['*'], $filters = [], $or = []) {
        return Product::contract()->product()->where($filters)->orWhere($or)->get($columns);
    }

    public static function list($filters = [], $or = []) {
        return self::get(['id AS value', 'description'], $filters, $or);
    }

    public static function find($code) {
        return Product::contract()->product()->where('code', $code)->first();
    }

    public static function save($data, $code = null) {
        if (!empty($code))
            return self::update($data, $code);
        return self::insert($data);
    }

    public static function insert($data) {
        $model = new Product();
        $model->fill($data);
        $model->type = Product::TYPE_PRODUCT;
        $model->save();
        foreach ($data['product_providers'] ?? [] as $provider) {
            $productProvider = new ProductProvider();
            $productProvider->fill($provider);
            $productProvider->product_id = $model->id;
            $productProvider->save();
        }
        foreach ($data['product_items'] ?? [] as $item) {
            $productItem = new ProductItem();
            $productItem->fill($item);
            $productItem->product_id = $model->id;
            $productItem->save();
        }
        return true;
    }

    public static function update($data, $code) {
        $model = self::find($code);
        $model->fill($data);
        $model->type = Product::TYPE_PRODUCT;
        $model->save();
        foreach ($model->providers as $productProvider) {
            $findedProvider = array_filter($data['product_providers'], function($provider) use ($productProvider) {
                return $productProvider->id == $provider['id'];
            });
            if (empty($findedProvider))
                $productProvider->delete();
        }
        foreach ($data['product_providers'] ?? [] as $provider) {
            $productProvider = ProductProvider::where('id', $provider['id'])->firstOrNew();
            $productProvider->fill($provider);
            $productProvider->product_id = $model->id;
            $productProvider->save();
        }
        foreach ($model->items as $productItem) {
            $findedItem = array_filter($data['product_items'], function($item) use ($productItem) {
                return $productItem->id == $item['id'];
            });
            if (empty($findedItem))
                $productItem->delete();
        }
        foreach ($data['product_items'] ?? [] as $item) {
            $productItem = ProductItem::where('id', $item['id'])->firstOrNew();
            $productItem->fill($item);
            $productItem->product_id = $model->id;
            $productItem->save();
        }
        return true;
    }

    public static function delete($code) {
        $model = self::find($code);
        return $model->delete();
    }

}