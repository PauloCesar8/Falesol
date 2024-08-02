@extends(auth()->check() ? 'layouts.user_type.auth' : 'layouts.user_type.guest')

@section('content')
<div class="card text-center">
    <div class="card-header">
        <h3 class="font-weight-bolder text-black">O que deseja fazer?</h3>
    </div>
    <div class="card-body text-start">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <select class="form-select" aria-label="Selecione uma opção">
            <option value="reclamacao">Reclamação</option>
            <option value="denuncia">Denúncia</option>
            <option value="solicitacao">Solicitação</option>
            <option value="elogio">Elogio</option>
        </select>
        <form action="{{ route('form.salvar') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label>Enviar anonimamente?</label>
                <select class="form-select" name="anonimo" id="anonimo" aria-label="Enviar anonimamente?">
                    <option value="no" selected>Não</option>
                    <option value="yes">Sim</option>
                </select>
            </div>
            <div id="campos-nao-anonimos">
                <label>Nome Completo:</label>
                <div class="mb-3">
                    <input type="text" class="form-control" name="nome" id="nome" aria-label="Nome Completo">
                    @error('nome')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <label>Email</label>
                <div class="mb-3">
                    <input type="email" class="form-control" name="email" id="email" aria-label="Email">
                    @error('email')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <label>Telefone</label>
                <div class="mb-3">
                    <input type="text" class="form-control" name="telefone" id="telefone" aria-label="Telefone">
                    @error('telefone')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <label>Mensagem</label>
            <div class="mb-3">
                <textarea class="form-control" name="mensagem" id="mensagem" rows="5" aria-label="Mensagem"></textarea>
                @error('mensagem')
                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
            <label for="anexos" class="form-label">Anexos:</label>
            <input type="file" class="form-control" id="anexos" name="anexos[]" multiple accept="image/*,video/*,.pdf,.doc,.docx" style="height: 40px; padding: 0;">
            <p class="form-text">Selecione foto, vídeo ou documentos para anexar (múltiplos arquivos são permitidos).</p>
            <div class="text-start">
                <button type="submit" class="btn bg-warning w-100 mt-4 mb-0">CADASTRAR</button>
            </div>
            <div class="text-start">
                <a href="/dashboard" class="btn w-100 mt-4 mb-0">VOLTAR</a>
            </div>
        </form>
    </div>
</div>

<script>
document.getElementById('anonimo').addEventListener('change', function () {
    var camposNaoAnonimos = document.getElementById('campos-nao-anonimos');
    if (this.value === 'yes') {
        camposNaoAnonimos.style.display = 'none';
    } else {
        camposNaoAnonimos.style.display = 'block';
    }
});
</script>
@endsection

