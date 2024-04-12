@extends('layouts.user_type.auth')

@section('content')
<div class="row">
    @foreach ($services as $service)
    <div class="col-lg-6 mb-2">
      <div class="bg-light border rounded p-3 d-flex align-items-center justify-content-between">
        <h5 class="text-dark font-weight-bolder">{{$service->name}}</h5>
        <i class="fas fa-arrow-right text-sm" aria-hidden="true"></i>
      </div>
    </div>
  @endforeach
  </div>    

@endsection

