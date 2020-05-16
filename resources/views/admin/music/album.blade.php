@extends('layouts.admin')
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Albums</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <button class="btn btn-success" data-toggle="modal" data-target="#createabum">Create Album</button>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Basic example</h4>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                            <tr>
                                <th>Album Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($albums as $album)
                            <tr>
                                <th scope="row">{{$album->album_name}}</th>
                                <td>
                                    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#updatealbum{{$album->id}}"><i class="fas fa-edit"></i> </button>
                                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deletealbum{{$album->id}}"><i class="fas fa-trash"></i> </button>
                                </td>
                            </tr>



                            <div class="modal fade" id="deletealbum{{$album->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Delete Album</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{route('admin.delete.album')}}" method="post">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    are you sure to delete this album ?
                                                    <input type="hidden" class="form-control" name="album_delete_id" value="{{$album->id}}">
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



                            <div class="modal fade" id="updatealbum{{$album->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Update Album</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{route('admin.update.album')}}" method="post">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Album Name</label>
                                                    <input type="text" class="form-control" name="album_name" value="{{$album->album_name}}">
                                                    <input type="hidden" class="form-control" name="album_edit_id" value="{{$album->id}}">
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



    <div class="modal fade" id="createabum" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Create Album</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.create.album')}}" method="post">
                    @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Album Name</label>
                        <input type="text" class="form-control" name="album_name">
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
