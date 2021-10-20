@extends('/admin/v_homeadmin')
@section('title','Galeri')
@section('content')


<a href="/admin.add2" class="btn btn-primary btn-sm">Add</a>
<br>
@if (session('pesan'))
<div class="alert alert-success">
  <h4><i class="icon fa fa-check"> {{session('pesan')}}</i></h4>
</div>
@endif

<div style="overflow-x: auto;">
<table class="table table-bordered">
  <thead class="table-dark">
    <tr>
      <th >No</th>
      <th >Deskripsi</th>
      <th >Gambar</th>
      <th >Aksi</th>
    </tr>
  </thead>
  <tbody>
  	<?php $No=1; ?>
    @foreach($galeri2 as $data)
<tr>
	<td>{{$No++}}</td>
	<td>{{$data->deskripsi}}</td>
	<td><img src="{{url('img/'.$data->gambar)}}" width="100px"><br>{{$data->gambar}}</td>
	<td>
		<a href="/admin/edit_galeri/{{$data->id_galeri}}" class="btn btn-sm btn-warning">Edit</a>
    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-danger{{$data->id_galeri}}">
                  Delete
    </button>
	</td>
</tr>
    @endforeach
  </tbody>
</table>
</div>

@foreach($galeri2 as $data)
 <div class="modal fade" id="modal-danger{{$data->id_galeri}}">
        <div class="modal-dialog">
          <div class="modal-content bg-danger">
            <div class="modal-header">
              <h4 class="modal-title">{{$data->deskripsi}}</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>APAKAH ANDA YAKIN INGIN MENGHAPUS FOTO INI ?</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">TIDAK</button>
              <a href="/admin/delete_galeri/{{$data->id_galeri}}" type="button" class="btn btn-outline-light">YA</a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
@endforeach
@endsection