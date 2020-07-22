<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use App\Image;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store()
    {
        try
        {
            \DB::transaction(function() // \DB is to call Global DB Class or can import as "use DB";
            {

                $user = User::create([
                    'name' => request('name'),
                    'email' => request('email')
                ]);

                // Doing Validation
                request()->validate([
                    'user_img' => 'required|image'
					'user_img.*' => ['required', 'image'] //for multiple file upload validation
					
                    //'user_img' => 'required|image|max:100'//here 100 = 100 kilobyte max size
                    //'user_img' => 'required|mimes:png,jpg,jpeg,gif,pdf,doc,docx'//for file validation permited files
                ]);

                if(request()->hasFile('user_img'))
                {
                    $destinationPath = 'uploads';// here uploads = public->uploads folder

                    //$file_name = request()->file('user_img')->getClientOriginalName();// getting the file with original filename

                    $extension = request()->file('user_img')->getClientOriginalExtension();

                    //$file_name = rand().".".$extension;// using Random Number for rename file

                    $file_name = uniqid().".".$extension;// using Unique Number for rename file

                    //$file_name = $user->id.".".$extension;// using User Id for rename file

                    $path = 'uploads/'.$file_name;
                    
                    // Assign path to images table
                    $user->images()->create([
                        'path' => $path
                    ]);

                    request()->file('user_img')->move($destinationPath, $file_name);

                    /* Multiple File Upload CODE ....

                        //dd(request()->file('user_img'));

                        request()->validate([

                            'user_img.*' => 'required|image'
                                
                        ]);

                        if(request()->hasFile('user_img'))
                        {
                            $destinationPath = 'uploads';

                            $all_file =  request()->file('user_img');
                            
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

        return redirect('/users');
    }

    public function show($id)   
    {
        $showimg = User::find($id);

        return view('users.show', compact('showimg'));
    }

    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();
        $user->images()->delete();

        return redirect('/users');
    }

    public function images()
    {
        //return Image::all();

        $image = Image::find(13);

        //return $image->imageable;
        return $image->load('imageable');
    }
}
