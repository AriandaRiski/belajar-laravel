@extends('/admin/v_homeadmin')
@section('title','ARTIKEL')
@section('content')
<style >
  .table-container{
    overflow: auto;
  }
</style>

<a href="/admin.add_artikel" class="btn btn-primary btn-sm">Add
</a>
<br>
@if (session('pesan'))
<div class="alert alert-success alert-dismissible">
    <h4><i class="icon fa fa-check"></i> {{session('pesan')}}</h4>
</div>
@endif


<br>
<div class="table-container">
<table class="table table-bordered ">
  <thead class="table-dark">
    <tr>
      <th >No</th>
      <th >Judul</th>
      <th >Isi Artikel</th>
      <th >Cover</th>
      <th >Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $No=1; ?>
    @foreach($artikel1 as $data)
<tr>
  <td>{{$No++}}</td>
  <td>{{$data->judul_artikel}}</td>
  <td>{!!$data->isi!!}</td>
  <td><img src="{{url('img/'.$data->cover)}}" width="100px"><br>{{$data->cover}}</td>
  <td>
    <a href="/admin/edit_artikel/{{$data->id_artikel}}" class="btn btn-sm btn-warning">
      <i class="nav-icon fas fa-pen"></i>
    </a>
    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-danger{{$data->id_artikel}}">
      <i class="nav-icon fas fa-trash"></i>
                  
    </button>
  </td>
</tr>
    @endforeach
  </tbody>
</table>
</div>


@foreach($artikel1 as $data)
 <div class="modal fade" id="modal-danger{{$data->id_artikel}}">
        <div class="modal-dialog">
          <div class="modal-content bg-danger">
            <div class="modal-header">
              <h4 class="modal-title">{{$data->judul_artikel}}</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>APAKAH ANDA YAKIN INGIN MENGHAPUS PRODUK INI ?</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">TIDAK</button>
              <a href="/admin/delete_artikel/{{$data->id_artikel}}" type="button" class="btn btn-outline-light">YA</a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
@endforeach
@endsection