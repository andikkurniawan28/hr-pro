@extends('template.master')

@section('title')
    {{ ucReplaceUnderscoreToSpace('pendidikan') }}
@endsection

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Daftar @yield('title')</h1>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <button class="btn btn-sm btn-primary text-white" data-toggle="modal" data-target="#createModal">Tambah</button>
                            <br>
                            <table class="table table-hover" id="pendidikan-table" width="100%">
                                <thead>
                                    <tr>
                                        <th>{{ ucReplaceUnderscoreToSpace('ID') }}</th>
                                        <th>{{ ucReplaceUnderscoreToSpace('nama') }}</th>
                                        <th>{{ ucReplaceUnderscoreToSpace('tindakan') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Create Modal -->
        <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{ route('pendidikan.store') }}" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="createModalLabel">Tambah {{ ucReplaceUnderscoreToSpace('pendidikan') }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nama">{{ ucReplaceUnderscoreToSpace('nama') }}</label>
                                <input type="text" class="form-control" id="nama" name="nama" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            $(function () {
                $('#pendidikan-table').DataTable({
                    order: [
                        [0, 'desc']
                    ],
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('pendidikan.index') }}",
                    columns: [
                        { data: 'id', name: 'id' },
                        { data: 'nama', name: 'nama' },
                        { data: 'tindakan', name: 'tindakan', orderable: false, searchable: false },
                    ]
                });
            });

            document.addEventListener("DOMContentLoaded", function() {
                document.addEventListener('click', function(event) {
                    if (event.target.classList.contains('delete-btn')) {
                        event.preventDefault();
                        const button = event.target;
                        const pendidikan_id = button.getAttribute('data-id');
                        const pendidikan_nama = button.getAttribute('data-nama');
                        const csrfTokenElement = document.querySelector('meta[name="csrf-token"]');
                        if (!csrfTokenElement) {
                            console.error('CSRF token not found!');
                            return;
                        }
                        const csrfToken = csrfTokenElement.content;

                        Swal.fire({
                            title: 'Apakah Anda yakin?',
                            text: 'Anda tidak bisa mengembalikan data yang terhapus!',
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Ya, saya yakin!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                const form = document.createElement('form');
                                form.setAttribute('method', 'POST');
                                form.setAttribute('action', `{{ url('pendidikan') }}/${pendidikan_id}`);
                                form.setAttribute('style', 'display: none;'); // Optional: Hide the form

                                const hiddenMethod = document.createElement('input');
                                hiddenMethod.setAttribute('type', 'hidden');
                                hiddenMethod.setAttribute('name', '_method');
                                hiddenMethod.setAttribute('value', 'DELETE');

                                const csrfTokenInput = document.createElement('input');
                                csrfTokenInput.setAttribute('type', 'hidden');
                                csrfTokenInput.setAttribute('name', '_token');
                                csrfTokenInput.setAttribute('value', csrfToken);

                                form.appendChild(hiddenMethod);
                                form.appendChild(csrfTokenInput);
                                document.body.appendChild(form);
                                form.submit();
                            }
                        });
                    }
                });
            });
        </script>

    </div>
@endsection
