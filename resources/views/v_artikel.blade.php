@extends('v_template');
@section('content')
<main class="container">
  <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
    <div class="col-md-6 px-0">
      <h1 class="display-4 fst-italic">Title of a longer featured blog post</h1>
      <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what’s most interesting in this post’s contents.</p>
      <p class="lead mb-0"><a href="#" class="text-white fw-bold">Continue reading...</a></p>
    </div>
  </div>

@foreach($artikel1 as $data)
  <div class="row mb-2">
    <div class="col-md-6">
      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-primary">World</strong>
          <h3 class="mb-0">{{$data->judul_artikel}}</h3>
          <div class="mb-1 text-muted">{{$data->tanggal}}</div>
          <p class="card-text mb-auto">{!!substr($data->isi,0,100)!!}...</p>
           <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal-{{$data->id_artikel}}">Continue reading</a>

        </div>
        <div class="col-auto d-none d-lg-block">
          <img src="{{ url('img/'.$data->cover )}}" class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" preserveAspectRatio="xMidYMid slice" focusable="false"><title>ARTIKEL</title>

        </div>


      </div>
    </div> 
  </div>
@endforeach
</main>

@foreach($artikel1 as $artikel)
<!-- Modal -->
<div class="modal fade" id="exampleModal-{{$artikel->id_artikel}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{$artikel->judul_artikel}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <center><img src="{{ url('img/'.$artikel->cover )}}" width="100%"></center>
        <p>{!!$artikel->isi!!}</p>
      </div>
      <div class="modal-footer">
       
      </div>
    </div>
  </div>
</div>
@endforeach



  @endsection
