<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{
    public function show(Request $request, $id)
    {
        $cats = Category::all();
        $categoriesHeader = [];
        $this->getChild($categoriesHeader, $cats);
        $categoriesFooter = Category::with('categories')->where('parent_id', 0)->get()->toArray();

        $post = Post::find($id);

        $categoryId = $request->category_id;
        $categories = $this->getSubCategories($categoryId);

        $cats1 = Category::all();
        $childCategories = [];
        foreach ($cats1 as $key => $cat1) {
            $childCategories[$cat1->id][] = $cat1->id;
            $this->getChildCategories($childCategories[$cat1->id], $cats1, [$cat1->id]);
        }
        
        $similarPosts = Post::whereIn('category_id', $childCategories[$categoryId])
            ->orderBy('updated_at', 'desc')
            ->limit(10)
            ->get();
            
        return view('client.posts.show', compact('categoriesHeader', 'categoriesFooter', 'categories', 'post', 'similarPosts', 'categoryId'));
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

    public function handleSearch(Request $request)
    {
        return redirect()->route('posts.search', $request->keyword);
    }

    public function search($keyword = null)
    {
        $cats = Category::all();
        $categoriesHeader = [];
        $this->getChild($categoriesHeader, $cats);
        $categoriesFooter = Category::with('categories')->where('parent_id', 0)->get()->toArray();

        $cats1 = Category::all();
        $parentCategories = [];
        $this->getParentCategory($parentCategories, $cats1);

        $posts = isset($keyword) ? Post::where('title', 'LIKE', "%$keyword%")->orderBy('updated_at', 'desc')->paginate(5) : [];

        return view('client.posts.search', compact('posts', 'categoriesHeader', 'categoriesFooter', 'parentCategories'))->with('keyword', $keyword);
    }

    public function getParentCategory(&$arr, $categories, $categoryId = null, $parentId = null) {
        foreach ($categories as $category) {
            if (is_null($categoryId)) {
                $arr[$category->id] = $category->id;
                $this->getParentCategory($arr, $categories, $category->id, $category->parent_id);
            } else {
                if ($parentId != 0 && $category->id == $parentId) {
                    $arr[$categoryId] = $category->id;
                    $this->getParentCategory($arr, $categories, $categoryId, $category->parent_id);
                }
            }
        }
    }
}
