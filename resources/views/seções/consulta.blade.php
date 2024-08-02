<!-- resources/views/solicitacoes/consulta.blade.php -->
@extends(auth()->check() ? 'layouts.user_type.auth' : 'layouts.user_type.guest')

@section('content')
<div class="container">
    <h1>Solicitações Recebidas</h1>
    
    @if ($solicitacoes->isEmpty())
        <p>Nenhuma solicitação encontrada.</p>
    @else
        <ul>
            @foreach ($solicitacoes as $solicitacao)
                <li>
                    <strong>Nome:</strong> {{ $solicitacao->name }}<br>
                    <strong>E-mail:</strong> {{ $solicitacao->email }}<br>
                    <strong>Descrição:</strong> {{ $solicitacao->message }}<br>
                    @if (!empty($solicitacao->attachments))
                        <strong>Anexos:</strong>
                        <ul>
                            @foreach (json_decode($solicitacao->attachments, true) as $file)
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
                </li>
                <hr>
            @endforeach
        </ul>
    @endif
</div>
@endsection