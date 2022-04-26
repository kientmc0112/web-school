<?php

namespace App\Http\Controllers\Portal;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Exception;
use App\Http\Controllers\Controller;
use App\Enums\DBConstant;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use DB;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $numberCategory = Category::get()->count();
        $numberPost = Post::get()->count();
        $numberUser = User::get()->count();
        $numberImage = count(File::allFiles(public_path(config('filesystems.file_upload_path.user_path')))) + 
            count(File::allFiles(public_path(config('filesystems.file_upload_path.post_path')))) +
            count(File::allFiles(public_path(config('filesystems.file_upload_path.system_path')))) +
            count(File::allFiles(public_path('/userfiles/images')));

        return view('portal.dashboard', compact('numberCategory', 'numberPost', 'numberUser', 'numberImage'));
    }
}
