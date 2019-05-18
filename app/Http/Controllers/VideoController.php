<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Videos;
use App\Http\Resources\Video as VideoResource;
use App\Http\Requests;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get videos
        $videos = Videos::with(['likes', 'comments'])->paginate(10);

        //get a collection of Videos as a resource
        return  VideoResource::collection($videos);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //get a single video
        $video  = Videos::with(['likes', 'comments'])->findOrFail($id);

        //return a single video as a resource
        return new VideoResource($video);
    }

    public function store(Request $request)
    {
        $video = $request->isMethod('put') ? Videos::findorFail($request->videos_id) : new Videos;

        $video->title = $request->input('title');
        $video->user_id = $request->input('user_id');
        $video->url = $request->input('url');
        $video->thumbnailUrl = $request->input('thumbnailUrl');
        $video->description = $request->input('description');

        if ($video->save()) {
            return new VideoResource($video);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //get a single video
        $video  = Videos::with(['likes', 'comments'])->findOrFail($id);

        //delete
        if ($video->delete()) {
            return new VideoResource($video);
        }
    }
}
