@extends('layouts.app')
@push('styles')
<style type="text/css">
  .card {
    margin-top: 0.5rem;
  }
</style>
@endpush
@section('content')

{{-- Modal Create Link --}}
<div class="modal fade" id="createLink">
  <div class="modal-dialog" role="document">
    <form method="post" action="{{ asset( route('links.store') ) }}">
      @csrf
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >New link</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
          <div class="form-group">
            <label class="col-form-label">Title:</label>
            <input type="text" class="form-control" name="title" placeholder="Title">
          </div>
          <div class="form-group">
            <label class="col-form-label">Url:</label>
            <input type="text" class="form-control" name="url" placeholder="Url">
          </div>
          <div class="form-group">
            <label class="col-form-label">Description:</label>
            <textarea class="form-control" rows="5" name="description" placeholder="Description"></textarea>
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </div>
    </form>
  </div>
</div>

{{-- Main --}}
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <a href="{{ asset( route('links.create')) }}" class="btn btn-primary" data-toggle="modal" data-target="#createLink" data-whatever="@mdo">Create link</a>
      <a href="{{ asset( route('links.import')) }}"><button class="btn btn-info">Import Excel</button></a>
      <a href="{{ asset( route('links.download')) }}" class="btn btn-success">Download Excel</a>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-md-8">
      @foreach ($links as $link)
      <div class="card">
        <div class="card-header">
          <a href="{{ $link->url }}">{{ $link->title }}</a>
        </div>
        <div class="card-body">
          {{ $link->description }}
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endsection

@push('scripts')
  <script>
    (function () {

      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      // $.ajax({

      // })
    });
  </script>
@endpush
