@extends('admin/v_homeadmin')
@section('title','Edit Produk')
@section('content')

<form action="/admin/update/{{$data_produk->id_produk}}" method="POST" enctype="multipart/form-data">
	@csrf

	<div class="content">
		<div class="row">
			<div class="col-sm-6">
				
				<div class="form-group">
					<label>Nama Produk</label>
					<input class="form-control" name="judul" value="{{$data_produk->judul}}">
				<div class="text-danger">
					@error('judul')
					{{$message}}
					@enderror
				</div>
				</div>

				<div class="form-group">
					<label>Deskripsi Produk</label>
					<input class="form-control" name="deskripsi" value="{{$data_produk->deskripsi}}">
				<div class="text-danger">
					@error('deskripsi')
					{{$message}}
					@enderror
				</div>
				</div>
					
							<div class="form-group">
								<label>Gambar Produk</label>
								<br>
						<img src="{{url('img/'.$data_produk->gambar_produk)}}" width="150px">

								<input type="file" class="form-control" name="gambar_produk" value="	{{$data_produk->gambar_produk}}">
									<div class="text-danger">
								@error('gambar_produk')
								{{$message}}
								@enderror
									</div>
							</div>
						

				<div class="form-group">
					<button class="btn btn-primary">Save</button>
					<a href="/admin.produk" class="btn btn-danger">Cancel</a>
				</div>				


			</div>			
		</div>		
	</div>
</form>
<br>
<br><br>
<br><br>

@endsection