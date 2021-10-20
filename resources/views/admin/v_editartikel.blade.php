@extends('admin/v_homeadmin')
@section('title','Edit Artikel')
@section('content')

<form action="/admin/update_artikel/{{$artikel1->id_artikel}}" method="POST" enctype="multipart/form-data">
	@csrf

	<div class="content">
		<div class="row">
			<div class="col">
				
				<div class="form-group">	
				<label>Cover</label>
					<br>
					<img src="{{url('img/'.$artikel1->cover)}}" width="150px">
						<input type="file" class="form-control" name="cover" value="{{$artikel1->cover}}">
							<div class="text-danger">
								@error('cover')
								{{$message}}
								@enderror
							</div>	
				</div>	

				<div class="form-group">
				<label>Judul Artikel</label>
				<input class="form-control" name="judul_artikel" value="{{$artikel1->judul_artikel}}">
				<div class="text-danger">
					@error('judul_artikel')
					{{$message}}
					@enderror
				</div>
				</div>

				<div class="form-group">
					<label>Isi Artikel</label>
					<textarea class="form-control" id="edit" name="isi" value="{{$artikel1->isi}}">
					</textarea>
				<div class="text-danger">
					@error('isi')
					{{$message}}
					@enderror
				</div>
				</div>	

				<div class="form-group">
					<button class="btn btn-primary">Save</button>
					<a href="/admin.artikel" class="btn btn-danger">Cancel</a>
				</div>				


			</div>			
		</div>		
	</div>
</form>
<br>
<br><br>
<br><br>

<!--<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
   CKEDITOR.replace('editor');
</script>
-->
<script src="https://cdn.ckeditor.com/ckeditor5/29.1.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#edit' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endsection