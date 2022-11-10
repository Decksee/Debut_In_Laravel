<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Post;
use App\Rules\Uppercase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use League\CommonMark\Extension\CommonMark\Node\Inline\Code;

class PostController extends Controller
{
    public function index()
    {


        $posts = Post::orderBy('id')->get();

        return view('articles',[
            'posts' => $posts,
        ]);

    }

    public function show($id)
    {

       $post = Post::findorfail($id);
       //$post=Post::where('title', 'Id non ea sunt.')->firstofail();

        return view('article', [
            'post' => $post
        ]);
    }

    public function contact()
    {
        return view('contact');
    }

    public function create()
    {
        return view('form');
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'title' => ['required', 'min:5', 'unique:posts', new Uppercase],
        //     'content' => ['required']
        // ]);
        $filename = time() . '.' . $request->avatar->extension();

        $path = $request->file('avatar')->storeAs(
        'avatarstest3',
        $filename,
        'public'
        );

        $post = Post::create(
            [
                'title' => $request->title,
                'content' => $request->content,
            ]
            );

        $image= new Image();
        $image->path = $path;


        $post->image()->save($image);


        dd('Post créé! ');
    }



}
