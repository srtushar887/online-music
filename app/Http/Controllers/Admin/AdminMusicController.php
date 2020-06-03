<?php

namespace App\Http\Controllers\Admin;

use App\album;
use App\artist;
use App\genres;
use App\Http\Controllers\Controller;
use App\language;
use App\song;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

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
        if($request->hasFile('album_image')){
//            @unlink($gnl->logo);
            $image = $request->file('album_image');
            $imageName = uniqid().'.'.$image->getClientOriginalName('album_image');
            $directory = 'assets/admin/images/album/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $new_album->album_image = $imgUrl;
        }

        $new_album->album_name = $request->album_name;
        $new_album->save();
        return back()->with('success','Album Successfully Created');
    }

    public function album_update(Request $request)
    {
        $update_album = album::where('id',$request->album_edit_id)->first();
        if($request->hasFile('album_image')){
            @unlink($update_album->logo);
            $image = $request->file('album_image');
            $imageName = uniqid().'.'.$image->getClientOriginalName('album_image');
            $directory = 'assets/admin/images/album/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $update_album->album_image = $imgUrl;
        }
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
        if($request->hasFile('artist_image')){
//            @unlink($gnl->logo);
            $image = $request->file('artist_image');
            $imageName = uniqid().'.'.$image->getClientOriginalName('artist_image');
            $directory = 'assets/admin/images/artist/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $new_artist->artist_image = $imgUrl;
        }
        $new_artist->artist_name = $request->artist_name;
        $new_artist->save();
        return back()->with('success','Artist Successfully Created');
    }

    public function artist_update(Request $request)
    {
        $update_artist = artist::where('id',$request->album_edit_id)->first();
        if($request->hasFile('artist_image')){
            @unlink($update_artist->artist_image);
            $image = $request->file('artist_image');
            $imageName = uniqid().'.'.$image->getClientOriginalName('artist_image');
            $directory = 'assets/admin/images/artist/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $update_artist->artist_image = $imgUrl;
        }
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
        if($request->hasFile('genres_image')){
//            @unlink($update_artist->artist_image);
            $image = $request->file('genres_image');
            $imageName = uniqid().'.'.$image->getClientOriginalName('genres_image');
            $directory = 'assets/admin/images/genres/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $new_genres->genres_image = $imgUrl;
        }
        $new_genres->genres_name = $request->genres_name;
        $new_genres->save();
        return back()->with('success','Genres Successfully Created');
    }

    public function genres_update(Request $request)
    {
        $update_genres = genres::where('id',$request->genres_edit_id)->first();
        if($request->hasFile('genres_image')){
            @unlink($update_genres->genres_image);
            $image = $request->file('genres_image');
            $imageName = uniqid().'.'.$image->getClientOriginalName('genres_image');
            $directory = 'assets/admin/images/genres/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $update_genres->genres_image = $imgUrl;
        }
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



    public function songs_language()
    {
        $langs = language::all();
        return view('admin.music.language',compact('langs'));
    }

    public function songs_language_save(Request $request)
    {
        $new_lang = new language();
        $new_lang->language_name = $request->language_name;
        $new_lang->save();

        return back()->with('success','Song language Created');
    }

    public function songs_language_update(Request $request)
    {
        $update_language = language::where('id',$request->language_edit_id)->first();
        $update_language->language_name = $request->language_name;
        $update_language->save();

        return back()->with('success','Song language Upated');
    }

    public function songs_language_delete(Request $request)
    {
        $delete_lan = language::where('id',$request->langiage_delete_id)->first();
        $delete_lan->delete();
        return back()->with('success','Song language Deleted');
    }


    public function songs()
    {
        $albums = album::all();
        $artist= artist::all();
        $genres= genres::all();
        $languages = language::all();
        $songs = song::all();
        return view('admin.music.songs',compact('albums','artist','genres','languages','songs'));
    }


    public function songs_create()
    {
        $albums = album::all();
        $artist= artist::all();
        $genres= genres::all();
        $languages = language::all();
        $songs = song::all();
        return view('admin.music.songCreate',compact('albums','artist','genres','languages','songs'));

    }


    public function songs_save(Request $request)
    {
        $song_save = new song();
        if($request->hasFile('song_image')){
            $image = $request->file('song_image');
            $imageName = uniqid().time().'.'.$image->getClientOriginalName('song_image');
            $directory = 'assets/admin/images/songimage/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $song_save->song_image = $imgUrl;
        }


        if($request->hasFile('demo_song')){
            $image = $request->file('demo_song');
            $imageName = uniqid().time().'.'.$image->getClientOriginalName('song_image');
            $directory = 'assets/admin/images/songfile/';
            $imgUrl  = $directory.$imageName;
            $image->move($directory,$imageName);
            $song_save->demo_song = $imgUrl;
        }

        if($request->hasFile('main_song')){
            $image = $request->file('main_song');
            $imageName = uniqid().time().'.'.$image->getClientOriginalName('main_song');
            $directory = 'assets/admin/images/songfile/';
            $imgUrl1  = $directory.$imageName;
            $image->move($directory,$imageName);
            $song_save->main_song = $imgUrl1;
        }



        $song_save->song_name = $request->song_name;
        $song_save->album_id = $request->album_id;
        $song_save->artist_id = $request->artist_id;
        $song_save->genres_id = $request->genres_id;
        $song_save->language_id = $request->language_id;
        $song_save->is_paid = $request->is_paid;
        $song_save->amount = $request->amount;
        $song_save->save();

        return back()->with('success','Song Created');


    }


    public function songs_edit($id)
    {

        $albums = album::all();
        $artist= artist::all();
        $genres= genres::all();
        $languages = language::all();
        $songs = song::where('id',$id)->first();
        return view('admin.music.songEdit',compact('albums','artist','genres','languages','songs'));

    }



    public function songs_update(Request $request)
    {
        $update_song = song::where('id',$request->song_edit_id)->first();
        if($request->hasFile('song_image')){
            @unlink($update_song->logo);
            $image = $request->file('song_image');
            $imageName = uniqid().time().'.'.$image->getClientOriginalName('song_image');
            $directory = 'assets/admin/images/songimage/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $update_song->song_image = $imgUrl;
        }


        if($request->hasFile('demo_song')){
            @unlink($update_song->demo_song);
            $image = $request->file('demo_song');
            $imageName = uniqid().time().'.'.$image->getClientOriginalName('song_image');
            $directory = 'assets/admin/images/songfile/';
            $imgUrl  = $directory.$imageName;
            $image->move($directory,$imageName);
            $update_song->demo_song = $imgUrl;
        }

        if($request->hasFile('main_song')){
            @unlink($update_song->main_song);
            $image = $request->file('main_song');
            $imageName = uniqid().time().'.'.$image->getClientOriginalName('main_song');
            $directory = 'assets/admin/images/songfile/';
            $imgUrl1  = $directory.$imageName;
            $image->move($directory,$imageName);
            $update_song->main_song = $imgUrl1;
        }



        $update_song->song_name = $request->song_name;
        $update_song->album_id = $request->album_id;
        $update_song->artist_id = $request->artist_id;
        $update_song->genres_id = $request->genres_id;
        $update_song->language_id = $request->language_id;
        $update_song->is_paid = $request->is_paid;
        $update_song->amount = $request->amount;
        $update_song->save();

        return back()->with('success','Song Updated');
    }

    public function songs_delete(Request $request)
    {
        $delete_song = song::where('id',$request->song_delete_id)->first();
        $delete_song->delete();
        return back()->with('success','Song Deleted');
    }



}
