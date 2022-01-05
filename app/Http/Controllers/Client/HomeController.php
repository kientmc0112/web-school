<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Category;
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
        $this->getChildCategories($childCategories, $cats1);

        $edus = Post::whereIn('category_id', $childCategories[DBConstant::EDUCATION])->orderBy('updated_at', 'desc')->paginate(3);
        $eduCate = DBConstant::EDUCATION;
        $news = Post::whereIn('category_id', $childCategories[DBConstant::NEWS])->orderBy('updated_at', 'desc')->paginate(5);
        $newCate = DBConstant::NEWS;

        return view('client.home', compact('categoriesHeader', 'news', 'edus', 'eduCate', 'newCate'));
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

    public function show(Request $request, $id)
    {
        $cats = Category::all();
        $categoriesHeader = [];
        $this->getChild($categoriesHeader, $cats);

        $categories = $this->getSubCategories($id);

        $cats1 = Category::all();
        $childCategories = [];
        foreach ($cats1 as $key => $cat1) {
            $childCategories[$cat1->id][] = $cat1->id;
            $this->getChildCategories($childCategories[$cat1->id], $cats1, [$cat1->id]);
        }

        if (isset($request->post_id)) {
            $post = Post::find($request->post_id);
            $similarPosts = DB::table('posts')
                ->where('category_id', $childCategories[$id])
                ->orderBy('updated_at', 'desc')
                ->paginate(10);

            return view('client.posts.show', compact('categoriesHeader', 'categories', 'post', 'similarPosts', 'id'));
        }

        if (isset($request->child_id)) {
            $posts = Post::whereIn('category_id', $childCategories[$request->child_id])->orderBy('updated_at', 'desc')->paginate(3);
        } else {
            $posts = Post::whereIn('category_id', $childCategories[$id])->orderBy('updated_at', 'desc')->paginate(3);
        }

        return view('client.posts.show', compact('categoriesHeader', 'categories', 'posts', 'id'));
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

    public function getChildCategoryIds(&$arr, $categories, $parentId = 0)
    {
        foreach ($categories as $key => $category) {
            if ($category->parent_id === $parentId) {
                $arr[$key] = $category->id;
                unset($categories[$key]);
                $this->getChildCategoryIds($arr, $categories, $category->id);
            }
        }
    }

    public function categories(Request $request)
    {
        $cats = Category::all();
        $categoriesHeader = [];
        $this->getChild($categoriesHeader, $cats);

        $parentId = $request->parent_id ?? 0;

        $categories = $this->getSubCategories($parentId);
        $isSingle = false;

        if (isset($request->category_id)) {
            $subPanel = $this->getSubPanel($request->category_id);

            $isSingle = true;
            $cateSelect = DB::table('categories')
                ->where('id', $request->category_id)
                ->first();
                
            if (isset($request->post_id)) {
                $arryPosts = DB::table('posts')
                    ->where('category_id', $request->category_id)
                    ->orderBy('updated_at', 'desc')
                    ->paginate(10)
                    ->toArray();

                $post = DB::table('posts')
                    ->where('id', $request->post_id)
                    ->first();

                return view('client.posts.show1', compact(
                    'isSingle', 
                    'categories', 
                    'cateSelect', 
                    'arryPosts', 
                    'post', 
                    'subPanel', 
                    'categoriesHeader',
                    'parentId'
                ));
            }
            
            $childCategories = [intval($request->category_id)];
            $cates = Category::all();
            $this->getChildCategoryIds($childCategories, $cates, intval($request->category_id));
            $arryPosts = DB::table('posts')
                ->whereIn('category_id', $childCategories)
                ->orderBy('updated_at', 'desc')
                ->paginate(30)
                ->toArray();

            return view('client.posts.show1', compact(
                'isSingle', 
                'categories', 
                'cateSelect', 
                'arryPosts', 
                'subPanel', 
                'categoriesHeader',
                'parentId'
            ));
        }
        $arryPosts = [];

        foreach ($categories as $key => $cate) {
            $postOfCate = DB::table('posts')
                ->where('category_id', $cate->id)
                ->orderBy('updated_at', 'desc')
                ->limit(3)
                ->get()
                ->toArray();
            array_push($arryPosts, $postOfCate);
        }

        return view('client.posts.show1', compact(
            'isSingle', 
            'categories', 
            'arryPosts', 
            'categoriesHeader',
            'parentId'
        ));
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
            ->where("level", $request->level)
            ->leftJoin('positions', 'users.position', '=', 'positions.id')
            ->select("users.id", "users.name", "users.avatar", "users.level", 'positions.name as position')
            ->get()
            ->toArray();

        return $users;
    }

    public function previewUser(Request $request)
    {
        if (isset($request->uid)) {
            $user = DB::table("users")
                ->where('users.id', $request->uid)
                ->leftJoin('levels', 'levels.id', '=', 'users.level')
                ->leftJoin('positions', 'positions.id', '=', 'users.position')
                ->leftJoin('departments', 'departments.id', '=', 'users.department_id')
                ->select(
                    'users.name', 'users.email', 'users.avatar', 'users.facebook_link', 'users.phone', 'users.date_of_birth', 'users.sex', 'users.info', 'users.info_en',
                    'departments.name as department', 
                    'levels.title as level', 'positions.name as position' 
                )
                ->first();
            if (!isset($user)) return redirect()->route('home.index');

            $cats = Category::all();
            $categoriesHeader = [];
            $this->getChild($categoriesHeader, $cats);
    
    
            return view('client.users.info', compact('categoriesHeader', 'user'));
        } else {
            return redirect()->route('home.index');
        }
    }
}
