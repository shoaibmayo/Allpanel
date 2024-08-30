<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Result;
use App\Models\Video;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function resultList(){

        $videos = Video::with('results')->get();
        // $videos = Video::all();
        return view('admin.result.list', compact('videos'));
    }

    public function resultAdd()
    {
        
        return view('admin.result.add');
    }

    public function resultCreate(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'video' => 'required|mimetypes:video/mp4,video/avi,video/mpeg,video/quicktime',
            'result' => 'required|max:255',
        ]);

        // save video 
        if (!empty($request->video)) {
            $ext = $request->video->getClientOriginalExtension();
            $newName = time() . '.' . $ext;
            $request->video->move(public_path(). '/results',$newName);

            $video = new Video();
            $video->url = $newName;
            $video->save();
           
        }

        $result = new Result();
        $result->result = $request->result;
        $result->video_id = $video->id;
        $result->save();
        return redirect()->route('admin.result.list')->with('success', 'Result created successfully.');
    }

    public function resultEdit($id){
        $video = Video::find($id);
        if (empty($video)) {
            return redirect()->route('admin.result.list')->with('error', 'Record Not Found!.');
        }

        $data['video'] = $video;
        
        return view('admin.result.edit', $data);
    }

    public function resultUpdate($id, Request $request){
        $request->validate([
            'video' => 'mimetypes:video/mp4,video/avi,video/mpeg,video/quicktime',
            'result' => 'required|max:255',
        ]);

        $video = Video::where(['id' => $id])->first();

        $result = Result::where('video_id', $id)->first();
        $result->result = $request->result;
        $result->save();

        if($request->video != ''){
            $path = public_path(). '/results/';

            if ($video->url != '' && $video->url != null) {
                $old_file  = $path. $video->url;
                if(file_exists($old_file)){
                    unlink($old_file);
                }
            }
            if ($request->file('video')) {
                $video = $request->file('video');
                $videoName = time() . '.' . $video->getClientOriginalExtension();
                $video->move(public_path().'/results', $videoName);
            }  
        }else{
            $videoName = $video->url;
           
        }
        // $video->url = $videoName;
        // $video->save();
        $video = Video::where(['id'=> $id])->update([
            'url' => $videoName
        ]);

        return redirect()->route('admin.result.list')->with('success', 'Result updated successfully.');
    }


    public function resultDelete($id,Request $request){
        $videoPath = Video::select('url')->where('id',$id)->get();
        $path = public_path(). '/results/'.$videoPath[0]['url'];
        unlink($path);

        $video = Video::where('id',$id)->delete();
        $result = Result::where('video_id',$id)->delete();

        return redirect()->route('admin.result.list')->with('success', 'Result deleted successfully.');
    }
}
