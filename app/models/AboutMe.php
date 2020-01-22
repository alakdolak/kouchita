<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

/**
 * An Eloquent Model: 'AboutMe'
 *
 * @property integer $id
 * @property string $introduction
 * @property int $ageId
 * @property int $uId
 * @property int $sex
 * @method static \Illuminate\Database\Query\Builder|\App\models\AboutMe whereUId($value)
 * @mixin \Eloquent
 */

class AboutMe extends Model {

    protected $table = 'aboutMe';
    public $timestamps = false;
}
