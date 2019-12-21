<?php

namespace App\Http\Controllers;

use App\models\AboutMe;
use App\models\DefaultPic;
use App\models\Post;
use App\models\PostComment;
use App\models\PostLikes;
use App\models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;

class PostController extends Controller {

    public function mainArticle($page = 1) {

        $today = getToday()["date"];

        $posts = \DB::table('post')->join('favoritePost', 'postId', 'post.id')->where('date', '<=', $today)->select('creator', 'post.id', 'post.categoryColor', 'post.backColor', 'post.color', 'post.title', 'post.seen', 'post.created_at', 'post.pic', 'post.alt', 'post.category')->take(5)->get();

        foreach ($posts as $post) {
            $post->pic = \URL::asset('posts/' . $post->pic);
            $post->date = convertDate($post->created_at);
            $post->category = getPostTranslated($post->category);
            $post->msgs = PostComment::wherePostId($post->id)->whereStatus(true)->count();
            $post->username = User::whereId($post->creator)->username;
        }

        $bannerPosts = DB::table('post')->join('bannerPosts', 'postId', 'post.id')->where('date', '<=', $today)->select('creator', 'post.id', 'post.categoryColor', 'post.backColor', 'post.color', 'post.title', 'post.seen', 'post.created_at', 'post.pic', 'post.alt', 'post.category')->take(5)->get();

        foreach ($bannerPosts as $post) {
            $post->pic = URL::asset('posts/' . $post->pic);
            $post->date = convertDate($post->created_at);
            $post->category = getPostTranslated($post->category);
            $post->msgs = PostComment::wherePostId($post->id)->whereStatus(true)->count();
            $post->username = User::whereId($post->creator)->username;
        }

        $recentlyPosts = Post::join('users', 'users.id', 'post.creator')->where('date', '<=', $today)->select('username', 'post.id', 'categoryColor', 'backColor', 'color', 'title', 'seen', 'post.created_at', 'pic', 'alt', 'category')->orderBy('created_at', 'DESC')->take(5)->get();

        foreach ($recentlyPosts as $post) {
            $post->pic = URL::asset('posts/' . $post->pic);
            $post->date = convertDate($post->created_at);
            $post->category = getPostTranslated($post->category);
            $post->msgs = PostComment::wherePostId($post->id)->whereStatus(true)->count();
        }

        $mostSeenPosts = Post::join('users', 'users.id', 'post.creator')->where('date', '<=', $today)->select('username', 'post.id', 'categoryColor', 'backColor', 'color', 'title', 'seen', 'post.created_at', 'pic', 'alt', 'category')->orderBy('seen', 'DESC')->take(5)->get();

        foreach ($mostSeenPosts as $post) {
            $post->pic = URL::asset('posts/' . $post->pic);
            $post->date = convertDate($post->created_at);
            $post->category = getPostTranslated($post->category);
            $post->msgs = PostComment::wherePostId($post->id)->whereStatus(true)->count();
        }

        $skip = ($page - 1) * 5;
        $allPosts = Post::join('users', 'users.id', 'post.creator')->where('date', '<=', $today)->select('username', 'post.id', 'categoryColor', 'backColor', 'color', 'title', 'seen', 'description', 'post.created_at', 'pic', 'alt', 'category')->orderBy('created_at', 'DESC')->skip($skip)->take(5)->get();

        foreach ($allPosts as $post) {
            $post->pic = URL::asset('posts/' . $post->pic);
            $post->date = convertDate($post->created_at);
            $post->category = getPostTranslated($post->category);
            $post->msgs = PostComment::wherePostId($post->id)->whereStatus(true)->count();
        }

        return view('mainArticle', ['favoritePosts' => $posts, 'bannerPosts' => $bannerPosts, 'recentlyPosts' => $recentlyPosts,
            'mostSeenPosts' => $mostSeenPosts, 'allPosts' => $allPosts, 'page' => $page, 'pageLimit' => ceil(Post::where('date', '<=', $today)->count() / 5)]);
    }
    
    public function gardeshnameInner($postId) {

        include_once __DIR__ . '/Common.php';

        $post = Post::whereId($postId);


        if($post == null)
            return Redirect::route("mainArticle");

        $tags = [];
        $i = 0;
        if($post->tag1 != null)
            $tags[$i++] = $post->tag1;

        if($post->tag2 != null)
            $tags[$i++] = $post->tag2;

        if($post->tag3 != null)
            $tags[$i++] = $post->tag3;

        if($post->tag4 != null)
            $tags[$i++] = $post->tag4;

        if($post->tag5 != null)
            $tags[$i++] = $post->tag5;

        if($post->tag6 != null)
            $tags[$i++] = $post->tag6;

        if($post->tag7 != null)
            $tags[$i++] = $post->tag7;

        if($post->tag8 != null)
            $tags[$i++] = $post->tag8;

        if($post->tag9 != null)
            $tags[$i++] = $post->tag9;

        if($post->tag10 != null)
            $tags[$i++] = $post->tag10;

        if($post->tag11 != null)
            $tags[$i++] = $post->tag11;

        if($post->tag12 != null)
            $tags[$i++] = $post->tag12;

        if($post->tag13 != null)
            $tags[$i++] = $post->tag13;

        if($post->tag14 != null)
            $tags[$i++] = $post->tag14;

        if($post->tag15 != null)
            $tags[$i] = $post->tag15;

        $post->seen = $post->seen + 1;
        $post->save();

        $post->date = convertDate($post->created_at);
        $post->category = getPostTranslated($post->category);
        $post->comments = PostComment::wherePostId($post->id)->whereStatus(true)->count();

        $aboutMe = AboutMe::whereUId($post->creator)->first();
        $creatorPhoto = null;

        if($aboutMe != null) {
            $aboutMe = $aboutMe->introduction;
            $user = User::whereId($post->creator);
            if($user->uploadPhoto) {
                $creatorPhoto = URL::asset("userProfile/" . $user->picture);
            }
            else {

                $defaultPic = DefaultPic::whereId($user->picture);

                if($defaultPic == null)
                    $defaultPic = DefaultPic::first();

                $creatorPhoto = URL::asset("defaultPic/" . $defaultPic->name);
            }
        }

        $post->likes = PostLikes::wherePostId($post->id)->whereDislike(false)->count();
        $post->dislikes = PostLikes::wherePostId($post->id)->whereDislike(true)->count();

        if($post->likes + $post->dislikes > 0)
            $post->point = round($post->likes * 10 / ($post->likes + $post->dislikes), 1);
        else
            $post->point = 0;

        return view('gardeshnameInner', ['post' => $post, 'tags' => $tags, 'author' => $aboutMe,
            'creatorPhoto' => $creatorPhoto]);
    }

    public function specificPost($id) {

        $post = \App\models\Post::whereId($id);

        if($post == null)
            return \Redirect::route('home');

        return view('specificPost', ['post' => $post]);
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