@extends('layouts.dashboard')

@section('container')
    <div class="container mt-5">
        <h1 class="text-center mb-3">Tugas Hari Ini</h1>
        <div class="row justify-content-center">
            <div class="col-md-8">

                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <table class="table table-hover">
                    <!-- Show all datas -->
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tugas</th>
                            <th>Status</th>
                            <th>--</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $task)
                        <tr @if($task->finished) class="opacity" @endif>
                            <td >{{ $loop->iteration }}</td>
                            <td>{{ $task->task_name }}</td>
                            <td>
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" disabled @if ($task->finished) checked @endif>
                            </td>
                           <td>
                            <!-- Update Task -->
                            <form action="{{ route('update', $task->id) }}" method="post" class="d-inline">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="finished" value="1">
                                <button type="submit" class="badge bg-success border-0" @if ($task->finished) disabled @endif>
                                    <i class="bi bi-check2-circle"></i>
                                </button>
                            </form>
                            <form action="{{ route('destroy', $task->id) }}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="badge bg-danger border-0" onclick="return confirm('Anda yakin ingin menghapus tugas ini ?')">
                                    <i class="bi bi-trash3"></i>
                                </button>
                            </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary mb-5" data-bs-toggle="modal" data-bs-target="#ModalCreate">
                    Tugas Baru
                </button>
            </div>
        </div>
  
        <!-- Modal for Create -->
        <div class="modal fade" id="ModalCreate" tabindex="-1" aria-labelledby="ModalCreateLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Create new Task -->
                    <form action="{{ route('store') }}" method="post" autocomplete="off">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="ModalCreateLabel">Menambah Tugas Baru</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="task_name" class="form-label">Nama Tugas</label>
                                <input type="text" class="form-control" id="task_name_input" name="task_name" aria-describedby="emailHelp" autofocus>
                                <input type="hidden" name="finished" value="0">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End of Modal (Create) -->

    </div>
@endsection