@extends('dashboard.layouts.main')

@section('css')
<style>
.container {
  display: flex;
}
.container.space-between {  
  justify-content: space-between;
}
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">

@endsection

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">List Kamera</h1>
</div>

@if (session()->has('delete'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('delete') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="table-responsive col-lg-9 p-1">

    <table class="table table-striped table-sm mt-3" id="transaksi">
        <thead>
            <tr>
                <th style="text-align: center" scope="col">#</th>
                <th style="text-align: center" scope="col">Kamera</th>
                <th style="text-align: center" scope="col">Deskripsi</th>
                <th style="text-align: center" scope="col">Gambar</th>
                <th style="text-align: center" scope="col">Status</th>
                <th style="text-align: center" scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kameras as $kamera)
            <tr>
                <td style="text-align: center">{{ $loop->iteration }}</td>
                <td class="text-center">{{ $kamera->kamera}}</td>
                <td class="text-center">{{ $kamera->deskripsi }}</td>
                <td><img src="{{ ('images/'.$kamera->gambar) }}" style="width:180px;height:140px;" border="3"></td>
                <td class="text-center">{{ $kamera->status }}</td>
                <td>
                    <form action="{{ route('deletecamera',$kamera->id) }}" method="POST">
                        @csrf
                        <div class="btn-group" role="group">
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')">Delete</button>
                    </div>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready( function () {
      $('#transaksi').DataTable();
    });
</script>
