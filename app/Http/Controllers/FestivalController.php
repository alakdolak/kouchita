<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FestivalController extends Controller
{
    public function mainPageFestival()
    {
        $allPictures = [];
        for ($i = 0; $i < 4; $i++){
            for ($j = 1; $j < 7; $j++){
                array_push($allPictures, (object)[
//                    'pic' => 'http://localhost/assets/_images/majara/fardan/s-1.jpg',
                    'pic' => \URL::asset('images/festival/test/test'.$j.'.png'),
                    'code' => $i.$j,
                    'like' => random_int(0, 9999),
                    'place' => 'استان فارس، شهر شیراز، حافظیه',
                    'placePic' => 'https://static.koochita.com/_images/majara/2369317/s-1.jpg',
                    'placeUrl' => 'http://localhost/kouchita/public/show-place-details/majara/%D8%B1%D8%B4%D8%AA%D9%87_%DA%A9%D9%88%D9%87_%D9%81%D8%B1%D8%AF%D8%A7%D9%86_%D8%A7%D8%B5%D9%81%D9%87%D8%A7%D9%86',
                    'username' => 'kiavash_zp',
                    'userUrl' => '#',
                    'userPic' => 'https://static.koochita.com/defaultPic/da45ed5ff457e3a6f1cf01c708ceabe3.jpg',
                    'title' => 'name_'.random_int(0, 9999),
                    'state' => 'استان فارس',
                    'city' => 'شهر شیراز',
                    'placeName' => 'حافظیه',
                    'description' => 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.',
                ]);
            }
        }

        return view('pages.festival.festivalMainPage', compact(['allPictures']));
    }

    public function festivalIntroduction()
    {
        return view('pages.festival.festivalIntroduction');
    }

    public function festivalSubmitPage()
    {
        if(auth()->check()) {
            $user = auth()->user();
            return view('pages.festival.festivalSubmitWorks', compact('user'));
        }
        else
            return redirect(route('festival'));
    }
}
