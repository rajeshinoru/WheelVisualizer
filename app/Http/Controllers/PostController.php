<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(10);
        return view('admin.post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'=>'required|max:255',
            'content'=>'required|min:1', 
        ]);
        try{  

                $data = $request->except(['_token']);
                $data['postby']='Admin';

                $post = Post::create($data);  
                
                if($request->image){
                    $post->image = $request->image->store('posts');
                }

                $post->save();

                return back()->with('success','Post Created Successfully!!');

            }catch(Exception $e){
                return back()->withInput(Input::all())->with('error',$e->getMessage());
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // dd($post);
        try{  
            if($post){
                return view('admin.post.view',compact('post'));
            }else{
                return back()->with('success','Post Not Found!!');
            } 
                

            }catch(Exception $e){
                return back()->with('error','Post Not Found!!');
            }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        // dd($post,$request->all());

        $this->validate($request, [
            'title'=>'required|max:255',
            'content'=>'required|min:1', 
        ]);
        try{  
                $post->title = $request->title;
                $post->content = $request->content;
                $post->is_visible = $request->is_visible;
                
                if($request->image){
                    $post->image = $request->image->store('posts');
                }
                
                $post->save();

                return back()->with('success','Post Updated Successfully!!');

            }catch(Exception $e){
                return back()->withInput(Input::all())->with('error',$e->getMessage());
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        try{  
            
            $post->delete();

            return back()->with('success','Post Deleted Successfully!!');

        }catch(Exception $e){
            return back()->withInput(Input::all())->with('error',$e->getMessage());
        }
    }
}
