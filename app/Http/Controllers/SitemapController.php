<?php

namespace App\Http\Controllers;

use App\models\Amaken;
use App\models\Cities;
use App\models\Place;
use App\models\Post;
use App\models\State;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function index()
    {
        return response()->view('sitemap.index')->header('Content-Type', 'application/xml');
    }

    public function places()
    {
        $kindPlaces = Place::all();
        $pl = array();
        $count = 0;
        foreach ($kindPlaces as $kindPlace) {
            if ($kindPlace->tableName != null) {
                $places = \DB::table($kindPlace->tableName)->select(['id', 'slug', 'name'])->get();
                foreach ($places as $place) {
                    if($place->slug != null) {
                        $slug = urlencode($place->slug);
                        $place->url = url('show-place-details/' . $kindPlace->fileName . '/' . $slug);
                        $count++;
                        array_push($pl, $place);
                    }
                }
            }
        }

        return response()->view('sitemap.places', ['places' => $pl])->header('Content-Type', 'application/xml');
    }

    public function lists()
    {
        $kindPlaces = Place::all();
        $state = State::all();

        $lists = [
            url('placeList/1/country'),
            url('placeList/3/country'),
            url('placeList/4/country'),
            url('placeList/6/country'),
            url('placeList/10/country'),
            url('placeList/11/country'),
        ];

        foreach ($state as $item){
            foreach ($kindPlaces as $kindPlace){
                if($kindPlace->tableName != null){
                    $slug = urlencode($item->name);
                    $l = url('placeList/' . $kindPlace->id . '/state/' . $slug);
                    array_push($lists, $l);
                }
            }

            $cities = Cities::where('stateId', $item->id)->get();
            foreach ($cities as $city) {
                foreach ($kindPlaces as $kindPlace){
                    if($kindPlace->tableName != null){
                        $slug = urlencode($city->name);
                        $l = url('placeList/' . $kindPlace->id . '/city/' . $slug);
                        array_push($lists, $l);
                    }
                }
            }
        }

        return response()->view('sitemap.lists', ['lists' => $lists])->header('Content-Type', 'application/xml');
    }

    public function posts()
    {
        $today = getToday()["date"];
        $nowTime = getToday()["time"];
        $post = Post::whereRaw('(post.date < ' . $today . ' OR (post.date = ' . $today . ' AND  (post.time <= ' . $nowTime . ' OR post.time IS NULL)))')->select(['id', 'title', 'slug', 'created_at'])->get();

        $lists = array();
        foreach ($post as $item) {
            if($item->slug != null && $item->slug != '') {
                $slug = urlencode($item->slug);
                $l = url('/article/' . $slug);
                array_push($lists, [$l, $item->created_at]);
            }
        }

        return response()->view('sitemap.posts', ['lists' => $lists])->header('Content-Type', 'application/xml');
    }

    public function city()
    {
        $state = State::all();

        $lists = array();

        foreach ($state as $item){
            $slug = urlencode($item->name);
            $l = url('cityPage/state/' . $slug);
            array_push($lists, $l);

            $cities = Cities::where('stateId', $item->id)->get();
            foreach ($cities as $city) {
                $slug = urlencode($city->name);
                $l = url('cityPage/city/' . $slug);
                array_push($lists, $l);
            }
        }

        return response()->view('sitemap.city', ['lists' => $lists])->header('Content-Type', 'application/xml');
    }
}
