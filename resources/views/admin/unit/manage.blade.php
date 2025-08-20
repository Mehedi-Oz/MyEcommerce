@extends('admin.master')

@section('title')
    Manage Brand
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
                                <th>Brand Name</th>
                                <th>Brand Description</th>
                                <th>Brand Image</th>
                                <th>Publication Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($brands as $brand)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $brand->name }}</td>
                                    <td class="style="height: 70px; width: 70px;  align="justify";>{{ $brand->description }}</td>
                                    <td>
                                        <input type="image" src="{{ asset($brand->image) }}" alt="{{ $brand->name }}"
                                            style="height: 50px; width: 50px;">
                                    </td>
                                    <td>
                                        {{ $brand->status == 1 ? 'Published' : 'Unpublished' }}
                                    </td>
                                    <td>
                                        <a href="{{ route('brand.edit', ['id' => $brand->id]) }}"
                                            class="btn btn-sm btn-primary" title="Edit Brand">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        @if ($brand->status == 1)
                                            <a href="{{ route('brand.status', ['id' => $brand->id]) }}"
                                                class="btn btn-sm btn-warning" title="Unpublish Brand">
                                                <i class="fa-solid fa-eye-slash"></i>
                                            </a>
                                        @else
                                            <a href="{{ route('brand.status', ['id' => $brand->id]) }}"
                                                class="btn btn-sm btn-success" title="Publish Brand">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                        @endif

                                        <form action="{{ route('brand.delete') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $brand->id }}">
                                            <button type="submit" class="btn btn-sm btn-danger" title="Delete Brand"
                                                onclick="return confirm('Delete This Brand? Action Cannot be Undone!')">
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
