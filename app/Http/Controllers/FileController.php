<?php

namespace App\Http\Controllers;

use App\Models\CategoryFile;
use App\Models\File;
use App\Models\FileType;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function index(){
        $files = File::orderBy('id', 'DESC')->simplePaginate(10);

        return view('admin.files.index', compact('files'));
    }

    public function create(){
        $categoryFiles = CategoryFile::all();
        $fileTypes = FileType::all();
        $states = State::all();

        return view('admin.files.create', compact('categoryFiles', 'fileTypes', 'states'));
    }

    public function store(Request $request){
        
        $files = $request->file('routeFiles');

        if ($files != null){
            foreach ($files as $file){
                $route = $file->storeAs('public/img', $file->getClientOriginalName());
                $url = Storage::url($route);
                File::create([
                    'name' => $file->getClientOriginalName(),
                    'route' => $url,
                    'category_file_id' => $request->categoryFile,
                    'file_type_id' => $request->fileType,
                    'state_id' => $request->state
                ]);
            }

        } else if ($request->routeUrl != null){
            $fileName = $request->routeUrl;

            File::create([
                'name' => $fileName,
                'route' => $request->routeUrl,
                'category_file_id' => $request->categoryFile,
                'file_type_id' => $request->fileType,
                'state_id' => $request->state
            ]); 
        }
        return redirect()->route('admin.files.index');
    }

    public function edit(File $file){
        $categoryFiles = CategoryFile::all();
        $fileTypes = FileType::all();
        $states = State::all();

        return view('admin.files.edit', compact('file', 'categoryFiles', 'fileTypes', 'states'));
    }

    public function update(Request $request, File $file){

        $file->category_file_id = $request->categoryFile;
        $file->state_id = $request->state;

        $file->save();

        return redirect()->route('admin.files.index');
    }

    public function destroy(File $file){
        $file->delete();

        return redirect()->route('admin.files.index');
    }
}