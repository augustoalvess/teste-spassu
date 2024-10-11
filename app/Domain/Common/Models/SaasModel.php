<?php

namespace App\Domain\Common\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class SaasModel extends Model
{
    use HasFactory;

    protected static function booted() {
        static::creating(function ($model) {
            $model->contract_id = Auth::user()->contract_id;
            $model->code = $model->nextCode();
            return $model;
        });
    }

    protected function nextCode() {
        return self::where('contract_id', $this->contract_id)->max('code') + 1;
    }

    public function scopeContract($builder) {
        return $builder->where('contract_id', Auth::user()->contract_id);
    }
}
