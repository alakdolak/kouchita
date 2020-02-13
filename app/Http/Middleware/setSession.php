<?php

namespace App\Http\Middleware;

use App\models\Amaken;
use App\models\Cities;
use App\models\Hotel;
use App\models\MahaliFood;
use App\models\Majara;
use App\models\Place;
use App\models\Restaurant;
use App\models\SogatSanaie;
use App\models\State;
use Closure;

class setSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $isPlace = false;
        $url = $request->url();
        $url = urldecode($url);
        $url = explode('/', $url);
//        $ses = '';

        $places = ['hotel-details', 'amaken-details', 'majara-details', 'restaurant-details', 'sanaiesogat-details', 'mahaliFood-details'];
        foreach ($places as $item){
            if(in_array($item, $url)){
                $index = array_search($item, $url);
                $placeId = $url[$index+1];
                switch ($item){
                    case 'hotel-details':
                        $kindPlace = Place::whereName('هتل')->first();
                        $place = Hotel::find($placeId);
                        break;
                    case 'amaken-details':
                        $kindPlace = Place::whereName('اماکن')->first();
                        $place = Amaken::find($placeId);
                        break;
                    case 'majara-details':
                        $kindPlace = Place::whereName('ماجرا')->first();
                        $place = Majara::find($placeId);
                        break;
                    case 'restaurant-details':
                        $kindPlace = Place::whereName('رستوران')->first();
                        $place = Restaurant::find($placeId);
                        break;
                    case 'sanaiesogat-details':
                        $kindPlace = Place::whereName('صنایع سوغات')->first();
                        $place = SogatSanaie::find($placeId);
                        break;
                    case 'mahaliFood-details':
                        $kindPlace = Place::whereName('غذای محلی')->first();
                        $place = MahaliFood::find($placeId);
                        break;
                }
                if($place == null || $kindPlace == null)
                    return redirect(url('/'));
                else{
                    $ses = 'place_' . $kindPlace->id . '_' . $place->id;
                    $isPlace = true;
                }
                break;
            }
        }

        if(!$isPlace){
            if(in_array('cityPage', $url)){
                $index = array_search('cityPage', $url);
                $placeKind = $url[$index+1];
                $placeName = $url[$index+2];

                if($placeKind == 'state'){
                    $place = State::where('name', $placeName)->first();
                    $ses = 'state_';
                }
                else{
                    $place = Cities::where('name', $placeName)->first();
                    $ses = 'city_';
                }

                if($place != null)
                    $ses .= $place->id;
                else
                    return redirect(url('/'));

            }
        }

        session(['inPage' => $ses]);
        return $next($request);
    }
}
