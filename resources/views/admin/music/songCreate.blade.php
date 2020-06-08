@extends('layouts.admin')
@section('admin')


    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Create Songs</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <a href="{{route('admin.songs')}}">

                            <button class="btn btn-success">Back</button>
                        </a>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                     <form class="needs-validation" action="{{route('admin.create.song')}}" method="post" enctype="multipart/form-data" novalidate="">
                       @csrf
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label>Song Name</label>
                                <input type="text" class="form-control" name="song_name">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Artist</label>
                                <select class="form-control" name="artist_id">
                                    <option value="0">select any</option>
                                    @foreach($artist as $art)
                                        <option value="{{$art->id}}">{{$art->artist_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Album</label>
                                <select class="form-control" multiple name="album_id[]">
                                    @foreach($albums as $ablum)
                                        <option value="{{$ablum->id}}">{{$ablum->album_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Genres</label>
                                <select class="form-control" multiple name="genres_id[]">
                                    @foreach($genres as $genre)
                                        <option value="{{$genre->id}}">{{$genre->genres_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Language</label>
                                <select class="form-control" name="language_id">
                                    <option value="0">select any</option>
                                    @foreach($languages as $langs)
                                        <option value="{{$langs->id}}">{{$langs->language_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Is Paid Song ?</label>
                                <select class="form-control idpaid" name="is_paid">
                                    <option value="0">select any</option>
                                    <option value="1">Yes</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Amount</label>
                                <input type="text" class="form-control amt" name="amount" disabled>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Demo Song</label>
                                <input type="file" class="form-control" name="demo_song">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Main Song</label>
                                <input type="file" class="form-control" name="main_song">
                            </div>

                        </div>

                        <button class="btn btn-primary waves-effect waves-light" type="submit">Submit</button>
                    </form>

                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
@stop
@section('js')
    <script>
        $(document).ready(function () {
            $('.idpaid').change(function () {
                var id = $(this).val();
                if(id == 0){
                    $('.amt').prop('disabled',true)
                }else if (id == 1){
                    $('.amt').prop('disabled',false)
                }
                else {
                    $('.amt').prop('disabled',true)
                }

            })
        })
    </script>
@stop
