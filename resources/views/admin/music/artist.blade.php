@extends('layouts.admin')
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Artist</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <button class="btn btn-success" data-toggle="modal" data-target="#createartist">Create Artist</button>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Artist List</h4>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                            <tr>
                                <th>Artist Name</th>
                                <th>Artist Image</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($artists as $artist)
                                <tr>
                                    <th scope="row">{{$artist->artist_name}}</th>
                                    <th scope="row"> <img src="{{asset($artist->artist_image)}}" style="height: 50px;width: 50px;"></th>
                                    <td>
                                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#updateartist{{$artist->id}}"><i class="fas fa-edit"></i> </button>
                                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteartisat{{$artist->id}}"><i class="fas fa-trash"></i> </button>
                                    </td>
                                </tr>



                                <div class="modal fade" id="deleteartisat{{$artist->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Delete Album</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{route('admin.delete.artist')}}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        are you sure to delete this album ?
                                                        <input type="hidden" class="form-control" name="artist_delete_id" value="{{$artist->id}}">
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



                                <div class="modal fade" id="updateartist{{$artist->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Update Album</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{route('admin.update.artist')}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Album Name</label>
                                                        <input type="text" class="form-control" name="artist_name" value="{{$artist->artist_name}}">
                                                        <input type="hidden" class="form-control" name="album_edit_id" value="{{$artist->id}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Artist Name</label>
                                                        <br>
                                                        <img src="{{asset($artist->artist_image)}}" style="height: 100px;width: 100px;">
                                                        <input type="file" class="form-control" name="artist_image">
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
                    <h5 class="modal-title" id="exampleModalLongTitle">Create Artist</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.create.artist')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Artist Name</label>
                            <input type="text" class="form-control" name="artist_name">
                        </div>
                        <div class="form-group">
                            <label>Artist Name</label>
                            <input type="file" class="form-control" name="artist_image">
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
