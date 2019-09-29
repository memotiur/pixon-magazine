@extends('layouts.app')

@section('title', 'New Post')
@section('content')

    <style>
        .modal-footer {
            display: none;
        }
    </style>

    <form class="form-horizontal" method="POST" action="/post/store" enctype="multipart/form-data">
        {{--@if(session('success') || session('failed') || $errors->any())--}}
        <div class="row">
            <div class="col-12">

                @if(session('success'))
                    <div class="alert alert-success">
                        <strong></strong> {{session('success')}}
                    </div>
                @endif
                @if(session('decline'))
                    <div class="alert alert-danger">
                        <strong></strong> {{session('failed')}}
                    </div>
                @endif

            </div>
        </div>
        {{--@endif--}}
        <div class="row">
            <div class="col-9">
                <div class="card-box">

                    <div class="row">
                        <div class="col-12">
                            <div class="p-20">

                                <div class="form-group row">
                                    {{-- <label>Headline</label>--}}

                                    <input type="text" class="form-control" name="post_headline" required>
                                    <input type="hidden" class="form-control" name="_token"
                                           value="{{csrf_token()}}">

                                </div>

                                <div class="form-group row">
                                    {{-- <label>Post Details</label><br>--}}

                                    {{--<textarea type="text" class="form-control summernote" name="post_details" rows="25"></textarea>--}}


                                    <div class="col-sm-12">


                                        {{--       <h4 class="m-b-30 m-t-0 header-title"><b>Default Editor</b></h4>
                                               --}}{{-- <input type="text" class="form-control summernote" name="post_details">--}}{{--
       --}}
                                        <textarea type="text" class="form-control summernote" name="post_details"
                                                  rows="30" style="height: 300px;"></textarea>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- end row -->

                </div> <!-- end card-box -->
            </div><!-- end col -->

            <div class="col-3">
                <div class="card-box">
                    <div class="form-group row">
                        <button type="submit" class="btn btn-block w-sm btn-success waves-effect waves-light">Publish
                        </button>
                    </div>

                    <h4 class="m-t-0 header-title">Meta Data</h4>
                    <hr style="margin-bottom: 0px">

                    <div class="row">
                        <div class="col-12">
                            <div class="p-20">

                                <div class="form-group row">
                                    <label>Category</label>

                                    <select class="form-control" name="category_id">
                                        @foreach($categories as $category)
                                            <option value="{{$category->category_id}}">{{$category->category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label>Tags (Comma separated)</label>

                                    <input type="text" class="form-control " name="post_tags" data-role="tagsinput">

                                </div>

                                <div class="form-group row">
                                    <label>Featured Image</label>

                                    <input type="file" class="form-control" name="image" required>
                                </div>

                                <div class="form-group row">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2"
                                               name="pin_post">
                                        <label class="custom-control-label" for="customCheck2">Pin Post</label>
                                    </div>


                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- end row -->

                </div> <!-- end card-box -->
            </div><!-- end col -->

        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="text-center p-20">
                    {{--                    <button type="submit" class="btn w-sm btn-white waves-effect">Cancel</button>--}}

                </div>
            </div>
        </div>
    </form>
    <!-- end row -->



    <script src="/assets/js/jquery.min.js"></script>

    <script src="/assets//plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js"></script>
    <script src="/assets//plugins/select2/js/select2.min.js" type="text/javascript"></script>
    <script src="/assets//plugins/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>


    <link href="/assets/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css" rel="stylesheet"/>
    <link href="/assets/plugins/multiselect/css/multi-select.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet"/>



@endsection










