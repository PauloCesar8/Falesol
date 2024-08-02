@extends(auth()->check() ? 'layouts.user_type.auth' : 'layouts.user_type.guest')

@section('content')
@<div class="container">
    <h1 class="text-center mb-4">Consultar Todas Solicitações</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="GET" action="{{ route('consultar.todas') }}" class="mb-4">
        <div class="form-group">
            <label for="estado">Filtrar por:</label>
            <select name="estado" id="estado" class="form-control">
                <option value="">Todos</option>
                <option value="1" {{ request('estado') == '1' ? 'selected' : '' }}>Em Aberto</option>
                <option value="2" {{ request('estado') == '2' ? 'selected' : '' }}>Em Análise</option>
                <option value="3" {{ request('estado') == '3' ? 'selected' : '' }}>Finalizado</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Filtrar</button>
    </form>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Mensagem</th>
                    <th>Anexos</th>
                    <th>Estado</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($solicitacoes as $solicitacao)
                    <tr>
                        <td>{{ $solicitacao->id }}</td>
                        <td>{{ $solicitacao->nome }}</td>
                        <td>{{ $solicitacao->email }}</td>
                        <td>{{ $solicitacao->telefone }}</td>
                        <td>{{ $solicitacao->mensagem }}</td>
                        <td>
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
                        </td>
                        <td>
                            @if($solicitacao->verificador == 1)
                                Em Aberto
                            @elseif($solicitacao->verificador == 2)
                                Em Análise
                            @else
                                Finalizado
                            @endif
                        </td>
                        <td>
                            <form method="POST" action="{{ route('mudar.estado', $solicitacao->id) }}" class="mb-2">
                                @csrf
                                <select name="verificador" class="form-control">
                                    <option value="1" {{ $solicitacao->verificador == 1 ? 'selected' : '' }}>Em Aberto</option>
                                    <option value="2" {{ $solicitacao->verificador == 2 ? 'selected' : '' }}>Em Análise</option>
                                    <option value="3" {{ $solicitacao->verificador == 3 ? 'selected' : '' }}>Finalizado</option>
                                </select>
                                <button type="submit" class="btn btn-warning mt-2">Mudar Estado</button>
                            </form>
                            <button class="btn btn-info" data-toggle="modal" data-target="#responderModal{{ $solicitacao->id }}">Responder</button>

                            <!-- Modal -->
                            <div class="modal fade" id="responderModal{{ $solicitacao->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Responder Solicitação</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form method="POST" action="{{ route('responder.solicitacao', $solicitacao->id) }}">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="resposta">Resposta</label>
                                                    <textarea name="resposta" id="resposta" class="form-control" rows="4"></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                                <button type="submit" class="btn btn-primary">Enviar Resposta</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection