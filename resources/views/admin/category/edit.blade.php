@extends('admin.master')

@section('title')
    Update Category
@endsection

@section('body')
    <div class="row">
        <div class="col-lg-12 mt-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Update Category</h4>
                    <p class="btn-success">{{ session('messageF') }}</p>

                    <form class="form-horizontal p-t-20" action="{{ route('category.update', ['id' => $category->id]) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf


                        <div class="form-group row">
                            <label for="exampleInputuname3" class="col-sm-3 control-label">
                                Category Name
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="exampleInputuname3"
                                    placeholder="category name" name="name" value="{{ $category->name }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputEmail3" class="col-sm-3 control-label">
                                Category Description
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="exampleInputEmail3" rows="10" name="description" placeholder="description">{{ $category->description }}"</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="form-label col-sm-3 control-label" for="web">Category Image<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="file" id="input-file-now-custom-1" class="dropify" name="image" />
                                <img src="{{ asset($category->image) }}" alt=""
                                    style="height: 100px; width: 100px; margin-top: 10px">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 control-label">publication Status<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <label for="" class="me-3">
                                    <input type="radio" name="status" value="1"
                                        {{ $category->status == 1 ? 'checked' : '' }}>Published</label>
                                <label for="">
                                    <input type="radio" name="status" value="2"
                                        {{ $category->status == 2 ? 'checked' : '' }}>Unpublished</label>
                            </div>
                        </div>

                        <div class="form-group row m-b-0">
                            <div class="offset-sm-3 col-sm-9">
                                <button type="submit" class="btn btn-success waves-effect waves-light text-white">Update
                                    Category</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection