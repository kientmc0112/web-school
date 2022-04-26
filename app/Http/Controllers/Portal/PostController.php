<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\Post\UpdateRequest;
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
        $posts = Post::with(['category', 'user'])->orderBy('updated_at', 'DESC')->get();

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

    public function store(StoreRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->all();
            $data = array_merge($data, ['created_by' => Auth::user()->id]);
            $post = Post::create($data);
            if ($request->hasFile('thumbnail')) {
                $image = $request->file('thumbnail');
                $name = 'post_' . $post->id . '_' . Carbon::now()->format('Y_m_d_his') . '.' . $image->getClientOriginalExtension();
                $path = config('filesystems.file_upload_path.post_path');
                $image->move($path, $name, 'public');
                $post->update(['thumbnail' => $path . $name]);
            }
            DB::commit();

            return redirect()->route('posts.index');
        } catch (Exception $e) {
            DB::rollBack();

            return redirect()->route('posts.index');
        }
    }

    public function edit($id)
    {
        $cats = Category::all();
        $categories = [];
        $this->getChild($categories, $cats);
        $post = Post::find($id);

        return view('portal.posts.edit', compact('post', 'categories'));
    }

    public function update(UpdateRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $post = Post::findOrFail($id);
            $data = $request->all();
            if ($request->hasFile('thumbnail')) {
                if (File::exists($post->thumbnail)) {
                    File::delete($post->thumbnail);
                }
                $image = $request->file('thumbnail');
                $name = 'post_' . $id . '_' . Carbon::now()->format('Y_m_d_his') . '.' . $image->getClientOriginalExtension();
                $path = config('filesystems.file_upload_path.post_path');
                $image->move($path, $name, 'public');
                $data['thumbnail'] = $path . $name;
            }
            $data['updated_by'] = Auth::user()->id;
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
            if (File::exists($post->thumbnail)) {
                File::delete($post->thumbnail);
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
