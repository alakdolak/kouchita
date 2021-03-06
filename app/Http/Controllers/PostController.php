<?php

namespace App\Http\Controllers;

use App\models\Amaken;
use App\models\Cities;
use App\models\DefaultPic;
use App\models\Hotel;
use App\models\MahaliFood;
use App\models\Majara;
use App\models\Place;
use App\models\PlacePic;
use App\models\Post;
use App\models\PostCategory;
use App\models\PostCategoryRelation;
use App\models\PostCityRelation;
use App\models\PostComment;
use App\models\PostCommentLike;
use App\models\PostLikes;
use App\models\PostPlaceRelation;
use App\models\PostTag;
use App\models\PostTagsRelation;
use App\models\Restaurant;
use App\models\Safarnameh;
use App\models\SafarnamehTagRelation;
use App\models\SogatSanaie;
use App\models\State;
use App\models\Tag;
use App\models\User;
use Carbon\Carbon;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;

class PostController extends Controller {

    public function mainArticle($page = 1) {

        $today = getToday()["date"];
        $todayTime = getToday()["time"];
        $lastMonthDate = \verta(Carbon::now()->subMonth())->format('Y/m/%d');
        $lastMonthDate = convertDateToString($lastMonthDate);


        //this section we get banner posts
        $bPost = DB::table('post')->join('bannerPosts', 'postId', 'post.id')->where('date', '<=', $today)->select('creator', 'post.id', 'post.title', 'post.seen', 'post.created_at', 'post.pic', 'post.date', 'post.title', 'post.keyword', 'post.slug')->take(5)->get();
        if(count($bPost) == 3)
            $countBanner = 2;
        else if(count($bPost) == 4 || count($bPost) == 5 || count($bPost) == 2 || count($bPost) == 1)
            $countBanner = count($bPost);
        else if(count($bPost) > 5)
            $countBanner = 5;
        $bannerPosts = array();
        foreach ($bPost as $post) {
            $post->pic = \URL::asset('_images/posts/' . $post->id . '/' . $post->pic);
            if($post->date == null)
                $post->date = \verta($post->created_at)->format('Y/m/%d');

            $post->date = convertJalaliToText($post->date);
            $post->msgs = PostComment::wherePostId($post->id)->whereStatus(true)->count();
            $post->username = User::whereId($post->creator)->username;
            $mainCategory = PostCategoryRelation::where('postId', $post->id)->where('isMain', 1)->first();
            $post->category = PostCategory::find($mainCategory->categoryId)->name;
            if($countBanner != 0) {
                array_push($bannerPosts, $post);
                $countBanner--;
            }
        }

        //this section get all post released in last month
        $lastMonthPost = \DB::select('SELECT post.id, post.title, post.slug, `date`, post.time, post.keyword, post.pic, post.seen, post.creator, u.username AS username FROM post LEFT JOIN `users` AS u ON post.creator = u.id WHERE (`date` > ' . $lastMonthDate . ' OR (post.date = ' . $lastMonthDate . ' AND post.time <= ' . $todayTime . ' )) AND post.release <> "draft" ORDER By post.date DESC ');
        $lastMonthPostId = array();
        foreach ($lastMonthPost as $item) {
            $item->like = 0;
            $item->pic = \URL::asset('_images/posts/' . $item->id . '/' . $item->pic);
            if ($item->date == null)
                $item->date = \verta($item->created_at)->format('Ym%d');
            $item->date = convertJalaliToText($item->date);
            array_push($lastMonthPostId, $item->id);
        }
        // end get lastMonthPost

        //this section get 5 most like post from lastMonthPost
        $likePost = [];
        if(count($lastMonthPostId) > 0)
            $likePost = \DB::select('SELECT post.id, COUNT(postLike.id) as likeCount FROM post JOIN postLike ON postLike.like = 1 AND postLike.postId = post.id AND post.id IN (' . implode(",", $lastMonthPostId) . ')  GROUP BY post.id ORDER BY likeCount DESC');

        $mostLike = array();
        $mostLikeId = array();
        foreach ($likePost as $item){
            foreach ($lastMonthPost as $item2){
                if($item->id == $item2->id){
                    $item2->likes = $item->likeCount;
                    array_push($mostLike, $item2);
                    array_push($mostLikeId, $item->id);
                    break;
                }
            }
        }
        foreach ($lastMonthPost as $item){
            if(!in_array($item->id, $mostLikeId) && count($mostLikeId) < 5){
                array_push($mostLike, $item);
                array_push($mostLikeId, $item->id);
            }
        }
        foreach ($mostLike as $item){
            $item->msgs = PostComment::wherePostId($item->id)->whereStatus(true)->count();
            $mainCategory = PostCategoryRelation::where('postId', $item->id)->where('isMain', 1)->first();
            $item->category = PostCategory::find($mainCategory->categoryId)->name;
        }
        // end mostLikePost


        //this section get 5 newest post from lastMonthPost
        $recentlyPosts = array();
        for($i = 0; $i < 5 && $i < count($lastMonthPost); $i++)
            array_push($recentlyPosts, $lastMonthPost[$i]);
        foreach ($recentlyPosts as $item){
            $item->msgs = PostComment::wherePostId($item->id)->whereStatus(true)->count();
            $mainCategory = PostCategoryRelation::where('postId', $item->id)->where('isMain', 1)->first();
            $item->category = PostCategory::find($mainCategory->categoryId)->name;
        }
        //end newest Post


        //this section get mostSeen Post from lastMonthPost
        $mostSeenPost = array();
        for($i = 0; $i < count($lastMonthPost); $i++){
            for($j = $i + 1; $j < count($lastMonthPost); $j++){
                if($lastMonthPost[$i]->seen < $lastMonthPost[$j]->seen){
                    $c = $lastMonthPost[$i];
                    $lastMonthPost[$i] = $lastMonthPost[$j];
                    $lastMonthPost[$j] = $c;
                }
            }
        }
        for($i = 0; $i < 5 && $i < count($lastMonthPost); $i++) {
            array_push($mostSeenPost, $lastMonthPost[$i]);
        }
        foreach ($mostSeenPost as $item) {
            $item->msgs = PostComment::wherePostId($item->id)->whereStatus(true)->count();
            $mainCategory = PostCategoryRelation::where('postId', $item->id)->where('isMain', 1)->first();
            $item->category = PostCategory::find($mainCategory->categoryId)->name;
        }
        //end mostSeen Post


        //this section get mostComment Post from lastMonthPost
        $commentPost = [];
        if(count($lastMonthPostId) > 0)
            $commentPost = \DB::select('SELECT post.id, COUNT(postComment.id) as CommentCount FROM post JOIN postComment ON postComment.status = 1 AND postComment.postId = post.id AND post.id IN (' . implode(",", $lastMonthPostId) . ')  GROUP BY post.id ORDER BY CommentCount DESC');
        $mostCommentPost = [];
        $mostCommentPostId = [];
        foreach ($commentPost as $item){
            foreach ($lastMonthPost as $item2){
                if($item->id == $item2->id){
                    $item2->msgs = $item->CommentCount;
                    array_push($mostCommentPost, $item2);
                    array_push($mostCommentPostId, $item->id);
                    break;
                }
            }
        }
        foreach ($lastMonthPost as $item){
            if(!in_array($item->id, $mostCommentPostId) && count($mostCommentPostId) < 5){
                array_push($mostCommentPost, $item);
                array_push($mostCommentPostId, $item->id);
            }
        }
        foreach ($mostCommentPost as $item){
            $mainCategory = PostCategoryRelation::where('postId', $item->id)->where('isMain', 1)->first();
            $item->category = PostCategory::find($mainCategory->categoryId)->name;
        }
        //end mostComment Post

        $lastPage = session('inPage');
        $res = $this->getRelatedPosts($lastPage, $today, $todayTime);
        $relatedPost = $res[0];
        $stateCome = $res[1];
        $cityCome = $res[2];
        $placeCome = $res[3];


        $category = $this->getAllCategory();
        $pageLimit = ceil(Post::where('date', '<=', $today)->where('release', '!=', 'draft')->count() / 5);


        return view('Article.mainArticle',compact(['stateCome', 'cityCome', 'placeCome', 'category', 'mostLike', 'bannerPosts', 'recentlyPosts', 'mostCommentPost', 'mostSeenPost', 'relatedPost', 'page', 'pageLimit']) );
    }

