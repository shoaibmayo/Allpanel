<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\Game;
use App\Models\Game_image;
use App\Models\Game_video;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Models\Permission_role;

class GameController extends Controller
{
    public function gameList() { 

        $PermissionGame = Permission_role::getPermission('Game',Auth::guard('admin')->user()->role_id);
        if (empty($PermissionGame)) {
            return view('page-404-error');
        } 
        $data['PermissionAdd'] = Permission_role::getPermission('Add Game',Auth::guard('admin')->user()->role_id);
        $data['PermissionEdit'] = Permission_role::getPermission('Edit Game',Auth::guard('admin')->user()->role_id);
        $data['PermissionDelete'] = Permission_role::getPermission('Delete Game',Auth::guard('admin')->user()->role_id);

        $data['games'] = Game::latest('id')->with('game_images', 'game_videos')->get();
        return view('admin.game.list',$data);
        
    }

    public function gameAdd()
    {
        $category = Category::orderBy('name', 'ASC')->get();
        $data['category'] = $category;
        return view('admin.game.add', $data);
    }

    public function gameCreate(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|unique:games',
            'status' => 'required',
            'category_id' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'video' => 'nullable|mimetypes:video/mp4,video/avi,video/mpeg,video/quicktime|max:20480',
            // 'round_id' => 'required',
        ]);

        $game = new Game;
        $game->name = $request->name;
        $game->slug = $request->slug;
        $game->status = $request->status;
        $game->game_description = $request->game_description;
        $game->category_id = $request->category_id;
        $game->sub_category_id = $request->sub_category_id;
        $game->child_category_id = $request->child_category_id;
        $game->save();

        // save image
        if (!empty($request->image)) {

            $ext = $request->image->getClientOriginalExtension();
            $newName = time() . '.' . $ext;

            $image = new Game_image();
            $image->image = $newName;
            $image->game_id = $game->id;
            $image->save();

            $request->image->move(public_path() . '/images', $newName);
        }

        // save video 
        if (!empty($request->video)) {

            $ext = $request->video->getClientOriginalExtension();
            $newName = time() . '.' . $ext;

            $video = new Game_video();
            $video->game_id = $game->id;
            $video->round_id = $request->round_id;
            $video->video_description = $request->video_description;
            $video->video = $newName;
            $video->save();

            $request->video->move(public_path() . '/videos', $newName);
        }
        return redirect()->route('admin.game.list')->with('success', 'Game created successfully.');
    }

    public function gameEdit($id)
    {
        $game = Game::find($id);
        if (empty($game)) {
            return redirect()->route('admin.game.list')->with('error', 'Record Not Found!.');
        }

        // Fetch game image
        $gameImage = Game_image::where('game_id', $game->id)->get();
        // Fetch game video 
        $gameVideo = Game_video::where('game_id', $game->id)->get();

        $subcategory = SubCategory::where('category_id', $game->category_id)->get();
        $childcategory = ChildCategory::where('subcategory_id', $game->sub_category_id)->get();
        $category = Category::orderBy('name', 'ASC')->get();

        $data['gameImage'] = $gameImage;
        $data['gameVideo'] = $gameVideo;
        $data['childcategory'] = $childcategory;
        $data['subcategory'] = $subcategory;
        $data['game'] = $game;
        $data['category'] = $category;
        return view('admin.game.edit', $data);
    }

    public function gameUpdate($id, Request $request)
    {
        $game = Game::find($id);
        $gameImage = Game_image::where('game_id', $id)->first();
        $gameVideo = Game_video::where('game_id', $id)->first();

        $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|unique:games,slug,' . $game->id . ',id',
            'status' => 'required',
            'category_id' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'video' => 'nullable|mimetypes:video/mp4,video/avi,video/mpeg,video/quicktime|max:20480',
            'round_id' => 'required',
        ]);

        $game->name = $request->name;
        $game->slug = $request->slug;
        $game->status = $request->status;
        $game->game_description = $request->game_description;
        $game->category_id = $request->category_id;
        $game->sub_category_id = $request->sub_category_id;
        $game->child_category_id = $request->child_category_id;
        $game->save();


        // save image
        if (!empty($request->image)) {

            // dd($gameImage);
            $ext = $request->image->getClientOriginalExtension();
            $newName = time() . '.' . $ext;

            $gameImage->image = $newName;
            $gameImage->game_id = $game->id;
            $gameImage->save();
            File::delete(public_path('/images/' . $gameImage->image));
            $request->image->move(public_path() . '/images', $newName);
        }

        // Fetch game video 
        $gameVideo->game_id = $game->id;
        $gameVideo->round_id = $request->round_id;
        $gameVideo->video_description = $request->video_description;
        $gameVideo->save();

        // save video 
        if (!empty($request->video)) {
            $ext = $request->video->getClientOriginalExtension();
            $newName = time() . '.' . $ext;
            $gameVideo->video = $newName;

            $gameVideo->save();
            File::delete(public_path('videos/'.$gameVideo->video));
            $request->video->move(public_path() . '/videos', $newName);
        }
        return redirect()->route('admin.game.list')->with('success', 'Game updated successfully.');
    }


    public function gameDelete($id){
        $game = Game::find($id);
        $gameImage = Game_image::where('game_id', $id)->first();
        $gameVideo = Game_video::where('game_id', $id)->first();

        // Delete image
        // File::delete(public_path('images'.$gameImage->image));

        File::delete(public_path('images/' . $gameImage->image));

        File::delete(public_path('videos/'.$gameVideo->video));
        $game->delete();
        return redirect()->route('admin.game.list')->with('success', 'Game deleted successfully.');
    }
}
