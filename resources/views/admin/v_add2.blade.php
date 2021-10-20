@extends('/admin/v_homeadmin')
@section('title','Add2')
@section('content')
<br>
<form action="/admin.insert2" method="POST" enctype="multipart/form-data">
	@csrf

	<div class="content">
		<div class="row">
			<div class="col-sm-4">
				
				<div class="form-group">
					<label>Deskripsi Foto</label>
					<input class="form-control" name="deskripsi" value="{{old('deskripsi')}}">
				<div class="text-danger">
					@error('deskripsi')
					{{$message}}
					@enderror
				</div>
				</div>

				<div class="form-group">
					<label>Foto</label>
					<input type="file" class="form-control" name="gambar" value="{{old('gambar')}}">
				<div class="text-danger">
					@error('gambar')
					{{$message}}
					@enderror
				</div>
				</div>

				<div class="form-group">
					<button class="btn btn-primary">Save</button>
					<a href="/admin.galeri" class="btn btn-danger">Cancel</a>
				</div>				


			</div>			
		</div>		
	</div>
</form>
<br>
<br><br>
<br><br>


@endsection