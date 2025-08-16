@extends('admin.master')

@section('title')
    Manage Category
@endsection

@section('body')
    <div class="row mt-3">

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Table</h4>
                <h6 class="card-subtitle">Data table example</h6>
                <div class="table-responsive m-t-40">
                    <table id="myTable" class="table table-striped border">
                        <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Category Name</th>
                                <th>Category Description</th>
                                <th>Category Image</th>
                                <th>Publication Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->description }}</td>
                                    <td>
                                        <input type="image" src="{{ asset($category->image) }}" alt=""
                                            style="height: 50px; width: 50px;">
                                    </td>
                                    <td>
                                        {{ $category->status == 1 ? 'Published' : 'Unpublished' }}
                                    </td>
                                    <td>

                                        <a href="{{ route('category.edit', ['id' => $category->id]) }}"
                                            class="btn btn-sm btn-primary" title="Edit Category">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        @if ($category->status == 1)
                                            <a href="{{ route('category.status', ['id' => $category->id]) }}"
                                                class="btn btn-sm btn-warning" title="Unpublish Category">
                                                <i class="fa-solid fa-eye-slash"></i>
                                            </a>
                                        @else
                                            <a href="{{ route('category.status', ['id' => $category->id]) }}"
                                                class="btn btn-sm btn-success" title="Publish Category">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                        @endif

                                        <form action="{{ route('category.delete') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $category->id }}">
                                            <button type="submit" class="btn btn-sm btn-danger" title="Delete Category"
                                                onclick="return confirm('Delete This Category? Action Cannot be Undone!')">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
