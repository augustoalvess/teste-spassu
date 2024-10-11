<?php

namespace App\Domain\Register\Models;

use App\Domain\Common\Models\Person;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class ProductProvider extends Model implements Auditable
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes;

    protected $table = 'product_provider';

    protected $fillable = [
        'product_id',
        'provider_id',
        'provider_code',
        'purchasing_unit',
        'purchasing_measure_unit_id',
        'unit_price'
    ];

    public function product() {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function provider() {
        return $this->belongsTo(Person::class, 'provider_id');
    }

    public function measureunit() {
        return $this->belongsTo(MeasureUnit::class, 'purchasing_measure_unit_id');
    }
}
