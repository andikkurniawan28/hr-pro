<!-- Bootstrap core JavaScript-->
<script src="/sbadmin2/vendor/jquery/jquery.min.js"></script>
<script src="/sbadmin2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Datatables -->
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.1.3/js/dataTables.js"></script>

<!-- Core plugin JavaScript-->
<script src="/sbadmin2/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="/sbadmin2/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="/sbadmin2/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
{{-- <script src="/sbadmin2/js/demo/chart-area-demo.js"></script>
<script src="/sbadmin2/js/demo/chart-pie-demo.js"></script> --}}

<!-- Sweet Alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<!-- Select2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<!-- Bootstrap Select JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0/js/bootstrap-select.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Sukses',
                text: '{{ session('success') }}',
            });
        @endif
        @if (session('fail'))
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: '{{ session('fail') }}',
            });
        @endif
        @if ($errors->any())
            Swal.fire({
                icon: 'error',
                title: 'Error',
                html: `
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              `,
            });
        @endif
    });
</script>
