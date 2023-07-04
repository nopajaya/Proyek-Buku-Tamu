@extends('app')
@section('content')
<div class="card">
  @if (session('status'))
  <div class="alert alert-success">
  {{ session('status') }}
  </div>
  @endif
    <div class="card-header">
        Data Buku Tamu <a href="{{url('admin/form-tambah')}}" class="btn btn-success"> Tambah Data </a>
    </div>
    <div class="card-body">
        <table class="table" id ="myTable">
            <thead class="thead-dark">
              <tr>
                <th scope="col">No</th>
                <th scope="col">Tgl</th>
                <th scope="col">Nama</th>
                <th scope="col">Telepon</th>
                <th scope="col">Alamat</th>
                <th scope="col">Email</th>
                <th scope="col">keperluan</th>
                <th scope="col" style="width: 15%">Aksi</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $item)
              <tr>
                <th scope="row">{{$key+ 1}}</th>
                <td>{{ $item->created_at}}</td>
                <td>{{ $item->name}}</td>
                
                <td>{{ $item->tlp}}</td>
                <td>{{ $item->alamat}}</td>
                <td>{{ $item->email}}</td>
                <td>{{ $item->keperluan}}</td>
                <td>
                  <div class="row">
                    <div class="col-4">
                      <a href="{{url('admin/form-edit', $item->id)}}" class="btn btn-warning"> Edit </a>
                    </div>
                    <div class="col-4">
                      <form action="{{url('admin/hapus-data')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$item->id}}">
                        <button type="submit" class="btn btn-danger">Hapus</button>
                      </form>
                    </div>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
        </table>

        
   
     </div>
  </div>
@endsection


@section('script')
<script>
    $(document).ready( function () {
      $('#myTable').DataTable( {
    //"buttons": ['copy', 'excel', 'pdf']
    dom: 'Bfrtip',
        buttons: [
            'print','excel','pdf'
        ]

} );
} );
</script>
@endsection
