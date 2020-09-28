<?php

namespace App\Http\Middleware;

use App\models\Safarnameh;
use App\models\SafarnamehCategories;
use App\models\SafarnamehCategoryRelations;
use Closure;
use Illuminate\Support\Facades\View;


class SafarnamehShareData
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
        $today = getToday()['date'];
        $nowTime = getToday()['time'];

        $category = SafarnamehCategories::where('parent', 0)->get();
        foreach ($category as $item) {
            $catRel = SafarnamehCategoryRelations::where('categoryId', $item->id)->pluck('safarnamehId')->toArray();
            $item->postCount = Safarnameh::whereIn('id', $catRel)
                ->where('confirm', 1)
                ->whereRaw('(date < ' . $today . ' OR (date = ' . $today . ' AND time <= ' . $nowTime . ' ) OR time IS NULL)')
                ->whereRaw('safarnameh.release <> "draft"')->count();
            $item->subCategory = SafarnamehCategories::where('parent', $item->id)->get();

            foreach ($item->subCategory as $item2) {
                $catRel = SafarnamehCategoryRelations::where('categoryId', $item2->id)->pluck('safarnamehId')->toArray();
                $item2->postCount = Safarnameh::whereIn('id', $catRel)
                    ->where('confirm', 1)
                    ->whereRaw('(safarnameh.date < ' . $today . ' OR (safarnameh.date = ' . $today . ' AND safarnameh.time <= ' . $nowTime . ' ))')
                    ->whereRaw('safarnameh.release <> "draft"')->count();
            }
        }
        for($i = 0; $i < count($category); $i++){
            for($j = $i+1; $j < count($category); $j++) {
                if(count($category[$i]->subCategory) < count($category[$j]->subCategory)){
                    $c = $category[$i];
                    $category[$i] = $category[$j];
                    $category[$j] = $c;
                }
            }
        }

        View::share(['category' => $category]);
        return $next($request);
    }
}
