<?php


use App\models\SafarnamehCategoryRelations;
use App\models\SafarnamehComments;
use App\models\SafarnamehLike;
use App\models\User;
use App\models\Activity;
use App\models\Place;
use App\models\Cities;
use App\models\State;
use App\models\LogModel;

function SafarnamehMinimalData($safarnameh){

    $safarnameh->msgs = SafarnamehComments::where('safarnamehId', $safarnameh->id)
                                            ->where(function($query){
                                                if(auth()->check())
                                                    $query->where('confirm', 1)->orWhere('userId', auth()->user()->id);
                                                else
                                                    $query->where('confirm', 1);
                                            })
                                            ->count();
    $safarnameh->like = SafarnamehLike::where('safarnamehId', $safarnameh->id)
                                        ->where('like',1)
                                        ->count();
    $safarnameh->disLike = SafarnamehLike::where('safarnamehId', $safarnameh->id)
                                            ->where('like',-1)
                                            ->count();
    if($safarnameh->date == null)
        $safarnameh->date = \verta($safarnameh->created_at)->format('Ym%d');
    if($safarnameh->date != null)
        $safarnameh->date = convertJalaliToText($safarnameh->date);

    $safarnameh->pic = \URL::asset('_images/posts/' . $safarnameh->id . '/' . $safarnameh->pic);
    $writer = User::find($safarnameh->userId);
    $safarnameh->username = $writer->username;
    $safarnameh->writerPic = getUserPic($writer->id);
    $safarnameh->url = route('safarnameh.show', ['id' => $safarnameh->id]);
    $category = SafarnamehCategoryRelations::join('safarnamehCategories', 'safarnamehCategories.id', 'safarnamehCategoryRelations.categoryId')
        ->where('safarnamehCategoryRelations.safarnamehId', $safarnameh->id)
        ->where('safarnamehCategoryRelations.isMain', 1)->first();

    if($category != null) {
        $safarnameh->category = $category->name;
        $safarnameh->categoryId = $category->id;
    }
    else{
        $safarnameh->category = null;
        $safarnameh->categoryId = 0;
    }
    if($safarnameh->category == null)
        $safarnameh->category = '';
    if ($safarnameh->summery == null) {
        if ($safarnameh->meta != null)
            $safarnameh->summery = $safarnameh->meta;
        else
            $safarnameh->summery = '';
    }

    return $safarnameh;
}

function createSuggestionPack($_kindPlaceId, $_placeId){
    $activityId = Activity::whereName('نظر')->first()->id;

    $kindPlace = Place::find($_kindPlaceId);
    $place = \DB::table($kindPlace->tableName)->select(['name', 'id', 'file', 'picNumber', 'alt', 'cityId'])->find($_placeId);
    if($place != null) {
        $city = Cities::whereId($place->cityId);

        $place->pic = getPlacePic($place->id, $kindPlace->id);
        $place->url = createUrl($kindPlace->id, $place->id, 0, 0);
        if($city != null) {
            $place->city = $city->name;
            $place->state = State::whereId($city->stateId)->name;
        }
        else{
            $place->city = '';
            $place->state = '';
        }
        $place->rate = getRate($place->id, $_kindPlaceId)[1];
        $condition = ['placeId' => $place->id, 'kindPlaceId' => $_kindPlaceId, 'activityId' => $activityId, 'confirm' => 1];
        $place->review = LogModel::where($condition)->count();
        return $place;
    }
    return null;
}
