<?php

namespace App\Http\Middleware;

use App\models\VideoCategory;
use Closure;
use Illuminate\Support\Facades\View;

class vodShareData
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
        $vodCategory = VideoCategory::where('parent', 0)->get();
        foreach ($vodCategory as $cat){
            $cat->sub = VideoCategory::where('parent', $cat->id)->get();
            foreach ($cat->sub as $item){
                $item->onIcon = \URL::asset('_images/video/category/'. $item->onIcon);
                $item->offIcon = \URL::asset('_images/video/category/'. $item->offIcon);
            }
        }
        View::share(['vodCategory' => $vodCategory]);

        return $next($request);
    }
}
