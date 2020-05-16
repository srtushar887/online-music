@extends('layouts.admin')
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">General Setting</h4>

            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xl-12">

            <div class="card">
                <div class="card-body">

                    <form action="{{route('admin.general.setting.save')}}" method="post" enctype="multipart/form-data">
                        @csrf
                       <div class="row">
                           <div class="form-group col-md-4">
                               <label for="exampleInputEmail1">Site Name</label>
                               <input type="text" name="site_name" value="{{$gen->site_name}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                           </div>
                           <div class="form-group col-md-4">
                               <label for="exampleInputEmail1">Site Email</label>
                               <input type="text" name="site_email" value="{{$gen->site_email}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                           </div>
                           <div class="form-group col-md-4">
                               <label for="exampleInputEmail1">Site Phone</label>
                               <input type="text" name="site_phone" value="{{$gen->site_phone}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                           </div>
                           <div class="form-group col-md-12">
                               <label for="exampleInputEmail1">Site Address</label>
                               <textarea type="text" name="site_address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">{!! $gen->site_address !!}</textarea>
                           </div>
                           <div class="form-group col-md-6">
                               <label for="exampleInputEmail1">Logo</label>
                               <br>
                               <img src="{{asset($gen->logo)}}" style="height: 100px;width: 100px;">
                               <input type="file" name="logo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                           </div>
                           <div class="form-group col-md-6">
                               <label for="exampleInputEmail1">Icon</label>
                               <br>
                               <img src="{{asset($gen->icon)}}" style="height: 100px;width: 100px;">
                               <input type="file" name="icon" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                           </div>
                       </div>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                    </form>

                </div> <!-- end card-body-->
            </div> <!-- end card-->



        </div>
    </div>
@stop
