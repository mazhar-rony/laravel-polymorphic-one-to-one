<?php

namespace App\Http\Controllers;

use DB;
use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        try
        {
            \DB::transaction(function() // \DB is to call Global DB Class or can import as "use DB";
            {

                $post = Post::create([
                    'title' => request('title')
                ]);
                
                // Doing Validation
                request()->validate([
                    'post_img' => 'required|image'
					
					'user_img.*' => ['required', 'image'] //for multiple file upload validation
                    //'post_img' => 'required|image|max:100'//here 100 = 100 kilobyte max size
                    //'post_img' => 'required|mimes:png,jpg,jpeg,gif,pdf,doc,docx'//for file validation permited files
                ]);

                if(request()->hasFile('post_img'))
                {
                    $destinationPath = 'uploads';// here uploads = public->uploads folder

                    //$file_name = request()->file('post_img')->getClientOriginalName();// getting the file with original filename

                    $extension = request()->file('post_img')->getClientOriginalExtension();

                    //$file_name = rand().".".$extension;// using Random Number for rename file

                    $file_name = uniqid().".".$extension;// using Unique Number for rename file

                    //$file_name = $user->id.".".$extension;// using User Id for rename file

                    $path = 'uploads/'.$file_name;
                    
                    // Assign path to images table
                    $post->images()->create([
                        'path' => $path
                    ]);

                    request()->file('post_img')->move($destinationPath, $file_name);

                    /* Multiple File Upload CODE ....

                        //dd(request()->file('post_img'));

                        request()->validate([

                            'post_img.*' => 'required|image'
                                
                        ]);

                        if(request()->hasFile('post_img'))
                        {
                            $destinationPath = 'uploads';

                            $all_file =  request()->file('post_img');
                            
                            foreach ($all_file as $file) 
                            {
                                $extension = $file->getClientOriginalExtension();

                                $file_name = uniqid().".".$extension;

                                $file->move($destinationPath, $file_name);
                            }

                        Multiple File Upload CODE ....*/
                }

            }, 3);// transactin forces 3 times(it can be any number)

        }
        catch(exception $e)
        {
            return back();
        }
        
        return redirect('/posts');
    }

    public function show($id)   
    {
        $showimg = Post::find($id);

        return view('posts.show', compact('showimg'));
    }

    public function destroy($id)
    {
        $post = Post::find($id);

        $post->delete();
        $post->images()->delete();

        return redirect('/posts');
    }

}
