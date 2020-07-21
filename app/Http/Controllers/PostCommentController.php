<?php

namespace App\Http\Controllers;

use App\PostComment;
use Illuminate\Http\Request;
use Auth;
class PostCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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

        $request->validate([

            'content'=>'required'

        ]);

        if($request->has('usertype'))
        {
            if($request->usertype == 'admin'){ 
                $input = $request->all();
                $input['user_id'] = Auth::guard('admin')->user()->id??null;
                $input['comment_by'] =  Auth::guard('admin')->user()->name.'@DWW';
                $input['usertype'] = 'admin';
            }
        }else{
            if(!$request->comment_id){

                $request->validate([
                    'g-recaptcha-response' => 'required|captcha'
                ]);
            }

            $input = $request->all();
            $input['user_id'] = @Auth::user()->id??null;
            $input['comment_by'] =(@Auth::user()->fname.' '.@Auth::user()->lname)??'';
            $input['usertype'] = 'user';
        }

        PostComment::create($input);



        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PostComment  $postComment
     * @return \Illuminate\Http\Response
     */
    public function show(PostComment $postComment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PostComment  $postComment
     * @return \Illuminate\Http\Response
     */
    public function edit(PostComment $postComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PostComment  $postComment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PostComment $postComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PostComment  $postComment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($postComment);
        try{  
            $comment = PostComment::find($id);
            // dd($comment);
            $comment->delete();
            // $postComment->delete();

            return back()->with('success','Comment Deleted Successfully!!');

        }catch(Exception $e){
            return back()->withInput(Input::all())->with('error',$e->getMessage());
        }
    }
}
