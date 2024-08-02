@extends('layouts.user_type.auth')

@section('content')
<div class="container">
    <h2>Detalhes da Solicitação</h2>
    <p><strong>Nome:</strong> {{ $solicitacao->Nome }}</p>
    <p><strong>Email:</strong> {{ $solicitacao->email }}</p>
    <p><strong>Mensagem:</strong> {{ $solicitacao->mensagem }}</p>
    <p><strong>Telefone:</strong> {{ $solicitacao->telefone }}</p>
    <p><strong>Estado:</strong> 
        @if($solicitacao->verificador == 1)
            Em Aberto
        @elseif($solicitacao->verificador == 2)
            Em Análise
        @elseif($solicitacao->verificador == 3)
            Finalizado
        @endif
    </p>
   @if (!empty($solicitacao->anexos))
    <strong>Anexos:</strong>
    <ul>
        @foreach (json_decode($solicitacao->anexos, true) as $file)
            <li>
                @php
                    $extension = pathinfo($file, PATHINFO_EXTENSION);
                @endphp
                @if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'svg', 'bmp', 'webp']))
                    <img src="{{ asset('storage/' . $file) }}" alt="Anexo" style="max-width: 200px; max-height: 200px;">
                @else
                    <a href="{{ asset('storage/' . $file) }}" target="_blank">{{ $file }}</a>
                @endif
            </li>
        @endforeach
    </ul>
    @endif
    <a href="{{ route('solicitacao.responder', $solicitacao->id) }}" class="btn btn-primary">Responder</a>
</div>
@endsection