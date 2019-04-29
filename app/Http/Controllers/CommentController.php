<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Comments;

use App\Http\Resources\CommentResource;


class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $comment = $request->isMethod('put') ? Comments::findorFail($request->comment_id) : new Comments;

        $comment->comment_body = $request->input('comment_body');
        $comment->user_id = $request->input('user_id');
        $comment->videos_id = $request->input('videos_id');

        $user = DB::table('users')->where('user_id','=',$request->input('user_id'))->first();


        if ($comment->save()) {
            return (new CommentResource($comment))->additional([
                'userInfo' => [
                    'user_id' => $user->user_id,
                    'name' => $user->name,
                    'avatar' =>$user->avatar,
                    'email' => $user->email
                ],
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
