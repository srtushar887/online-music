@extends('layouts.admin')
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Songs</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <button class="btn btn-success" data-toggle="modal" data-target="#createartist">Create Song</button>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Songs List</h4>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                            <tr>
                                <th>Song Name</th>
                                <th>Song Image</th>
                                <th>Song Type</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($songs as $song)
                                <tr>
                                    <th scope="row">{{$song->song_name}}</th>
                                    <th scope="row"><img src="{{asset($song->song_image)}}" style="height: 50px;width: 50px;"></th>
                                    <th scope="row">
                                        @if ($song->is_paid == 1)
                                            Paid
                                        @else
                                            Free
                                        @endif
                                    </th>
                                    <td>
                                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#updatesong{{$song->id}}"><i class="fas fa-edit"></i> </button>
                                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deletesong{{$song->id}}"><i class="fas fa-trash"></i> </button>
                                    </td>
                                </tr>



                                <div class="modal fade" id="deletesong{{$song->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Delete Song</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{route('admin.delete.song')}}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        are you sure to delete this song ?
                                                        <input type="hidden" class="form-control" name="song_delete_id" value="{{$song->id}}">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Delete</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>



                                <div class="modal fade" id="updatesong{{$song->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Update Song</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{route('admin.update.song')}}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Song Name</label>
                                                        <input type="text" value="{{$song->song_name}}" class="form-control" name="song_name">
                                                        <input type="hidden" value="{{$song->id}}" class="form-control" name="song_edit_id">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Album</label>
                                                        <select class="form-control" name="album_id">
                                                            <option value="0">select any</option>
                                                            @foreach($albums as $ablum)
                                                                <option value="{{$ablum->id}}" {{$song->album_id == $ablum->id ? "selected" : ''}}>{{$ablum->album_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Artist</label>
                                                        <select class="form-control" name="artist_id">
                                                            <option value="0">select any</option>
                                                            @foreach($artist as $art)
                                                                <option value="{{$art->id}}" {{$song->artist_id == $art->id ? "selected" : ''}}>{{$art->artist_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Genres</label>
                                                        <select class="form-control" name="genres_id">
                                                            <option value="0">select any</option>
                                                            @foreach($genres as $genre)
                                                                <option value="{{$genre->id}}" {{$song->genres_id == $genre->id ? "selected" : ''}}>{{$genre->genres_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Language</label>
                                                        <select class="form-control" name="language_id">
                                                            <option value="0">select any</option>
                                                            @foreach($languages as $langs)
                                                                <option value="{{$langs->id}}" {{$song->language_id == $langs->id ? "selected" : ''}}>{{$langs->language_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Is Paid Song ?</label>
                                                        <select class="form-control" name="is_paid">
                                                            <option value="0">select any</option>
                                                            <option value="1" {{$song->is_paid == 1 ? "selected" : ''}}>Yes</option>
                                                            <option value="2" {{$song->is_paid == 1 ? "selected" : ''}}>No</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Demo Song</label>
                                                        <input type="file" class="form-control" name="demo_song">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Main Song</label>
                                                        <input type="file" class="form-control" name="main_song">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Main Song Image</label>
                                                        <br>
                                                        <img src="{{asset($song->song_image)}}" style="height: 100px;width: 100px;">
                                                        <input type="file" class="form-control" name="song_image">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
                <!-- end card-body-->
            </div>
            <!-- end card -->

        </div>
        <!-- end col -->



    </div>



    <div class="modal fade" id="createartist" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Create Song</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.create.song')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Song Name</label>
                            <input type="text" class="form-control" name="song_name">
                        </div>
                        <div class="form-group">
                            <label>Album</label>
                            <select class="form-control" name="album_id">
                                <option value="0">select any</option>
                                @foreach($albums as $ablum)
                                <option value="{{$ablum->id}}">{{$ablum->album_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Artist</label>
                            <select class="form-control" name="artist_id">
                                <option value="0">select any</option>
                                @foreach($artist as $art)
                                <option value="{{$art->id}}">{{$art->artist_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Genres</label>
                            <select class="form-control" name="genres_id">
                                <option value="0">select any</option>
                                @foreach($genres as $genre)
                                <option value="{{$genre->id}}">{{$genre->genres_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Language</label>
                            <select class="form-control" name="language_id">
                                <option value="0">select any</option>
                                @foreach($languages as $langs)
                                    <option value="{{$langs->id}}">{{$langs->language_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Is Paid Song ?</label>
                            <select class="form-control" name="is_paid">
                                <option value="0">select any</option>
                                <option value="1">Yes</option>
                                <option value="2">No</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Demo Song</label>
                            <input type="file" class="form-control" name="demo_song">
                        </div>
                        <div class="form-group">
                            <label>Main Song</label>
                            <input type="file" class="form-control" name="main_song">
                        </div>
                        <div class="form-group">
                            <label>Main Song Image</label>
                            <input type="file" class="form-control" name="song_image">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@stop
