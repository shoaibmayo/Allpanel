<?php

namespace App\Http\Controllers\admin;

use App\Models\CricketMatch;
use App\Models\CricketVideo;
use Illuminate\Http\Request;
use App\Models\Permission_role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class CricketMatchesController extends Controller
{
    public function list(){
        $PermissionCategory = Permission_role::getPermission('Category',Auth::guard('admin')->user()->role_id);
        if (empty($PermissionCategory)) {
            return view('page-404-error');
        }
        $data['PermissionAdd'] = Permission_role::getPermission('Add Category',Auth::guard('admin')->user()->role_id);
        $data['PermissionEdit'] = Permission_role::getPermission('Edit Category',Auth::guard('admin')->user()->role_id);
        $data['PermissionDelete'] = Permission_role::getPermission('Delete Category',Auth::guard('admin')->user()->role_id);

        $data['cricketmatches']  = CricketMatch::all();
        return view('admin.cricketmatches.list',$data);
    }

    public function addMatch(){
        return view('admin.cricketmatches.add');
    }
    public function createMatch(Request $request)
    {
        $request->validate([
            'team1' => 'required|string|max:255',
            'team2' => 'required|string|max:255',
            'status' => 'required|in:active,block',
        ]);

        // dd($request->all());
       $match = new CricketMatch;
       $match->team1 = $request->team1;
       $match->team2 = $request->team2;
       $match->status = $request->status;
       $match->save();

        return redirect()->route('admin.cricket.matches.list')
                         ->with('success', 'Cricket match added successfully.');
    }

    public function deleteMatch($id){
        $match = CricketMatch::findOrFail($id);
        $match->delete();
        return redirect()->route('admin.cricket.matches.list')->with('success', 'Match deleted successfully.');
    }



    public function videoList($id){
        $data['match'] = CricketMatch::with('videos')->findOrFail($id);
        return view('admin.cricketmatches.video',$data);
    }

    public function videostore(Request $request, $matchId)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'team' => 'required|in:team1,team2',
            'video' => 'required|mimes:mp4,avi,mov|max:20480', // Max 20MB video files
            'result' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Find the match
        $match = CricketMatch::findOrFail($matchId);

        // Check if the selected team already has 6 videos
        $teamVideosCount = CricketVideo::where('cricket_match_id', $matchId)
                                        ->where('team', $request->team)
                                        ->count();

        if ($teamVideosCount >= 6) {
            return redirect()->back()->with('error', 'This team already has the maximum of 6 videos.')->withInput();
        }

        // Store the video file
        $videoPath = $request->file('video')->store('videos', 'public');

        // Create a new video record
        $video = new CricketVideo();
        $video->cricket_match_id = $matchId;
        $video->team = $request->team;
        $video->video_path = $videoPath;
        $video->result = $request->result;
        $video->save();

        return redirect()->route('admin.cricket.matches.video.list', $matchId)->with('success', 'Video uploaded successfully.');
    }
}
