<?php

namespace App\Domain\Register\Models;

use App\Domain\Common\Models\File;
use App\Domain\Common\Models\SaasModel;
use App\Domain\Common\Services\FileService;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\UploadedFile;
use OwenIt\Auditing\Contracts\Auditable;

class Category extends SaasModel implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes;

    const CATEGORY_TYPE_PRODUCT = 'p';
    const CATEGORY_TYPE_SERVICE = 's';

    protected $table = 'category';

    protected $fillable = [
        'contract_id',
        'photo_file_id',
        'code',
        'description',
        'active',
        'type',
        'parent_category_id',
        'observation'
    ];

    public function photo() {
        return $this->belongsTo(File::class, 'photo_file_id');
    }

    public function parent() {
        return $this->belongsTo(Category::class, 'parent_category_id');
    }

    public function fill(array $attributes) {
        if (isset($attributes['photo']) && $attributes['photo'] instanceof UploadedFile) {
            $attributes['photo_file_id'] = FileService::save($attributes['photo']);
        }
        return parent::fill($attributes);
    }
}
