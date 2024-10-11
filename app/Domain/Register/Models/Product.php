<?php

namespace App\Domain\Register\Models;

use App\Domain\Accountancy\Models\IcmsOrigin;
use App\Domain\Accountancy\Models\MeasureUnit;
use App\Domain\Common\Models\File;
use App\Domain\Common\Models\SaasModel;
use App\Domain\Common\Services\FileService;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\UploadedFile;
use OwenIt\Auditing\Contracts\Auditable;

class Product extends SaasModel implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes;

    const TYPE_PRODUCT = 'product';
    const TYPE_SERVICE = 'service';

    const PRODUCT_TYPE_SIMPLE = 's';
    const PRODUCT_TYPE_KIT = 'k';
    const PRODUCT_TYPE_RAW = 'r';
    const PRODUCT_TYPE_CONSUME = 'c';

    protected $table = 'product';

    protected $fillable = [
        'contract_id',
        'photo_file_id',
        'type',
        'code',
        'description',
        'active',
        'number',
        'category_id',
        'product_type',
        'unit_value',
        'measure_unit_id',
        'manage_stock',
        'current_stock',
        'minimum_stock',
        'maximum_stock',
        'icms_origin_id',
        'bar_code_number',
        'ncm',
        'cest',
        'net_weight',
        'gross_weight',
        'icms_aliquot',
        'ipi_aliquot',
        'pis_aliquot',
        'cofins_aliquot',
        'observation'
    ];

    protected function nextCode() {
        return Product::where('contract_id', $this->contract_id)->where('type', $this->type)->max('code') + 1;
    }

    public function scopeProduct($builder) {
        return $builder->where('type', self::TYPE_PRODUCT);
    }

    public function scopeService($builder) {
        return $builder->where('type', self::TYPE_SERVICE);
    }

    public function photo() {
        return $this->belongsTo(File::class, 'photo_file_id');
    }

    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function measure_unit() {
        return $this->belongsTo(MeasureUnit::class, 'measure_unit_id');
    }

    public function icms_origin() {
        return $this->belongsTo(IcmsOrigin::class, 'icms_origin_id');
    }

    public function providers() {
        return $this->hasMany(ProductProvider::class, 'product_id');
    }

    public function items() {
        return $this->hasMany(ProductItem::class, 'product_id');
    }

    public function fill(array $attributes) {
        if (isset($attributes['photo']) && $attributes['photo'] instanceof UploadedFile) {
            $attributes['photo_file_id'] = FileService::save($attributes['photo']);
        }
        return parent::fill($attributes);
    }
}
