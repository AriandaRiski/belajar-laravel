@extends('admin/v_homeadmin')
@section('title','Edit Galeri')
@section('content')

<form action="/admin/update_galeri/{{$data_galeri->id_galeri}}" method="POST" enctype="multipart/form-data">
	@csrf

	<div class="content">
		<div class="row">
			<div class="col-sm-6">
				
				<div class="form-group">
					<label>Deskripsi Foto</label>
					<input class="form-control" name="deskripsi" value="{{$data_galeri->deskripsi}}">
				<div class="text-danger">
					@error('deskripsi')
					{{$message}}
					@enderror
				</div>
				</div>
					
							<div class="form-group">
								<label>Foto </label>
								<br>
						<img src="{{url('img/'.$data_galeri->gambar)}}" width="150px">

								<input type="file" class="form-control" name="gambar" value="	{{$data_galeri->gambar}}">
									<div class="text-danger">
								@error('gambar')
								{{$message}}
								@enderror
									</div>
							</div>
						

				<div class="form-group">
					<button class="btn btn-primary">Save</button>
					<a href="/admin.galeryadmin" class="btn btn-danger">Cancel</a>
				</div>				


			</div>			
		</div>		
	</div>
</form>
<br>
<br><br>
<br><br>

@endsection