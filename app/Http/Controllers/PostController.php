<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    // Método para mostrar la vista de inicio con todos los posts
    public function index()
    {
        $posts = Post::all();
        return view('index', compact('posts')); // Asegúrate que la vista se llame 'index.blade.php'
    }

    public function inicio()
    {
        $posts = Post::all();
        return view('posts.inicio', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'phone' => 'required',
            'image' => 'image|nullable',
        ]);

        $post = new Post;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->phone = $request->phone;

        if ($request->hasFile('image')) {
            $imageName = $request->file('image')->store('img/rutasCulturales', 'public');
            $post->image = $imageName;
        }

        $post->save();

        return redirect()->route('posts.inicio')->with('success', 'Post creado con éxito.');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'phone' => 'required',
            'image' => 'image|nullable',
        ]);

        $post->title = $request->title;
        $post->description = $request->description;
        $post->phone = $request->phone;

        if ($request->hasFile('image')) {
            if ($post->image) {
                Storage::delete('public/' . $post->image);
            }
            $imageName = $request->file('image')->store('img/rutasCulturales', 'public');
            $post->image = $imageName;
        }

        $post->save();

        return redirect()->route('posts.inicio')->with('success', 'Post actualizado con éxito.');
    }

    public function destroy(Post $post)
    {
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }
        $post->delete();
        return redirect()->route('posts.inicio')->with('success', 'Post eliminado con éxito.');
    }
}