    public function paginationArticle(Request $request)
    {
        $page = $request->page;
        $take = $request->take;
        $today = getToday()["date"];
        $nowTime = getToday()["time"];

        $allPosts = Post::join('users', 'users.id', 'post.creator')
            ->whereRaw('(post.date <= ' . $today . ' OR (post.date = ' . $today . ' AND (post.time <= ' . $nowTime . ' || post.time IS NULL)))')
            ->whereRaw('post.release <> "draft"')
            ->select('username', 'post.id', 'post.title', 'post.meta', 'post.slug', 'post.seen', 'post.date', 'post.created_at', 'post.pic', 'post.keyword')
            ->orderBy('date', 'DESC')
            ->skip(($page-1) * $take)->take($take)->get();

        foreach ($allPosts as $item) {
            $item->msgs = PostComment::wherePostId($item->id)->whereStatus(true)->count();
            $item->pic = \URL::asset('_images/posts/' . $item->id . '/' . $item->pic);
            if ($item->date == null)
                $item->date = \verta($item->created_at)->format('Ym%d');
            $item->date = convertJalaliToText($item->date);
            $mainCategory = PostCategoryRelation::where('postId', $item->id)->where('isMain', 1)->first();
            $item->category = PostCategory::find($mainCategory->categoryId)->name;
            $item->url = route('article.show', ['slug' => $item->slug]);
        }


        echo json_encode($allPosts);
        return;
    }

