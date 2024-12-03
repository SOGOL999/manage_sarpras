@extends('templates.main')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Student</h3>
                <ul class="breadcrumbs mb-3">
                    <li class="nav-home">
                        <a href="#">
                            <i class="icon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Form</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Edit</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <div class="card-title">Student Edit</div>
                                <a href="{{ route('student.index') }}" class="btn btn-primary btn-sm">Return</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <form action="{{ route('student.update', $student->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group mb-2">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" id="name" value="{{ $student->name }}" class="form-control" autofocus>
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="classroom">Classroom</label>
                                        <select name="classroom_id" id="classroom" class="form-select">
                                            <option selected disabled>- Choose Classroom -</option>
                                            @foreach ($classroom as $item)
                                                <option {{ $item->id == $student->classroom_id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->name ?? 'no class data' }}</option>
                                            @endforeach
                                        </select>
                                        @error('classroom')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <button class="btn btn-success btn-sm mx-2">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
