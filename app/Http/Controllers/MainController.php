<?php

namespace App\Http\Controllers;

use App\models\Activity;
use App\models\Amaken;
use App\models\BannerPics;
use App\models\Hotel;
use App\models\LogModel;
use App\models\MahaliFood;
use App\models\MainSliderPic;
use App\models\Post;
use App\models\PostComment;
use App\models\Restaurant;
use App\models\SectionPage;
use App\models\SogatSanaie;
use App\models\User;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function landingPage()
    {
        createSeeLog(0, 0, 'landing', '');
        return view('landing.landingPage');
    }

    public function showMainPage($mode = "mainPage") {
        $kindPlaceId= 0;

        $sliderPic = MainSliderPic::all();
        foreach ($sliderPic as $item)
            $item->pic = URL::asset('_images/sliderPic/'. $item->pic);

        $today = getToday()['date'];
        $hotelCount = Hotel::all()->count();
        $retCount = Restaurant::all()->count();
        $amakenCount = Amaken::all()->count();
        $sogatSanaie = SogatSanaie::all()->count();
        $mahaliFoodCount = MahaliFood::all()->count();
        $postCount = Post::where('date', '<=', $today)->where('release', '!=', 'draft')->count();

        $activityId1 = Activity::where('name', 'نظر')->first()->id;
        $activityId2 = Activity::where('name', 'پاسخ')->first()->id;

        $commentCount = 0;
        $commentCount += LogModel::where('activityId', $activityId1)->where('confirm', 1)->count();
        $commentCount += LogModel::where('activityId', $activityId2)->where('confirm', 1)->count();
        $commentCount += PostComment::where('status', 1)->count();
        $userCount = User::all()->count();

        $counts = [ 'hotel' => $hotelCount,
            'restaurant' => $retCount,
            'amaken' => $amakenCount,
            'sogatSanaie' => $sogatSanaie,
            'mahaliFood' => $mahaliFoodCount,
            'article' => $postCount,
            'comment' => $commentCount,
            'userCount' => $userCount];

        $articleBannerId = DB::table('bannerPosts')->pluck('postId')->toArray();
        $articleBanner = Post::whereIn('id', $articleBannerId)->get();
        foreach ($articleBanner as $item){
            $item->url = createUrl(0, 0, 0, 0, $item->id);
            $item->pic = createPicUrl($item->id);
        }

        $middleBan = [];

        $middleBan1 = BannerPics::where('page', 'mainPage')->where('section', 1)->get();
        foreach ($middleBan1 as $item){
            $item->pic = URL::asset('_images/bannerPic/' . $item->page . '/' . $item->pic);
            if($item->text == null)
                $item->text = '';
            if($item->link == 'https://')
                $item->link = '';
        }
        $middleBan['1']  = $middleBan1;

        $middleBan4 = BannerPics::where('page', 'mainPage')->where('section', 4)->get();
        foreach ($middleBan4 as $item){
            $item->pic = URL::asset('_images/bannerPic/' . $item->page . '/' . $item->pic);
            if($item->text == null)
                $item->text = '';
            if($item->link == 'https://')
                $item->link = '';
        }
        $middleBan['4']  = $middleBan4;

        $middleBan5 = BannerPics::where('page', 'mainPage')->where('section', 5)->get();
        foreach ($middleBan5 as $item){
            $item->pic = URL::asset('_images/bannerPic/' . $item->page . '/' . $item->pic);
            if($item->text == null)
                $item->text = '';
            if($item->link == 'https://')
                $item->link = '';
        }
        $middleBan['5']  = $middleBan5;

        $middleBan6 = BannerPics::where('page', 'mainPage')->where('section', 6)->first();
        if($middleBan6 != null){
            $middleBan6->pic = URL::asset('_images/bannerPic/' . $middleBan6->page . '/' . $middleBan6->pic);
            if($middleBan6->text == null)
                $middleBan6->text = '';
            if($middleBan6->link == 'https://')
                $middleBan6->link = '';
        }
        $middleBan['6']  = $middleBan6;

        return view('pages.main',
                ['placeMode' => $mode, 'kindPlaceId' => $kindPlaceId, 'sliderPic' => $sliderPic, 'count' => $counts,
                'sections' => SectionPage::wherePage(getValueInfo('hotel-detail'))->get(),  'articleBanner' => $articleBanner,
                'middleBan' => $middleBan ]);
    }



}
