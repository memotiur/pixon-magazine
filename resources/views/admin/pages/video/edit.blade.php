@extends('layouts.app')

@section('title', 'Create Category')
@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title"> Category</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Edit Category</a></li>
            </ol>

        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <h4 class="m-t-0 header-title">Update Video</h4>
                <hr>

                @if(session('success'))
                    <div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>{{session('success')}}!</strong>
                    </div>
                @endif
                @if(session('failed'))
                    <div class="alert ">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>{{session('failed')}}!</strong>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="row">
                    <div class="col-12">
                        <div class="p-20">
                            <form class="form-horizontal" method="post" action="/video/update"
                                  enctype="multipart/form-data">

                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Video Name</label>
                                    <div class="col-10">
                                        <input type="text" class="form-control" name="video_title" value="{{$video->video_title}}" required>
                                        <input type="hidden" class="form-control" name="_token"
                                               value="{{csrf_token()}}">
                                        <input type="hidden" class="form-control" name="video_id"
                                               value="{{$video->video_id}}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Video URL</label>
                                    <div class="col-10">
                                        <input type="text" class="form-control" name="video_url" value="{{$video->video_url}}" required>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Video Details</label>
                                    <div class="col-10">
                                        <textarea type="text" class="form-control" name="video_description" >{{$video->video_description}}</textarea>
                                    </div>
                                </div>

                                <div class="form-group mb-0 justify-content-end row">
                                    <div class="col-10">
                                        <button type="submit" class="btn btn-info waves-effect waves-light">Update
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- end row -->

            </div> <!-- end card-box -->
        </div><!-- end col -->
    </div>
    <!-- end row -->

@endsection