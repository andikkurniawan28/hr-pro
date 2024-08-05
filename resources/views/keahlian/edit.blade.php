@extends('template.master')

@section('title')
    {{ ucReplaceUnderscoreToSpace('keahlian') }}
@endsection

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit @yield('title')</h1>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('keahlian.update', $keahlian->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="nama">{{ ucReplaceUnderscoreToSpace('nama') }}</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="{{ $keahlian->nama }}" required>
                            </div>
                            <div class="modal-footer">
                                <a href="{{ route('keahlian.index') }}" class="btn btn-secondary">Batal</a>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
