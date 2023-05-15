@extends('templates/header')
@push('style')
  <link rel="stylesheet" href="{{ asset('assets') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('assets') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('assets') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('assets') }}/plugins/toastr/toastr.min.css">
@endpush

@section('content')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pegawai</h1>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-sm-create">
              Tambah Pegawai
            </button>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Pegawai</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tabel Pegawai</h3>
              </div>

              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Golongan</th>
                    <th>Jabatan</th>
                    <th>Jenis Kelamin</th>
                    <th>Pangkat</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($result as $row)
                      <tr>
                        <td>{{ !empty($i) ? ++$i : $i = 1 }}</td>
                        <td>{{ $row->nip }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->golongan->golongan }}</td>
                        <td>{{ $row->jabatan->jabatan }}</td>
                        <td>{{ $row->jeniskelamin }}</td>
                        <td>{{ $row->pangkat->pangkat }}</td>
                        <td>
                          <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal-sm" data-id="{{ $row->id }}" data-pangkat="{{ $row->pangkat }}"><i class="fa fa-edit"> Edit</i></button>
                          <form action="{{ url("pangkat/$row->id/delete") }}" method="post" style="display: inline;">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn btn-sm btn-danger"><i class="fa fa-trash"> Hapus</i></button>
                          </form>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>

    <div class="modal fade" id="modal-sm-create">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Tambah Pegawai</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="{{ url('pegawai/store') }}" method="POST">
              {{ csrf_field() }}
              <div class="card-body">
                <div class="form-group">
                  <label for="pangkat">NIP</label>
                  <input type="text" class="form-control" id="nip" placeholder="Masukan NIP" name="nip">
                </div>
                <div class="form-group">
                  <label for="pangkat">Nama</label>
                  <input id="name" type="text" class="form-control" placeholder="Masukan Nama" name="name">
                </div>

                <div class="custom-control custom-radio">
                  <input class="custom-control-input" type="radio" id="perempuan" name="jeniskelamin" value="Perempuan">
                  <label for="perempuan" class="custom-control-label">Perempuan</label>
                </div>
                <div class="custom-control custom-radio">
                  <input class="custom-control-input" type="radio" id="lakilaki" name="jeniskelamin" value="Laki Laki">
                  <label for="lakilaki" class="custom-control-label">Laki Laki</label>
                </div>
                <div class="form-group">
                  <label>Golongan</label>
                  <select class="custom-select">
                    <option hidden>Pilih Golongan</option>
                    @foreach (\App\Models\Golongan::all() as $golongan)
                      <option value="{{ $golongan->id }}">{{ $golongan->golongan }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label>Jabatan</label>
                  <select class="custom-select">
                    <option hidden>Pilih Jabatan</option>
                    @foreach (\App\Models\Jabatan::all() as $jabatan)
                      <option value="{{ $jabatan->id }}">{{ $jabatan->jabatan }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label>Pangkat</label>
                  <select class="custom-select">
                    <option hidden>Pilih Pangkat</option>
                    @foreach (\App\Models\Pangkat::all() as $pangkat)
                      <option value="{{ $pangkat->id }}">{{ $pangkat->pangkat }}</option>
                    @endforeach
                  </select>
                </div>




              </div>
              <!-- /.card-body -->


          </div>
          <div class="modal-footer justify-content-between">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </form>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>



    <div class="modal fade" id="modal-sm">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Ubah Pegawai</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="{{ url('pangkat/update') }}" method="POST">
              {{ csrf_field() }}
              {{ method_field('patch') }}
              <div class="card-body">
                <div class="form-group">
                  <label for="pangkat">Pangkat</label>
                  <input id="id" type="hidden" name="id">
                  <input id="pangkat" type="text" class="form-control" id="pangkat" placeholder="Masukan pangkat" name="pangkat">
                </div>
              </div>
              <!-- /.card-body -->


          </div>
          <div class="modal-footer justify-content-between">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </form>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
@endsection
@push('script')
    <script src="{{ asset('assets') }}/plugins/toastr/toastr.min.js"></script>
    <script>
        @if(session('success'))
            toastr.success("{{ session()->get('success') }}")
        @endif
    </script>
    <script src="{{ asset('assets') }}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/jszip/jszip.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script>
      $('#modal-sm').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget);
          var id = button.data('id');
          var pangkat = button.data('pangkat');
          var modal = $(this);
          modal.find('#id').val(id);
          modal.find('#pangkat').val(pangkat);
      });
  </script>
    <script>
        $(function () {
            $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            });
        });
    </script>
@endpush
