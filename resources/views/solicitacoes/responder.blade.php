@extends(auth()->check() ? 'layouts.user_type.auth' : 'layouts.user_type.guest')

@section('content')
<div class="container">
    <h2>Responder Solicitação</h2>
    <form action="{{ route('solicitacao.responder.salvar', $solicitacao->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="resposta" class="form-label">Resposta</label>
            <textarea class="form-control" id="resposta" name="resposta" rows="5" required></textarea>
            @error('resposta')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Enviar Resposta</button>
    </form>
</div>
@endsection