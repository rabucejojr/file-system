@extends('partials.app')
@section('content')
    <div class="col-12">
        <div class="container-fluid pt-4 px-4">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">File Summary</h6>
                <div class="px-0 w-25 my-2">
                    <form class="d-none d-md-flex ms-4" method="POST">
                        @csrf
                        <input class="form-control bg-dark border-0" type="search" name="Search" id="search"
                            placeholder="Search File">
                        <button class="btn btn-primary border-0 mx-2">Search</button>
                    </form>
                </div>
                <div class="table-responsive">
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Filename</th>
                                <th scope="col">Folder</th>
                                <th scope="col">Location</th>
                                <th scope="col">Description</th>
                                <th scope="col">Operation</th>
                            </tr>
                        </thead>
                        <tbody id="myTable">
                            {{-- loop to display db content --}}
                            @if (isset($files))
                                @foreach ($files as $file)
                                    <tr>
                                        <td>{{ $file->FileId }}</td>
                                        <td>{{ $file->Filename }}</td>
                                        <td>{{ $file->FileFolder }}</td>
                                        <td>{{ $file->FilePath }}</td>
                                        <td>{{ $file->FileDescription }}</td>
                                        <td>
                                            <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                                data-bs-target="#editModal">Edit</button>
                                            <button type="submit" class=" btn btn-primary">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- EDIT FILE MODAL --}}
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        function edit_info() {
            alert('clicked')
        };
    </script>
@endsection
