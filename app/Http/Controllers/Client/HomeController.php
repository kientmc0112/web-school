<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Image;
use App\Models\Post;
use App\Enums\DBConstant;
use Exception;

class HomeController extends Controller
{
    public function changeLanguage($language)
    {
        \Session::put('website_language', $language);

        return redirect()->back();
    }

    public function index()
    {
        $cats = Category::all();
        $categoriesHeader = [];
        $this->getChild($categoriesHeader, $cats);

        $cats1 = Category::all();
        $childCategories = [];
        $this->getChildCategoryIds($childCategories, $cats1);

        $categoriesFooter = Category::with('categories')->where('parent_id', 0)->get()->toArray();

        $admissions = Post::whereIn('category_id', $childCategories[DBConstant::ADMISSIONS])->orderBy('updated_at', 'desc')->paginate(3);
        $admissCate = DBConstant::ADMISSIONS;
        $news = Post::whereIn('category_id', $childCategories[DBConstant::NEWS])->orderBy('updated_at', 'desc')->paginate(3);
        $newCate = DBConstant::NEWS;
        $events = Post::whereIn('category_id', $childCategories[DBConstant::EVENT])->orderBy('updated_at', 'desc')->paginate(4);
        $eventCate = DBConstant::EVENT;

        $sliders = Image::where('gallery_id', DBConstant::SYSTEM_GALLERY_ID)->where('type', DBConstant::SLIDER_TYPE)->orderBy('created_at', 'ASC')->get();
        $topBanners = Image::where('gallery_id', DBConstant::SYSTEM_GALLERY_ID)->where('type', DBConstant::BANNER_TOP_TYPE)->limit(2)->orderBy('created_at', 'ASC')->get();
        $botBanners = Image::where('gallery_id', DBConstant::SYSTEM_GALLERY_ID)->where('type', DBConstant::BANNER_BOT_TYPE)->limit(3)->orderBy('created_at', 'ASC')->get();

        return view('client.home', compact('categoriesHeader', 'categoriesFooter', 'news', 'admissions', 'admissCate', 'newCate', 'events', 'eventCate', 'sliders', 'topBanners', 'botBanners'));
    }
    
    public function getChild(&$arr, $categories, $parentId = 0)
    {
        foreach ($categories as $key => $category) {
            if ($category->parent_id === $parentId) {
                $arr[$key]['id'] = $category->id;
                $arr[$key]['name'] = $category->name;
                $arr[$key]['name_en'] = $category->name_en;
                $arr[$key]['child'] = [];
                unset($categories[$key]);
                $this->getChild($arr[$key]['child'], $categories, $category->id);
            }
        }
    }

    public function getChildCategories(&$arr, $categories, $parentId = [])
    {
        foreach ($categories as $key => $category) {
            if (in_array($category->parent_id, $parentId) || (count($parentId) === 0 && $category->parent_id === 0)) {
                if ($category->parent_id === 0) {
                    $arr[$category->id][] = $category->id;    
                    unset($categories[$key]);
                    $this->getChildCategories($arr[$category->id], $categories, [$category->id]);
                } else {
                    $arr[] = $category->id;
                    $this->getChildCategories($arr, $categories, [$category->id]);
                }
            }
        }
    }

    private function getSubCategories($parent_id, $ignore_id=null)
    {
        $categories = Category::where('parent_id', $parent_id)
            ->where('id', '<>', $ignore_id)
            ->get()
            ->map(function($query) use ($ignore_id) {
                $query->sub = $this->getSubCategories($query->id, $ignore_id);

                return $query;
            });

        return $categories;
    }

    public function getChildCategoryIds(&$arr, $categories, $rootId = null, $parentId = 0)
    {
        foreach ($categories as $key => $category) {
            if (!isset($arr[$category->id]) && is_null($rootId)) {
                $arr[$category->id][] = $category->id;
                $this->getChildCategoryIds($arr, $categories, $category->id, $category->id);
            } else {
                if ($category->parent_id == $parentId) {
                    $arr[$rootId][] = $category->id;
                    $this->getChildCategoryIds($arr, $categories, $rootId, $category->id);
                }
            }
        }
    }

    public function getSubPanel($categoryId)
    {
        $categories = DB::table('categories')->get();
        $category = DB::table('categories')->where('id', $categoryId)->first();

        $arr = $this->text([], $categories, $category->parent_id);
        if (!isset($arr)) $arr = [];
        if (isset($category)) array_push($arr, $category);

        return $arr;
    }

    public function text($arrPanel = [], $categories, $parentId)
    {   
        foreach ($categories as $key => $category) {
            if ($category->id === $parentId) {
                if ($category->parent_id === 0) {
                    array_unshift($arrPanel, $category);
                    return $arrPanel;
                } else {
                    array_unshift($arrPanel, $category);
                    return $this->text($arrPanel, $categories, $category->parent_id);
                }
            }
        }
    }

    public function getUserWithLevel(Request $request)
    {
        $users = DB::table("users")
            ->leftJoin('user_level', 'users.id', '=', 'user_level.user_id')
            ->leftJoin('levels', 'levels.id', '=', 'user_level.level_id')
            ->leftJoin('positions', 'positions.id', '=', 'user_level.position_id')
            ->where('user_level.level_id', $request->level)
            ->select(
                "users.id", 
                "users.name", 
                "users.avatar", 
                "levels.id as level", 
                DB::raw('IFNULL(positions.name, "") as position')
            )->orderBy('display_order', 'asc')
            ->get()
            ->toArray();

        return $users;
    }

    public function previewUser(Request $request)
    {
        if (isset($request->uid)) {
            $user = DB::table('users')
                ->where('users.id', $request->uid)
                ->leftJoin('user_level', 'users.id', '=', 'user_level.user_id')
                ->leftJoin('levels', 'levels.id', '=', 'user_level.level_id')
                ->leftJoin('positions', 'positions.id', '=', 'user_level.position_id')
                ->select(
                    'users.*', 
                    'levels.title as level_title', 
                    'levels.id as level_id', 
                    'positions.name as position_title', 
                    'positions.id as position_id'
                )->get();

            if (!isset($user)) return redirect()->route('home.index');

            $cats = Category::all();
            $categoriesHeader = [];
            $this->getChild($categoriesHeader, $cats);

            $categoriesFooter = Category::with('categories')->where('parent_id', 0)->get()->toArray();
    
            return view('client.users.info', compact('categoriesHeader', 'categoriesFooter', 'user'));
        } else {
            return redirect()->route('home.index');
        }
    }

    public function showGallery($id)
    {
        $cats = Category::all();
        $categoriesHeader = [];
        $this->getChild($categoriesHeader, $cats);

        $categoriesFooter = Category::with('categories')->where('parent_id', 0)->get()->toArray();

        $gallery = Gallery::select(
            '*',
            DB::raw('DATE_FORMAT(created_at, "%M %e, %Y") as created_date')
        )->find($id);
        $images = Image::where('gallery_id', $id)->orderBy('created_at', 'DESC')->get()->map(function ($image) use ($id) {
            $image->img_url = config('filesystems.file_upload_path.gallery_path') . $id . '/' . $image->filename;

            return $image;
        });
        $posts = Post::select(
            '*',
            DB::raw('DATE_FORMAT(created_at, "%M %e, %Y") as created_date')
        )->orderBy('created_at', 'DESC')
        ->skip(0)
        ->take(5)
        ->get();

        return view('client.galleries.show', compact('gallery', 'images', 'posts', 'categoriesHeader', 'categoriesFooter'));
    }
}
