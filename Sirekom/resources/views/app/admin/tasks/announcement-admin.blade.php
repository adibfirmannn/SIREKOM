<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi</title>
    <script>
        function handleTypeChange() {
            var typeSelect = document.getElementById('typeSelect');
            var deadlineField = document.getElementById('deadlineField');
            if (typeSelect.value === 'Task') {
                deadlineField.style.display = 'block';
            } else {
                deadlineField.style.display = 'none';
            }
        }
    </script>
</head>
<body>
@extends('layouts.app')
@section('content')
    <div class="container">
        <h4 class="text-center mt-3 text-white">TAMBAH DATA</h4>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-3 mb-5">
                    <div class="card-body">
                        <form action="{{ route('tasks.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="row justify-content-around">
                                <div class="col-md-5">
                                    <div class="mb-3">
                                        <label for="id" class="form-label fw-bold">Id Task</label>
                                        <input value="{{$lomba}}" type="number" hidden 
                                            id="id" name="id">
                                    </div>
                                    <div class="mb-3">
                                        <label for="judul" class="form-label fw-bold">Judul Task</label>
                                        <input type="text" class="form-control @error('judul') is-invalid @enderror"
                                            id="judul" name="judul">
                                        @error('judul')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="deskripsi" class="form-label fw-bold">Deskripsi Task</label>
                                        <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi"
                                            rows="5"></textarea>
                                        @error('deskripsi')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="tanggal_buka" class="form-label fw-bold">Tanggal Buka
                                            Task</label>
                                        <input type="date"
                                            class="form-control @error('tanggal_buka') is-invalid @enderror"
                                            id="tanggal_buka" name="tanggal_buka">
                                        @error('tanggal_buka')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="typeSelect" class="form-label fw-bold">Select Type</label>
                                        <select class="form-control" id="typeSelect" name="type" onchange="handleTypeChange()">
                                            <option value="Announcement">Announcement</option>
                                            <option value="Task">Task</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="lampiran" class="form-label fw-bold">Input File</label>
                                        <input type="file" class="form-control @error('lampiran') is-invalid @enderror"
                                            id="lampiran" name="lampiran">
                                        @error('lampiran')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3" id="deadlineField" style="display: none;">
                                        <label for="tanggal_deadline" class="form-label fw-bold">Tanggal Deadline</label>
                                        <input type="date" class="form-control" id="tanggal_deadline" name="tanggal_deadline">
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary"
                                    style="background-color: #922E2C; border-radius: 10px; width: 362px; height: 48px; color: white;">
                                    Submit Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
</body>
</html>
