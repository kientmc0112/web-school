<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Image;
use App\Enums\DBConstant;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Exception;

class ImageController extends Controller
{
    public function list(Request $request)
    {
        $path = DBConstant::SYSTEM[$request->type];
        $data = [];
        $images = Image::where('type', $request->type)->pluck('filename')->toArray();
        $dir = public_path(config('filesystems.file_upload_path.system_path') . $path);
        $files = scandir($dir);
        foreach ($files as $file) {
            if ($file != '.' && $file != '..' && in_array($file, $images)) {
                $data[] = [
                    'name' => $file,
                    'size' => filesize(config('filesystems.file_upload_path.system_path') . $path . '/' . $file),
                    'path' => asset(config('filesystems.file_upload_path.system_path') . $path . '/' . $file)
                ];
            }
        }

        return response()->json($data);
    }

    public function upload(Request $request)
    {
        try {
            $path = DBConstant::SYSTEM[$request->type];
            $image = $request->file('file');
            $fileInfo = $image->getClientOriginalName();
            $fileOriginalName = pathinfo($fileInfo, PATHINFO_FILENAME);
            $fileExtension = pathinfo($fileInfo, PATHINFO_EXTENSION);
            $fileName = $fileOriginalName . '-' . Carbon::now()->format('Y_m_d_his') . '.' . $fileExtension;
            $image->move(public_path(config('filesystems.file_upload_path.system_path') . $path), $fileName);
            
            Image::insert([
                'filename' => $fileName,
                'type' => $request->type
            ]);

            return response()->json(['success' => $fileName]);
        } catch (Exception $e) {

            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function remove(Request $request)
    {
        try {
            $path = DBConstant::SYSTEM[$request->type];
            $filename = $request->get('filename');
            Image::where('filename', $filename)->delete();
            $path = public_path(config('filesystems.file_upload_path.system_path') . $path) . '/' . $filename;
            if (File::exists($path)) {
                File::delete($path);
            }

            return response()->json(['success' => $filename]);
        } catch (Exception $e) {

            return response()->json(['error' => 'Error!'], 500);
        }
    }

    public function show($id)
    {
        $images = Image::where('type', $id)
            ->orderBy('created_at', 'ASC')
            ->get()
            ->map(function ($image) {
                $image->image_url = config('filesystems.file_upload_path.system_path') . DBConstant::SYSTEM[DBConstant::SLIDER_TYPE] . '/' . $image->filename;
                
                return $image;
            });

        return view('portal.images.show', compact('images'));
    }

    public function update(Request $request, $id)
    {   
        $image = Image::find($id);
        $image->update($request->only('link', 'title', 'content'));

        return redirect()->back();
    }
}
