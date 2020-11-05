<?php

namespace App\models\localShops;

use Illuminate\Database\Eloquent\Model;

class LocalShops extends Model
{
    protected $table = 'localShops';

    public function getPictures(){
        return $this->hasMany(LocalShopsPictures::class, 'id', 'localShopId');
    }

    public function getCategory()
    {
        return $this->belongsTo(LocalShopsCategory::class, 'categoryId', 'id');
    }
}
