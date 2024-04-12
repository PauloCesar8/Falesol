@extends('layouts.user_type.auth')

@section('content')


<div class="card text-center">
    <div class="card-header bg-warning">
        <h3 class="font-weight-bolder text-info text-gradient">O que deseja fazer?</h3>
    </div>
    <div class="card-body text-start">
        <select class="form-select" aria-label="Selecione uma opção">
            <option selected>Selecione uma opção</option>
            <option value="solicitacao">Solicitação</option>
            <option value="denuncia">Denúncia</option>
            <option value="reclamacao">Reclamação</option>
            <option value="elogio">Elogio</option>
        </select>  
        <label>Nome Completo:</label>
        <div class="mb-3">
            <input type="email" class="form-control" name="email" id="email" placeholder="" value="" aria-label="Email" aria-describedby="email-addon">
            @error('email')
            <p class="text-danger text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
        <label>Email</label>
        <div class="mb-3">
            <input type="password" class="form-control" name="password" id="password" placeholder="" value="" aria-label="Password" aria-describedby="password-addon">
            @error('password')
            <p class="text-danger text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
        <label>Mensagem</label>
        <div class="mb-3">
          <textarea class="form-control" name="mensagem" id="mensagem" rows="5" aria-label="Mensagem"></textarea>
            @error('email')
            <p class="text-danger text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
        <label for="anexos" class="form-label">Anexos:</label>
<input type="file" class="form-control" id="anexos" name="anexos[]" multiple accept="image/*, video/*, .pdf, .doc, .docx" style="height: 40px; padding: 0;">
<p class="form-text">Selecione foto, vídeo ou documentos para anexar (múltiplos arquivos são permitidos).</p>

        <div class="text-start">
            <a href="/Saúde" class="btn bg-warning w-100 mt-4 mb-0">CADASTRAR</a>
        </div>
        <div class="text-start">
            <a href="/serviços" class="btn w-100 mt-4 mb-0">CANCELAR</a>
        </div>
    </div>
    <div class="card-footer text-muted">
    </div>
  </div>
  
  




<div class="card card-header custom-card-header text-center mt-0">
    <div class="card">
    <div class="card-header">
    <h3 class="font-weight-bolder text-info text-gradient">O que deseja fazer?</h3>


@endsection