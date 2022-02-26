<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Customauth;
use App\Models\Post;
use Image;
use Illuminate\Support\Str;
class PostController extends Controller
{
    public function index(){
        $cats= Category::all();
        return view('posts.index',compact('cats'));
    }

    public function add_post(Request $request){
        if($request->hasFile('thumb_image')){
            $image2= $request->file('thumb_image');
            $reThumbImage= Str::slug($request->title).'.'.$image2->getClientOriginalExtension();
            Image::make($image2)->resize(300,200)->save('imgs/'.$reThumbImage);
            // $image_resize= Image::make($image2->getRealPath());
            // $image_resize->resize(300,300);
            $dest2= public_path('/imgs');
            // $image_resize->save($dest2,$reThumbImage);
        }else{
            $reThumbImage='na';
        }
        $post= new Post;
        $post->user_id= $request->user()->id;
        $post->cat_id= $request->category;
        $post->title= $request->title;
        $post->about= $request->detail;
        
        $post->thumb_image= $reThumbImage;
        $post->save();
        return redirect('/my_posts')->with('success',"Post has been added!!");
    }



    public function edit_post($id){
        $post= Post::find($id);
        $cats= Category::all();
        return view('posts.edit_post',['post'=>$post,'cats'=>$cats]);
    }

    public function edit_post_data(Request $request, $id){
        if($request->hasFile('thumb_image')){
            $image2= $request->file('thumb_image');
            $reThumbImage= Str::slug($request->title).'.'.$image2->getClientOriginalExtension();
            Image::make($image2)->resize(300,200)->save('imgs/'.$reThumbImage);
            // $image_resize= Image::make($image2->getRealPath());
            // $image_resize->resize(300,300);
            $dest2= public_path('/imgs');
            // $image_resize->save($dest2,$reThumbImage);
        }else{
            $reThumbImage= $request->thumb_image;
        }
        $post= Post::find($id);
        // if(Session::has('loginId')){
        //     $userid= Session::get('loginId');
        // }
        $post->user_id= $request->user()->id;
        $post->cat_id= $request->category;
        $post->title= $request->title;
        $post->about= $request->about;
       
        $post->thumb_image= $reThumbImage;
       
        $post->save();
        return redirect('/my_posts')->with('success',"Post has been updated!!");
    }

    public function my_post(Request $request){
        $userid = $request->user()->id;
        $my_posts= Post::where('user_id',$userid)->get();
        
        return view('posts.my_posts',compact('my_posts'));
    }

    public function delete_post($id){
        $post= Post::find($id)->delete();
        return redirect('/my_posts')->with('success',"Post has been deleted successfully!!");
    }


}