    public function postWithId($id)
    {
        $post = Post::find($id);
        if($post != null) {
            $today = getToday();
            if($post->release == 'released' || ($post->release == 'future' && ($post->date > $today['date'] || ($post->date == $today['date'] && ($post->time >= $today['time'] || $post->time == null)))))
                return \redirect(\route('article.show',['slug' => $post->slug]));
        }
            return \redirect(\url('/'));
    }

    public function showUserArticle($id)
    {
        $post = Safarnameh::find($id);
        if($post == null)
            return \redirect()->back();

        $post->description = $post->text;
        $post->user = User::find($post->userId);
        $tags = SafarnamehTagRelation::where('safarnamehId', $post->id)->pluck('tagId')->toArray();
        $post->tag = Tag::whereIn('id', $tags)->pluck('name')->toArray();
        $post->pic = URL::asset('userPhoto/'.$post->user->id.'/'.$post->pic);
        $post->msg = 0;
        $post->seen = 0;
        $post->mainCategory = 'سفرنامه';
        $post->date = verta($post->created_at)->format('Y/m/%d');
        $post->user->pic = getUserPic($post->user->id);


        $stateCome = null;
        $relatedPost = null;
        $stateCome = null;
        $cityCome = null;
        $placeCome = null;
        $similarPost = [];
        $comments = null;
        $postLike = 2;
        $uPic = getUserPic(\auth()->check() ? \auth()->user()->id : 0);
        $category = $this->getAllCategory();

        return view('Article.article', compact(['stateCome', 'cityCome', 'placeCome', 'post', 'category', 'similarPost', 'postLike', 'uPic', 'comments', 'localStorageData']));
    }

