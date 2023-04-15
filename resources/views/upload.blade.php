@extends('partials.app')
@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-3"></div>
            <div class="col-sm-12 col-xl-6">
                <div class="bg-secondary rounded h-200 p-4">
                    <h6 class="mb-4">File Upload Form</h6>
                    @if (isset($Success))
                        <div class="alert alert-success" role="alert">
                            {{ $Success }}
                        </div>
                    @elseif(isset($Error))
                        <div class="alert alert-danger" role="alert">
                            {{ $Error }}
                        </div>
                    @endif
                    {{-- FILE UPLOAD FORM --}}
                    <form method="POST" action="{{ route('store') }}">
                        @csrf
                        {{-- PROGRAM TYPE --}}
                        <select class="form-select mb-3" aria-label="Default select example" name="FileFolder">
                            aria-placeholder="Folder Location">
                            <option value="SETUP">SETUP</option>
                            <option value="GIA">GIA</option>
                            <option value="OTHERS">OTHERS</option>
                        </select>
                        {{-- FILENAME --}}
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Filename" name="Filename">
                            <label for="floatingInput">Filename</label>
                        </div>
                        {{-- DESCRIPTION --}}
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Description"
                                name="FileDescription">
                            <label for="floatingInput">Description</label>
                        </div>
                        
                        {{-- LOCATION --}}
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Location"
                                name="FilePath">
                            <label for="floatingInput">Location</label>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary ">Upload</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-12 col-xl-3"></div>
        </div>
    </div>
@endsection
