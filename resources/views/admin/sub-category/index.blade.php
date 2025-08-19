@extends('admin.master')

@section('title')
    Add SubCategory
@endsection

@section('body')
    <div class="row">
        <div class="col-lg-12 mt-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add SubCategory</h4>
                    <p class="text-center" style="color: green">{{ session('message') }}</p>

                    <form class="form-horizontal p-t-20" action="{{ route('subcategory.new') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="" class="col-sm-3 control-label">
                                Category Name
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <select class="form-control" name="category_id">
                                    <option value="" disabled selected>Select a category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 control-label">
                                SubCategory Name
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id=""
                                    placeholder="subcategory name" name="name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputEmail3" class="col-sm-3 control-label">
                                SubCategory Description
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="exampleInputEmail3" rows="10" name="description" placeholder="description"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="form-label col-sm-3 control-label" for="web">SubCategory Image<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="file" id="input-file-now-custom-1" class="dropify" name="image" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword5" class="col-sm-3 control-label">publication Status<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <label for="" class="me-3"><input type="radio" name="status"
                                        value="1">Published</label>
                                <label for=""><input type="radio" name="status"
                                        value="2">Unpublished</label>
                            </div>
                        </div>

                        <div class="form-group row m-b-0">
                            <div class="offset-sm-3 col-sm-9">
                                <button type="submit" class="btn btn-success waves-effect waves-light text-white">Add New
                                    SubCategory</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
