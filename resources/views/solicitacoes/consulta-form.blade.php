@extends('layouts.user_type.auth')

@section('content')
<div class="container">
    <h2>Consultar Solicitação</h2>
    <form action="{{ route('solicitacao.consultar') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="protocolo" class="form-label">Protocolo</label>
            <input type="text" class="form-control" id="protocolo" name="protocolo" required>
            @error('protocolo')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input type="password" class="form-control" id="password" name="password" required>
            @error('password')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Consultar</button>
    </form>
</div>
@endsection