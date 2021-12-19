<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

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
        $categories = [];
        $this->getChild($categories, $cats);

        return view('client.home', compact('categories'));
    }

    

    public function getChild(&$arr, $categories, $id = null, $parentId = null)
    {
        foreach ($categories as $key => $category) {
            if ($category->parent_id === $parentId) {
                $arr[$key]['id'] = $category->id;
                $arr[$key]['name'] = $category->name;
                $arr[$key]['child'] = [];
                unset($categories[$key]);
                if ($id !== $category->id) {
                    $this->getChild($arr[$key]['child'], $categories, $id, $category->id);
                }
            }
        }
    }
}
