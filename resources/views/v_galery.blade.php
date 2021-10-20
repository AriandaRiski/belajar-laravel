@extends('v_template')
@section('content')
<header>
  
  <div class="collapse bg-dark" id="navbarHeader"></div>
  <div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container">
      <a href="#" class="navbar-brand d-flex align-items-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2" viewBox="0 0 24 24"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
        <strong>Galery</strong>
      </a>

    </div>
  </div>
</header>

<main>
  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        @foreach ($galeri as $data)
<div class="col">
          <div class="card shadow-sm">
            <title>GALERY</title>
            <button type="button" class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#exampleModalFullscreen-{{$data->id_galeri}}"><img src="{{ url('img/'.$data->gambar )}}" width="100%" height="400" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"></button>
            <div class="card-body">
              <p class="card-text">{{$data->deskripsi}}</p>
    <article class="my-3" id="modal">
        <div>
        <div class="bd-example">
        <div class="d-flex justify-content-between flex-wrap">
          <!--<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalFullscreen-{{$data->id_galeri}}">Full</button> 

          <a href="/galery/detail/{{ $data->id_galeri }}"  type="button" class="btn btn-primary">Open</a> -->

        </div>
        </div>
      </div>
    </article>




            </div>
          </div>
        </div>

        @endforeach

        @foreach($galeri as $gal)
<div class="modal fade" id="exampleModalFullscreen-{{$gal->id_galeri}}" tabindex="-1" aria-labelledby="exampleModalFullscreenLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <center><img src="{{ url('img/'.$gal->gambar)}}" style="width: 30%"></center>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
        @endforeach

          </div>
        </div>
      </div>

</main>



@endsection