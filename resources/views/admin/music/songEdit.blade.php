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
                    <form class="needs-validation" action="{{route('admin.update.song')}}" method="post" enctype="multipart/form-data" novalidate="">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label>Song Name</label>
                                <input type="text" class="form-control" name="song_name" value="{{$songs->song_name}}">
                                <input type="text" class="form-control" name="song_edit_id" value="{{$songs->id}}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Artist</label>
                                <select class="form-control" name="artist_id">
                                    <option value="0">select any</option>
                                    @foreach($artist as $art)
                                        <option value="{{$art->id}}" {{$songs->artist_id == $art->id? 'selected' : ''}}>{{$art->artist_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Album</label>
                                <br>
                                <?php
                                    $song_albums = \App\song_album::where('song_id',$songs->id)->get();
                                ?>
                                @foreach($song_albums as $album_sigle)
                                    <?php
                                        $ablms = \App\album::where('id',$album_sigle->album_id)->first();
                                    ?>
                                    <div>
                                        <input type="text" value="{{$ablms->album_name}}" readonly class="form-control">
                                        <input type="hidden" name="ex_al_id[]" value="{{$ablms->id}}" readonly class="form-control">
                                        <a href="{{route('delete.exist.song.album',$album_sigle->id)}}">
                                            <button type="button" class="btn btn-success btn-sm" ><i class="fas fa-trash-alt"></i> </button>
                                        </a>
                                        <br>
                                    </div>
                                @endforeach

                                <select class="form-control" multiple name="album_id[]">
                                    <option value="0">select any</option>
                                    @foreach($albums as $ablum)
                                        <option value="{{$ablum->id}}" {{$songs->album_id == $ablum->id? 'selected' : ''}}>{{$ablum->album_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Genres</label>
                                <br>
                                <?php
                                $song_generss = \App\song_genre::where('song_id',$songs->id)->get();
                                ?>
                                @if (count($song_generss)> 0)
                                    @foreach($song_generss as $gens)
                                        <?php
                                        $gname = \App\genres::where('id',$gens->genre_id)->first();
                                        ?>
                                        <div>
                                            <input type="text" value="{{$gname->genres_name}}" readonly class="form-control">
                                            <a href="{{route('delete.exist.song.genrse',$gens->id)}}">
                                                <button type="button" class="btn btn-success btn-sm" ><i class="fas fa-trash-alt"></i> </button>
                                            </a>
                                            <br>
                                        </div>

                                    @endforeach
                                @endif

                                <select class="form-control" multiple name="genres_id[]">
                                    <option value="0">select any</option>
                                    @foreach($genres as $genre)
                                        <option value="{{$genre->id}}" {{$songs->genres_id == $genre->id? 'selected' : ''}}>{{$genre->genres_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Language</label>
                                <select class="form-control" name="language_id">
                                    <option value="0">select any</option>
                                    @foreach($languages as $langs)
                                        <option value="{{$langs->id}}" {{$songs->language_id == $langs->id? 'selected' : ''}}>{{$langs->language_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Is Paid Song ?</label>
                                <select class="form-control idpaid" name="is_paid">
                                    <option value="0">select any</option>
                                    <option value="1" {{$songs->is_paid == 1? 'selected' : ''}}>Yes</option>
                                    <option value="2" {{$songs->is_paid == 2? 'selected' : ''}}>No</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Amount</label>
                                <input type="text" class="form-control amt" name="amount" value="{{$songs->amount}}" disabled>
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






            var ispd =$('.idpaid').val();
            if(ispd == 0){
                $('.amt').prop('disabled',true)
            }else if (ispd == 1){
                $('.amt').prop('disabled',false)
            }
            else {
                $('.amt').prop('disabled',true)
            }


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
