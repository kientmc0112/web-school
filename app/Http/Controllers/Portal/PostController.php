<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Http\Requests\PostRequest;
use Carbon\Carbon;
use Auth;
use DB;
use Exception;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with(['category', 'user'])->get();

        return view('portal.posts.index', compact('posts'));
    }

    public function create()
    {
        $cats = Category::all();
        $categories = [];
        $this->getChild($categories, $cats);

        return view('portal.posts.create', compact('categories'));
    }

    public function getChild(&$arr, $categories, $id = null, $parentId = 0, $char = '')
    {
        foreach ($categories as $key => $category) {
            if ($category->parent_id === $parentId) {
                $arr[$key] = [
                    'id' => $category->id,
                    'name' => $char . $category->name
                ];
                unset($categories[$key]);
                if ($id !== $category->id) {
                    $this->getChild($arr, $categories, $id, $category->id, $char . '&nbsp;&nbsp;&nbsp;');
                }
            }
        }
    }

    public function store(PostRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->only([
                'title', 'title_en', 'thumbnail_url', 'category_id', 'content', 'content_en'
            ]);
            if ($request->hasFile('thumbnail_url')) {
                $image = $request->file('thumbnail_url');
                $name = Carbon::now()->format('Y_m_d_his') . '.' . $image->getClientOriginalExtension();
                $path = 'images/posts/thumbnails';
                $image->move($path, $name, 'public');
            } else {
                return redirect()->back()->withErrors(['msg' => trans('messages.post.validate.thumbnail_image')]);
            }
            $data = array_merge($data, [
                'thumbnail_url' => $path . '/' . $name,
                'created_by' => Auth::user()->id
            ]);
            Post::create($data);
            DB::commit();

            return redirect()->route('posts.index');
        } catch (Exception $e) {
            DB::rollBack();

            return redirect()->route('posts.index');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $cats = Category::all();
        $categories = [];
        $this->getChild($categories, $cats);
        $post = Post::find($id);

        return view('portal.posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $post = Post::find($id);
            $data = $request->only([
                'title', 'title_en', 'thumbnail_url', 'category_id', 'content', 'content_en'
            ]);
            if ($request->hasFile('thumbnail_url')) {
                if (File::exists($post->thumbnail_url)) {
                    File::delete($post->thumbnail_url);
                }
                $image = $request->file('thumbnail_url');
                $name = Carbon::now()->format('Y_m_d_his') . '.' . $image->getClientOriginalExtension();
                $path = 'images/posts/thumbnails';
                $image->move($path, $name, 'public');
                $data['thumbnail_url'] = $path . '/' . $name;
            }
            $data['created_by'] = Auth::user()->id;
            $post->update($data);
            DB::commit();

            return redirect()->route('posts.index');
        } catch (Exception $e) {
            DB::rollBack();

            return redirect()->route('posts.index');
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $post = Post::find($id);
            if (File::exists($post->thumbnail_url)) {
                File::delete($post->thumbnail_url);
            }
            $post->delete();
            DB::commit();

            return redirect()->route('posts.index');
        } catch (Exception $e) {
            DB::rollBack();

            return redirect()->route('posts.index');
        }
    }
}