    public function showArticle($slug, Request $request)
    {
        $post = Post::where('slug', $slug)->first();
        if($post != null){
            $today = getToday()["date"];
            $nowTime = getToday()["time"];

            $value = 'article:'.$post->slug;
            if(!(\Cookie::has($value) == $value)) {
                $post->seen = $post->seen + 1;
                $post->save();
                \Cookie::queue(\Cookie::make($value, $value, 5));
            }

            $post->pic = URL::asset('_images/posts/'.$post->id.'/'.$post->pic);
            $mainCategory = PostCategoryRelation::where('postId', $post->id)->where('isMain', 1)->first();
            $mainCategory = PostCategory::find($mainCategory->categoryId);
            $post->mainCategory = $mainCategory->name;
            $post->user = User::find($post->creator);
            if($post->date == null)
                $post->date = \verta($post->created_at)->format('Y/m/%d');
            $post->date = convertJalaliToText($post->date);

            $uId = 0;
            if(\auth()->check()) {
                $uId = \auth()->user()->id;
                $postLike = PostLikes::where('postId', $post->id)->where('userId', \auth()->user()->id)->first();
                if($postLike != null)
                    $postLike =  $postLike->like;
                else
                    $postLike = -1;

                $uPic = getUserPic($uId);
            }
            else {
                $postLike = -1;
                $uPic = getUserPic(0);
            }

            $post->category = PostCategoryRelation::where('postId', $post->id)->get();
            $similarPostId = PostCategoryRelation::where('categoryId', $mainCategory->id)->where('isMain', 1)->pluck('postId')->toArray();

            $similarPost = Post::join('users', 'users.id', 'post.creator')
                ->whereRaw('(post.date < ' . $today . ' OR (post.date = ' . $today . ' AND post.time <= ' . $nowTime . ' ))')
                ->whereRaw('post.release <> "draft"')
                ->whereIn('post.id', $similarPostId)
                ->where('post.id', '!=', $post->id)
                ->select('username', 'post.id', 'post.title', 'post.meta', 'post.slug', 'post.seen', 'post.date', 'post.created_at', 'post.pic', 'post.keyword')
                ->orderBy('date', 'DESC')
                ->take(2)->get();

            foreach ($similarPost as $item){
                $item->msgs = PostComment::wherePostId($item->id)->whereStatus(true)->count();
                $item->pic = \URL::asset('_images/posts/' . $item->id . '/' . $item->pic);
                if ($item->date == null)
                    $item->date = \verta($item->created_at)->format('Ym%d');
                $item->date = convertJalaliToText($item->date);
                $mainCategory = PostCategoryRelation::where('postId', $item->id)->where('isMain', 1)->first();
                $item->category = PostCategory::find($mainCategory->categoryId)->name;
                $item->url = route('article.show', ['slug' => $item->slug]);
            }

            $post->like = PostLikes::where('postId', $post->id)->where('like', 1)->count();
            $post->disLike = PostLikes::where('postId', $post->id)->where('like', 0)->count();
            $post->msg = PostComment::where('postId', $post->id)->where('status', 1)->count();

            $comments = PostComment::where('postId', $post->id)->whereRaw('status = 1 OR ( status = 0 AND userId = ' . $uId . ')')->where('ansTo', 0)->orderBy('created_at', 'DESC')->get();
            $comments = $this->getComments($comments);

            $category = $this->getAllCategory();

            $lastPage = session('inPage');
            $res = $this->getRelatedPosts($lastPage, $today, $nowTime);
            $relatedPost = $res[0];
            $stateCome = $res[1];
            $cityCome = $res[2];
            $placeCome = $res[3];

            $creator = User::select(['id', 'first_name', 'last_name', 'username', 'picture', 'introduction'])->find($post->creator);
            if($creator != null)
                $creator->pic = getUserPic($creator->id);
            $post->user = $creator;

            $tags = DB::select('SELECT pt.tag FROM postTags AS pt, postTagsRelations AS ptr WHERE ptr.postId = ' . $post->id . ' AND pt.id = ptr.tagId GROUP BY pt.tag');
            $post->tag = $tags;

            $mainWebSiteUrl = \url('/');
            $mainWebSiteUrl .= '/' . $request->path();
            $localStorageData = ['kind' => 'article', 'name' => $post->title, 'city' => '', 'state' => '', 'mainPic' => $post->pic, 'redirect' => $mainWebSiteUrl];

            return view('Article.article', compact(['stateCome', 'cityCome', 'placeCome', 'post', 'category', 'similarPost', 'postLike', 'uPic', 'comments', 'localStorageData']));
        }
        return \redirect(\url('/'));
    }

