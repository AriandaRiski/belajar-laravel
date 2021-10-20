@extends('/admin/v_homeadmin')
@section('title','Add')
@section('content')
<br>
<form action="/admin.insert" method="POST" enctype="multipart/form-data">
	@csrf

	<div class="content">
		<div class="row">
			<div class="col-sm-4">
				
				<div class="form-group">
					<label>Nama Produk</label>
					<input class="form-control" name="judul" value="{{old('judul')}}">
				<div class="text-danger">
					@error('judul')
					{{$message}}
					@enderror
				</div>
				</div>

				<div class="form-group">
					<label>Deskripsi Produk</label>
					<input class="form-control" name="deskripsi" value="{{old('deskripsi')}}">
				<div class="text-danger">
					@error('deskripsi')
					{{$message}}
					@enderror
				</div>
				</div>

				<div class="form-group">
					<label>Gambar Produk</label>
					<input type="file" class="form-control" name="gambar_produk" value="{{old('gambar_produk')}}">
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