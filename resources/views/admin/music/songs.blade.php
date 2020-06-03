@extends('layouts.admin')
@section('css')

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
@endsection
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Songs</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <a href="{{route('admin.create.song.page')}}">

                            <button class="btn btn-success">Create Song</button>
                        </a>
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
                        <table class="table mb-0" id="song">
                            <thead>
                            <tr>
                                <th>Song Name</th>
                                <th>Song Type</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($songs as $song)
                                <tr>
                                    <th scope="row">{{$song->song_name}}</th>
                                    <th scope="row">
                                        @if ($song->is_paid == 1)
                                            Paid
                                        @else
                                            Free
                                        @endif
                                    </th>
                                    <td>
                                        <a href="{{route('admin.song.edit',$song->id)}}">
                                            <button class="btn btn-success btn-sm"><i class="fas fa-edit"></i> </button>
                                        </a>
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



@stop
@section('js')
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {


            $(document).ready(function () {
                $('#song').DataTable();

            })
        });
    </script>
@stop
