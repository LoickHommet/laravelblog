<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PostStoreRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PostUpdateRequest;
use App\Http\Requests\PostUpdatePictureRequest;

class PostController extends Controller
{
    public function index(){

        $loading = false;
      //  $posts = DB::table('posts')->get();
      $posts = Post::all();
      $categories = Category::all();
      
       return view('posts.list', compact(['categories', 'posts', 'loading']));

    //   return view('test')*
    //   ->with('load',$loading);
    }

    public function postsById($id){
        $posts = Post::find($id);
        return view('posts.details', compact( 'posts'));
    }



    public function create(){
        $categories = Category::all();
        return view('posts.addpost', compact( 'categories'));
    }

    public function store(PostStoreRequest $request)
    {
            $paramas = $request->all();
            $file= Storage::put('public', $paramas['picture']);
            $paramas['picture'] = substr($file,7);
            $post = Post::create($paramas);
            //Ajouter les categories
            if(!empty($paramas['categories'])){
                $post->categories()->attach($paramas['categories']); //marche que on a un belongsToMany
            }


            return redirect('posts');

        // $posts = Post::create([
       //     'title' => $paramas['title'],
       //     'description' => $paramas['description'],
       // ]);
       // $posts = new Post();

       // $posts->title = request('title');
       // $posts->description = request('description');
       // $posts->extrait = request('extrait');

      //  try {
      //      $posts->save();
      //      return redirect('/posts');
      //  } catch (\Throwable $th) {
      //      return back()->withInput();
      //  }

    }

    public function removePost($id){

        $post = Post::find($id);

        if(Storage::exists(["public/$post->picture"])){
            Storage::delete(["public/$post->picture"]);
        }
        $post->categories()->detach();
        $post->delete();

        return back();
    }

    public function udpdateview($id){
        $post = Post::find($id);
        return view('posts.modif', compact('post'));
    }

    public function udpdate(PostUpdateRequest $request, $id){
        $paramas = $request->validated();
        $post = Post::find($id);
        $post->update($paramas);
        return redirect()->route('posts');
    }

    public function updatepicture(PostUpdatePictureRequest $request, $id){
        $paramas = $request->validated();
        $post = Post::find($id);
        if(Storage::exists("public/$post->picture")){
            Storage::delete("public/$post->picture");
        }
        $file = Storage::put('public', $paramas['picture']);
        //$paramas['picture'] = str_replace("public/", "", $file);
        $post->picture = str_replace("public/", "", $file);
       // $post->update(['picture' => $paramas['picture']]);
       $post->save();
        return back();
    }


}
