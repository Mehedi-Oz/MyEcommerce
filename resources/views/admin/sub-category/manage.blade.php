@extends('admin.master')

@section('title')
    Manage SubCategory
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
                                <th>SubCategory Name</th>
                                <th>SubCategory Description</th>
                                <th>SubCategory Image</th>
                                <th>Publication Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($subcategories as $subcategory)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $subcategory->category->name }}</td>
                                    <td>{{ $subcategory->name }}</td>
                                    <td class="style="height: 70px; width: 70px; align="justify";>
                                        {{ $subcategory->description }}</td>
                                    <td>
                                        <input type="image" src="{{ asset($subcategory->image) }}"
                                            alt="{{ $subcategory->name }}" style="height: 50px; width: 50px;">
                                    </td>
                                    <td>
                                        {{ $subcategory->status == 1 ? 'Published' : 'Unpublished' }}
                                    </td>
                                    <td>
                                        <a href="{{ route('subcategory.edit', ['id' => $subcategory->id]) }}"
                                            class="btn btn-sm btn-primary" title="Edit SubCategory">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        @if ($subcategory->status == 1)
                                            <a href="{{ route('subcategory.status', ['id' => $subcategory->id]) }}"
                                                class="btn btn-sm btn-warning" title="Unpublish SubCategory">
                                                <i class="fa-solid fa-eye-slash"></i>
                                            </a>
                                        @else
                                            <a href="{{ route('subcategory.status', ['id' => $subcategory->id]) }}"
                                                class="btn btn-sm btn-success" title="Publish SubCategory">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                        @endif

                                        <form action="{{ route('subcategory.delete') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $subcategory->id }}">
                                            <button type="submit" class="btn btn-sm btn-danger" title="Delete SubCategory"
                                                onclick="return confirm('Delete This SubCategory? Action Cannot be Undone!')">
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
