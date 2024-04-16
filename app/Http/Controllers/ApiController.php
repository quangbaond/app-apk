<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    // upload
    public function upload(Request $request)
    {
        // $request->validate([
        //     'file' => 'file|mimes:mimes:application/vnd.android.package-archive',
        //     'files.*' => 'array|file|mimes:mimes:application/vnd.android.package-archive'
        // ], [
        //     'file.mimes' => 'The file must be a file of type: apk.',
        //     'file.max' => 'The file may not be greater than 10 MB.',
        //     'files.*.mimes' => 'The file must be a file of type: apk.',
        //     'files.*.max' => 'The file may not be greater than 10 MB.',
        //     'files.*.array' => 'The files must be an array.',
        //     'files.*.file' => 'The files must be a file.',
        //     'files.*.mimes' => 'The files must be a file of type: apk.',
        //     'files.*.max' => 'The files may not be greater than 10 MB.'
        // ]);

        $validator = Validator::make($request->all(), [
            'file' => 'file|mimes:application/vnd.android.package-archive',
            'files.*' => 'array|file|mimes:application/vnd.android.package-archive'
        ], [
            'file.mimes' => 'The file must be a file of type: apk.',
            'file.max' => 'The file may not be greater than 10 MB.',
            'files.*.mimes' => 'The file must be a file of type: apk.',
            'files.*.max' => 'The file may not be greater than 10 MB.',
            'files.*.array' => 'The files must be an array.',
            'files.*.file' => 'The files must be a file.',
            'files.*.mimes' => 'The files must be a file of type: apk.',
            'files.*.max' => 'The files may not be greater than 10 MB.'
        ]);
        
        if($request->file) {
            // $fileName = time() . '.' . 
            $fileName = $request->file->getClientOriginalName();
            $request->file->storeAs('public/uploads', $fileName);
            return response()->json(['success' => 'You have successfully uploaded file.', 'file_path' => asset('storage/uploads/' . $fileName)]);
        }

        if($request->files) {
            $files = [];
            foreach($request->files as $file) {
                $fileName = time() . '.' . $file->extension();
                $file->storeAs('public/uploads', $fileName);
                $files[] = asset('storage/uploads/' . $fileName);
            }
            return response()->json(['success' => 'You have successfully uploaded files.', 'file_paths' => $files], 200);
        }

        return response()->json(['success' => 'You have successfully uploaded file.'], 200);
    }


    // get file random
    public function getOneFileRandomApk(Request $request)
    {
        $files = glob('storage/uploads/*.apk');
        if(count($files) == 0) return response()->json(['error' => 'No files found.'], 404);
        $file = $files[array_rand($files, 1)];
        return response()->json(['file_path' => asset($file)]);
    }

    // delete file by url
    public function deleteFileByUrl(Request $request)
    {
        $file = str_replace(asset('storage'), 'storage', $request->file_path);
        if(file_exists($file = public_path($file))) {
            unlink($file);
            return response()->json(['success' => 'You have successfully deleted file.']);
        }
        return response()->json(['error' => 'File not found.']);
    }

    // count files in folder

    public function countFilesInFolder(Request $request)
    {
        $files = glob('storage/uploads/*');
        return response()->json(['count' => count($files)]);
    }
}