    public function articleList($type = '',$search = '')
    {
        $today = getToday()['date'];
        $nowTime = getToday()['time'];

        if($search != ''){
            $post = array();

            if($type == 'content' || $type == 'category') {
                if ($type == 'content') {
                    $tags = PostTag::where('tag', 'LIKE', '%' . $search . '%')->pluck('id')->toArray();
                    $tagRelId = PostTagsRelation::whereIn('tagId', $tags)->groupBy('postId')->pluck('postId')->toArray();

                    $post = Post::whereRaw('(post.date < ' . $today . ' OR (post.date = ' . $today . ' AND  (post.time <= ' . $nowTime . ' OR post.time IS NULL)))')
                        ->whereRaw('(post.title LIKE "%' . $search . '%" OR post.slug LIKE "%' . $search . '%" OR post.keyword LIKE "%' . $search . '%")')
                        ->orWhereIn('post.id', $tagRelId)
                        ->whereRaw('post.release <> "draft"')->pluck('id')->toArray();
                }
                $categ = PostCategory::where('name', 'LIKE', $search)->pluck('id')->toArray();
                $postCatId = PostCategoryRelation::whereIn('categoryId', $categ)->pluck('postId')->toArray();

                $post = Post::join('users', 'users.id', 'post.creator')
                    ->whereIn('post.id', $postCatId)
                    ->orWhereIn('post.id', $post)
                    ->whereRaw('(post.date < ' . $today . ' OR (post.date = ' . $today . ' AND  (post.time <= ' . $nowTime . ' OR post.time IS NULL)))')
                    ->whereRaw('post.release <> "draft"')
                    ->count();
            }
            else{
                if($type == 'place'){
                    $s = explode('_', $search);
                    $kindPlaceId = $s[0];
                    $placeId = $s[1];
                    $postId = PostPlaceRelation::where('kindPlaceId', $kindPlaceId)->where('placeId', $placeId)->pluck('postId')->toArray();
                }
                else if($type == 'state') {
                    $place = State::whereName($search)->first();
                    $col = 'stateId';
                    $postId = PostCityRelation::where($col, $place->id)->pluck('postId')->toArray();
                    $search = $place->id;
                }
                else{
                    $place = Cities::whereName($search)->first();
                    $col = 'cityId';
                    $postId = PostCityRelation::where($col, $place->id)->pluck('postId')->toArray();
                    $search = $place->id;
                }

                $post = Post::join('users', 'users.id', 'post.creator')
                    ->whereIn('post.id', $postId)
                    ->whereRaw('post.release <> "draft"')
                    ->whereRaw('(post.date < ' . $today . ' OR (post.date = ' . $today . ' AND  (post.time <= ' . $nowTime . ' OR post.time IS NULL)))')
                    ->count();
            }

            $lastPage = session('inPage');
            $res = $this->getRelatedPosts($lastPage, $today, $nowTime);
            $relatedPost = $res[0];
            $stateCome = $res[1];
            $cityCome = $res[2];
            $placeCome = $res[3];

            $category = $this->getAllCategory();
            $pageLimit = ceil($post / 5);
            return \view('Article.searchArticle', compact(['stateCome', 'cityCome', 'placeCome', 'category', 'pageLimit', 'type', 'search']));
        }

        return \redirect(\route('mainArticle'));
    }

