<?php

namespace App\Http\Controllers;

use App\Models\CategoryFile;
use App\Models\data_users;
use App\Models\File;
use App\Models\SocialLink;

class CategoryFileController extends Controller
{
    public function index() {
        $artists = data_users::join('users', 'data_users.user_id', '=', 'users.id')
                                ->join('user_types', 'users.user_type_id', '=', 'user_types.id')
                                ->select('data_users.*')
                                ->where('user_types.description', 'Artista')
                                ->get();
        $social = SocialLink::all();
        $categoryFiles = CategoryFile::all();
        $files = [];

        foreach($categoryFiles as $category){
            $files[] = File::select('category_file_id','route')->where('category_file_id', $category->id)->orderBy('id', 'DESC')->first();
        }
        return view('galleries.index', compact('categoryFiles', 'files', 'artists', 'social'));   
    }

    public function show(CategoryFile $category){
        $files = File::where('category_file_id', $category->id)->orderBy('id', 'DESC')->get();

        return view('galleries.show', compact('category', 'files'));
    }
}
