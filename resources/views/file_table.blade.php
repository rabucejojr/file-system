@extends('partials.app')
@section('content')
    <div class="col-12">
        <div class="container-fluid pt-4 px-4">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">File Summary</h6>
                <div class="px-0 w-25 my-2">
                    <form class="mx-0 ms-8 d-flex" action="" method="POST">
                        @csrf
                        <input class="form-control bg-dark border-0" type="search" name="Search" placeholder="Search File">
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
                            </tr>
                        </thead>
                        <tbody>
                            {{-- loop to display db content --}}
                            @foreach ($files as $file)
                                <tr>
                                    <td>{{ $file->FileId }}</td>
                                    <td>{{ $file->Filename }}</td>
                                    <td>{{ $file->FileFolder }}</td>
                                    <td>{{ $file->FilePath }}</td>
                                    <td>{{ $file->FileDescription }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