    public function paginationInArticleList(Request $request){

        if(isset($request->type) && isset($request->search) && isset($request->take) && isset($request->page) && $request->search != ''){
            $type = $request->type;
            $search = $request->search;
            $take = $request->take;
            $page = $request->page;

            $today = getToday()['date'];
            $nowTime = getToday()['time'];
            $post = array();

            if($search != ''){

                if($type == 'content' || $type == 'category'){
                    if($type == 'content'){
                        $tags = PostTag::where('tag', 'LIKE', '%'. $search .'%')->pluck('id')->toArray();
                        $tagRelId = PostTagsRelation::whereIn('tagId', $tags)->groupBy('postId')->pluck('postId')->toArray();

                        $post = Post::whereRaw('(post.title LIKE "%' . $search . '%" OR post.slug LIKE "%' . $search . '%" OR post.keyword LIKE "%' . $search . '%")')
                            ->orWhereIn('post.id', $tagRelId)
                            ->whereRaw('post.release <> "draft"')
                            ->pluck('id')->toArray();
                    }
                    $categ = PostCategory::where('name', 'LIKE', '%'.$search.'%')->pluck('id')->toArray();
                    $postCatId = PostCategoryRelation::whereIn('categoryId', $categ)->pluck('postId')->toArray();

                    $post = Post::join('users', 'users.id', 'post.creator')
                        ->whereIn('post.id', $postCatId)
                        ->orWhereIn('post.id', $post)
                        ->whereRaw('(post.date < ' . $today . ' OR (post.date = ' . $today . ' AND  (post.time <= ' . $nowTime . ' OR post.time IS NULL) ))')
                        ->whereRaw('post.release <> "draft"')
                        ->select('username', 'post.id', 'title', 'meta', 'slug', 'seen', 'date', 'post.created_at', 'pic', 'keyword')
                        ->orderBy('date', 'DESC')
                        ->skip(($page-1) * $take)->take($take)->get();
                }
                else{
                    if($type == 'place'){
                        $s = explode('_', $search);
                        $kindPlaceId = $s[0];
                        $placeId = $s[1];
                        $postId = PostPlaceRelation::where('kindPlaceId', $kindPlaceId)->where('placeId', $placeId)->pluck('postId')->toArray();
                    }
                    else if($type == 'city'){
                        $place = Cities::find($search);
                        $col = 'cityId';
                        $postId = PostCityRelation::where($col, $place->id)->pluck('postId')->toArray();
                    }
                    else{
                        $place = State::find($search);
                        $col = 'stateId';
                        $postId = PostCityRelation::where($col, $place->id)->pluck('postId')->toArray();
                    }

                    $post = array();
                    if(count($postId) != 0) {
                        $post = Post::join('users', 'users.id', 'post.creator')
                            ->whereIn('post.id', $postId)
                            ->whereRaw('(post.date < ' . $today . ' OR (post.date = ' . $today . ' AND (post.time <= ' . $nowTime . ' OR post.time IS NULL) ))')
                            ->whereRaw('post.release <> "draft"')
                            ->select('username', 'post.id', 'title', 'meta', 'slug', 'seen', 'date', 'post.created_at', 'pic', 'keyword')
                            ->orderBy('date', 'DESC')
                            ->skip(($page - 1) * $take)->take($take)->get();
                    }
                }

                foreach ($post as $item){
                    $item->pic = \URL::asset('_images/posts/' . $item->id . '/' . $item->pic);
                    if($item->date == null)
                        $item->date = \verta($item->created_at)->format('Ym%d');
                    $item->date = convertJalaliToText($item->date);
                    $item->msgs = PostComment::wherePostId($item->id)->whereStatus(true)->count();
                    $mainCategory = PostCategoryRelation::where('postId', $item->id)->where('isMain', 1)->first();
                    $item->category = PostCategory::find($mainCategory->categoryId)->name;
                    $item->url = route('article.show', ['slug' => $item->slug]);
                }

                echo json_encode($post);
            }
            else
                echo 'nok2';
        }
        else
            echo 'nok1';

        return;
    }

    public function LikeArticle(Request $request)
    {
        if(!\auth()->check()){
            echo 'auth';
            return;
        }

        if(isset($request->id) && isset($request->like)){
            $id = $request->id;
            $like = $request->like;
            $post = Post::find($id);
            if($post != null){
                $postLike = PostLikes::where('userId', \auth()->user()->id)->where('postId', $id)->first();
                if($postLike == null)
                    $postLike = new PostLikes();

                $postLike->postId = $id;
                $postLike->userId = \auth()->user()->id;
                $postLike->like = $like;
                $postLike->save();

                echo 'ok';
            }
            else
                echo 'nok2';
        }
        else
            echo 'nok1';

        return;
    }

    public function StoreArticleComment(Request $request)
    {
        if(\auth()->check()){
            if(isset($request->id) && isset($request->txt)){
                $post = Post::find($request->id);
                if($post != null){
                    $ansTo = 0;
                    if($request->ansTo != 0){
                        $ans = PostComment::find($request->ansTo);
                        if($ans != null) {
                            $ansTo = $ans->id;

                            $ans->haveAns = 1;
                            $ans->save();
                        }
                    }

                    $comment = new PostComment();
                    $comment->postId = $post->id;
                    $comment->msg = $request->txt;
                    $comment->userId = \auth()->user()->id;
                    $comment->ansTo = $ansTo;
                    $comment->status = 0;
                    $comment->save();

                    echo 'ok';
                }
                else
                    echo 'nok2';
            }
            else
                echo 'nok1';
        }
        else
            echo 'authError';

        return;
    }

    public function likeArticleComment(Request $request)
    {
        if(\auth()->check()){
            $comment = PostComment::find($request->id);
            if($comment != null){
                $commentLike = PostCommentLike::where('commentId', $request->id)->where('userId', \auth()->user()->id)->first();
                if($commentLike == null)
                    $commentLike = new PostCommentLike();

                $commentLike->commentId = $request->id;
                $commentLike->userId = \auth()->user()->id;
                $commentLike->like = $request->like;
                $commentLike->save();

                $likeCount = \DB::select('SELECT SUM(CASE WHEN `like` = 1 THEN 1 ELSE 0 END) as likeCount, SUM(CASE WHEN `like` = 0 THEN 1 ELSE 0 END) as disLikeCount FROM postCommentLikes WHERE commentId = ' . $request->id);
                echo json_encode(['ok', $likeCount]);
            }
            else
                echo json_encode(['nok1']);
        }
        else
            echo json_encode(['authError']);

        return;
    }

