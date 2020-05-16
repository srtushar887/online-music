<?php

namespace App\Http\Controllers\Admin;

use App\album;
use App\artist;
use App\genres;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminMusicController extends Controller
{
    public function almub()
    {
        $albums = album::orderBy('id','desc')->get();
        return view('admin.music.album',compact('albums'));
    }

    public function album_save(Request $request)
    {
        $new_album = new album();
        $new_album->album_name = $request->album_name;
        $new_album->save();
        return back()->with('success','Album Successfully Created');
    }

    public function album_update(Request $request)
    {
        $update_album = album::where('id',$request->album_edit_id)->first();
        $update_album->album_name = $request->album_name;
        $update_album->save();
        return back()->with('success','Album Successfully Updated');
    }

    public function album_delete(Request $request)
    {
        $delete_album = album::where('id',$request->album_delete_id)->first();
        $delete_album->delete();
        return back()->with('success','Album Successfully Deleted');
    }

    public function artist()
    {
        $artists = artist::orderBy('id','desc')->get();
        return view('admin.music.artist',compact('artists'));
    }

    public function artist_save(Request $request)
    {
        $new_artist = new artist();
        $new_artist->artist_name = $request->artist_name;
        $new_artist->save();
        return back()->with('success','Artist Successfully Created');
    }

    public function artist_update(Request $request)
    {
        $update_artist = artist::where('id',$request->album_edit_id)->first();
        $update_artist->artist_name = $request->artist_name;
        $update_artist->save();
        return back()->with('success','Artist Successfully Updated');
    }

    public function artist_delete(Request $request)
    {
        $delete_artist = artist::where('id',$request->artist_delete_id)->first();
        $delete_artist->delete();
        return back()->with('success','Artist Successfully Deleted');
    }

    public function genres()
    {
        $genres = genres::orderBy('id','desc')->get();
        return view('admin.music.genres',compact('genres'));
    }

    public function genres_save(Request $request)
    {
        $new_genres = new genres();
        $new_genres->genres_name = $request->genres_name;
        $new_genres->save();
        return back()->with('success','Genres Successfully Created');
    }

    public function genres_update(Request $request)
    {
        $update_genres = genres::where('id',$request->genres_edit_id)->first();
        $update_genres->genres_name = $request->genres_name;
        $update_genres->save();
        return back()->with('success','Genres Successfully Updated');
    }

    public function genres_delete(Request $request)
    {
        $genres_delete = genres::where('id',$request->genres_delete_id)->first();
        $genres_delete->delete();
        return back()->with('success','Genres Successfully Deleted');
    }

    public function songs()
    {
        $albums = album::all();
        $artist= artist::all();
        $genres= genres::all();
        return view('admin.music.songs',compact('albums','artist','genres'));
    }


}
