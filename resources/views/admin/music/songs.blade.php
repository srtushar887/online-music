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
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
{{--                            @foreach($genres as $genre)--}}
{{--                                <tr>--}}
{{--                                    <th scope="row">{{$genre->genres_name}}</th>--}}
{{--                                    <td>--}}
{{--                                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#updategenres{{$genre->id}}"><i class="fas fa-edit"></i> </button>--}}
{{--                                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deletegenres{{$genre->id}}"><i class="fas fa-trash"></i> </button>--}}
{{--                                    </td>--}}
{{--                                </tr>--}}



{{--                                <div class="modal fade" id="deletegenres{{$genre->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">--}}
{{--                                    <div class="modal-dialog modal-dialog-centered" role="document">--}}
{{--                                        <div class="modal-content">--}}
{{--                                            <div class="modal-header">--}}
{{--                                                <h5 class="modal-title" id="exampleModalLongTitle">Delete Genres</h5>--}}
{{--                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                                                    <span aria-hidden="true">&times;</span>--}}
{{--                                                </button>--}}
{{--                                            </div>--}}
{{--                                            <form action="{{route('admin.delete.genres')}}" method="post">--}}
{{--                                                @csrf--}}
{{--                                                <div class="modal-body">--}}
{{--                                                    <div class="form-group">--}}
{{--                                                        are you sure to delete this album ?--}}
{{--                                                        <input type="hidden" class="form-control" name="genres_delete_id" value="{{$genre->id}}">--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="modal-footer">--}}
{{--                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
{{--                                                    <button type="submit" class="btn btn-primary">Delete</button>--}}
{{--                                                </div>--}}
{{--                                            </form>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}



{{--                                <div class="modal fade" id="updategenres{{$genre->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">--}}
{{--                                    <div class="modal-dialog modal-dialog-centered" role="document">--}}
{{--                                        <div class="modal-content">--}}
{{--                                            <div class="modal-header">--}}
{{--                                                <h5 class="modal-title" id="exampleModalLongTitle">Update Genres</h5>--}}
{{--                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                                                    <span aria-hidden="true">&times;</span>--}}
{{--                                                </button>--}}
{{--                                            </div>--}}
{{--                                            <form action="{{route('admin.update.genres')}}" method="post">--}}
{{--                                                @csrf--}}
{{--                                                <div class="modal-body">--}}
{{--                                                    <div class="form-group">--}}
{{--                                                        <label>Genres Name</label>--}}
{{--                                                        <input type="text" class="form-control" name="genres_name" value="{{$genre->genres_name}}">--}}
{{--                                                        <input type="hidden" class="form-control" name="genres_edit_id" value="{{$genre->id}}">--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="modal-footer">--}}
{{--                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
{{--                                                    <button type="submit" class="btn btn-primary">Update</button>--}}
{{--                                                </div>--}}
{{--                                            </form>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                            @endforeach--}}
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
                <form action="{{route('admin.create.genres')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
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
                                @foreach($artist as $artist)
                                <option value="{{$artist->id}}">{{$artist->artist_name}}</option>
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
                            <label>Song</label>
                            <input type="file" class="form-control" name="song">
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