    private function getAllCategory(){

        $today = getToday()['date'];
        $nowTime = getToday()['time'];

        $category = PostCategory::where('parent', 0)->get();
        foreach ($category as $item) {
            $catRel = PostCategoryRelation::where('categoryId', $item->id)->pluck('postId')->toArray();
            $item->postCount = Post::whereIn('id', $catRel)
                ->whereRaw('(date < ' . $today . ' OR (date = ' . $today . ' AND time <= ' . $nowTime . ' ) OR time IS NULL)')
                ->whereRaw('post.release <> "draft"')->count();
            $item->subCategory = PostCategory::where('parent', $item->id)->get();

            foreach ($item->subCategory as $item2) {
                $catRel = PostCategoryRelation::where('categoryId', $item2->id)->pluck('postId')->toArray();
                $item2->postCount = Post::whereIn('id', $catRel)
                    ->whereRaw('(post.date < ' . $today . ' OR (post.date = ' . $today . ' AND post.time <= ' . $nowTime . ' ))')
                    ->whereRaw('post.release <> "draft"')->count();
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


        return $category;
    }

    private function getComments($comments){

        foreach ($comments as $item) {
            $us = User::find($item->userId);
            if($us != null){
                if($item->haveAns ==  1) {
                    $ans = PostComment::where('ansTo', $item->id)->where('status', 1)->orderBy('created_at', 'DESC')->get();
                    $item->ans = $this->getComments($ans);
                }
                else
                    $item->ans = null;
                $likeCount = \DB::select('SELECT SUM(CASE WHEN `like` = 1 THEN 1 ELSE 0 END) as likeCount, SUM(CASE WHEN `like` = 0 THEN 1 ELSE 0 END) as disLikeCount FROM postCommentLikes WHERE commentId = ' . $item->id);
                $item->likeCount = $likeCount[0]->likeCount;
                $item->disLikeCount = $likeCount[0]->disLikeCount;

                if($item->likeCount == null)
                    $item->likeCount = 0;
                if($item->disLikeCount == null)
                    $item->disLikeCount = 0;

                $item->username = $us->username;
                if($us->uploadPhoto == 0){
                    $deffPic = DefaultPic::find($us->picture);
                    if($deffPic != null)
                        $item->userPic = URL::asset('defaultPic/' . $deffPic->name);
                    else
                        $item->userPic = URL::asset('_images/nopic/blank.jpg');
                }
                else
                    $item->userPic = URL::asset('userProfile/' . $us->picture);

                $item->userLike = -1;
                if(\auth()->check()){
                    $userLike = PostCommentLike::where('commentId', $item->id)->where('userId', \auth()->user()->id)->first();
                    if($userLike != null)
                        $item->userLike = $userLike->like;
                }

            }
        }
        return $comments;
    }

    private function getRelatedPosts($lastPage, $today, $nowTime){

        $relatedPost = array();
        $postsId = array();
        $place = null;
        $city = null;
        $state = null;
        $isPlace = false;

        if($lastPage !=  null && $lastPage != '') {
            $lastPage = explode('_', $lastPage);

            if ($lastPage[0] == 'place') {
                switch ($lastPage[1]){
                    case 1:
                        $place = Amaken::find($lastPage[2]);
                        break;
                    case 3:
                        $place = Restaurant::find($lastPage[2]);
                        break;
                    case 4:
                        $place = Hotel::find($lastPage[2]);
                        break;
                    case 6:
                        $place = Majara::find($lastPage[2]);
                        break;
                    case 10:
                        $place = SogatSanaie::find($lastPage[2]);
                        break;
                    case 11:
                        $place = MahaliFood::find($lastPage[2]);
                        break;
                }

                if($place == null)
                    return [$relatedPost, $state, $city, $place];
                else{
                    $postsId = PostPlaceRelation::where('kindPlaceId', $lastPage[1])
                        ->where('placeId', $place->id)
                        ->pluck('postId')
                        ->toArray();
                    $place->kindPlaceId = $lastPage[1];
                    $city = Cities::find($place->cityId);
                    $state = State::find($city->stateId);
                }
                $isPlace = true;
            }
            else if ($lastPage[0] == 'city' || $lastPage[0] == 'state') {
                if($lastPage[0] == 'city'){
                    $p = Cities::find($lastPage[1]);
                    $city = $p;
                    $state = State::find($city->stateId);
                    $col = 'cityId';
                }
                else{
                    $p = State::find($lastPage[1]);
                    $state = $p;
                    $col = 'stateId';
                }

                if($p == null)
                    return [$relatedPost, $state, $city, $place];
                else{
                    $postsId = PostCityRelation::where($col, $p->id)
                        ->pluck('postId')
                        ->toArray();
                }
            }
        }

        if(count($postsId) != 0){
            $relatedPost = Post::join('users', 'users.id', 'post.creator')
                ->whereRaw('(post.date <= ' . $today . ' OR (post.date = ' . $today . ' AND (post.time < ' . $nowTime . ' || post.time IS NULL)))')
                ->whereRaw('post.release <> "draft"')
                ->whereIn('post.id', $postsId)
                ->select('username', 'post.id', 'post.title', 'post.meta', 'post.slug', 'post.seen', 'post.date', 'post.created_at', 'post.pic', 'post.keyword')
                ->orderBy('post.date', 'DESC')->take(5)->get();

            foreach ($relatedPost as $item) {
                $item->msgs = PostComment::wherePostId($item->id)->whereStatus(true)->count();
                $item->pic = \URL::asset('_images/posts/' . $item->id . '/' . $item->pic);
                if ($item->date == null)
                    $item->date = \verta($item->created_at)->format('Ym%d');
                $item->date = convertJalaliToText($item->date);
                $mainCategory = PostCategoryRelation::where('postId', $item->id)->where('isMain', 1)->first();
                $item->category = PostCategory::find($mainCategory->categoryId)->name;
                $item->url = route('article.show', ['slug' => $item->slug]);
            }
        }

        return [$relatedPost, $state, $city, $place];
    }


    public function sendPostComment() {

        if(isset($_POST["postId"]) && isset($_POST["comment"])) {

            try {
                $post = new PostComment();
                $post->postId = makeValidInput($_POST["postId"]);
                $post->userId = Auth::user()->id;
                $post->status = false;
                $post->msg = makeValidInput($_POST["comment"]);
                $post->save();
                echo "ok";
            }
            catch (\Exception $x) {}
        }

    }

    public function getPostComments() {

        if(isset($_POST["postId"]) && isset($_POST["page"])) {

            $page = makeValidInput($_POST["page"]);
            $postId = makeValidInput($_POST["postId"]);
            $page = ($page - 1) * 7;

            $posts = DB::select('select pc.msg, u.username, pc.created_at from users u, post p, postComment pc WHERE u.id = pc.userId and p.id = pc.postId and pc.status = true and p.id = ' . $postId. ' ORDER by created_at DESC limit ' . $page . ', 7');
            foreach ($posts as $post) {
                $post->created_at = convertDate($post->created_at);
            }

            echo json_encode(['posts' => $posts,
                'postCounts' => DB::select('select count(*) as countNum from post p, postComment pc WHERE p.id = pc.postId and pc.status = true and p.id = ' . $postId)[0]->countNum
            ]);
        }

    }

    public function likePost() {

        if(isset($_POST["postId"]) && isset($_POST["status"])) {

            $postId = makeValidInput($_POST["postId"]);
            $status = (makeValidInput($_POST["status"]) == "like") ? false : true;

            try {
                $tmp = new PostLikes();
                $tmp->postId = $postId;
                $tmp->dislike = $status;
                $tmp->save();

                $likes = PostLikes::wherePostId($postId)->whereDislike(false)->count();
                $dislikes = PostLikes::wherePostId($postId)->whereDislike(true)->count();

                if($likes + $dislikes > 0)
                    $point = round($likes * 10 / ($likes + $dislikes), 1);
                else
                    $point = 0;

                echo json_encode(["status" => "ok", "point" => $point, 'likes' => $likes, 'dislikes' => $dislikes]);
                return;
            }
            catch (\Exception $x) {
                echo $x->getMessage();
            }
        }

    }
}