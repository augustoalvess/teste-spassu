<?php

namespace App\Domain\Register\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class ProductItem extends Model implements Auditable
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes;

    protected $table = 'product_item';

    protected $fillable = [
        'product_id',
        'price',
        'required',
        'default'
    ];

    public function product() {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
