<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

/**
 * An Eloquent Model: 'TripNote'
 *
 * @property integer $id
 * @property integer $tripId
 * @property string $note
 * @method static \Illuminate\Database\Query\Builder|\App\models\TripNote whereTripId($value)
 */

class TripNote extends Model {

    protected $table = 'tripNote';
    public $timestamps = false;

    public static function whereId($value) {
        return TripNote::find($value);
    }
}
