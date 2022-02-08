<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\Gallery;
use DB;

class CategoryController extends Controller
{
    public function show($parentId, $childId = null)
    {
        $cats = Category::all();
        $categoriesHeader = [];
        $this->getChild($categoriesHeader, $cats);

        $categoriesFooter = Category::with('categories')->where('parent_id', 0)->get()->toArray();

        $categories = $this->getSubCategories($parentId);

        $cats1 = Category::all();
        $childCategories = [];
        foreach ($cats1 as $key => $cat1) {
            $childCategories[$cat1->id][] = $cat1->id;
            $this->getChildCategories($childCategories[$cat1->id], $cats1, [$cat1->id]);
        }

        if ($childId) {
            if ($childId == 12) {
                return view('client.categories.show', compact('categoriesHeader', 'categoriesFooter', 'categories', 'parentId', 'childId'));
            } elseif ($childId == 13) {
                $galleries = Gallery::select(
                    '*',
                    DB::raw('DATE_FORMAT(created_at, "%M %e, %Y") as created_date')
                )->orderBy('created_at', 'DESC')->paginate(6);

                return view('client.categories.show', compact('categoriesHeader', 'categoriesFooter', 'categories', 'galleries', 'parentId', 'childId'));
            } else {
                if ($childId == 10) {
                    $posts = Post::where('category_id', 10)->orderBy('updated_at', 'desc')->paginate(3);
                    if ($posts->count() == 1) {
                        $post = $posts->first();
                        
                        return redirect(route('posts.show', $post->id) . '?category_id=' . $parentId);
                    }
                } else {
                    $posts = Post::whereIn('category_id', $childCategories[$childId])->orderBy('updated_at', 'desc')->paginate(3);
                }
            }
        } else {
            $posts = Post::whereIn('category_id', $childCategories[$parentId])->orderBy('updated_at', 'desc')->paginate(3);
        }

        return view('client.categories.show', compact('categoriesHeader', 'categoriesFooter', 'categories', 'posts', 'parentId', 'childId'));
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
}
