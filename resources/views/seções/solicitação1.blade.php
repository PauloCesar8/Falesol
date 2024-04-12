@extends('layouts.user_type.auth')

@section('content')

<main class="main-content  mt-0">
  <section>
    <div class="page-header min-vh-90">
      <div class="container">
        <div class="row">
          <div class="col-x1-2 col-lg-5 col-md-6 d-flex flex-column mx-auto">
            <div class="card card-plain mt-0">
                <h3 class="font-weight-bolder text-info text-gradient">O que deseja fazer?</h3>
                <div class="row ls-md-margin-top" data-select2-id="16">
                  <fieldset data-select2-id="15">
                    <div class="col-md-6" data-select2-id="14">
                      <div class="select required cidadao_manifestacao_tipo_manifestacao" data-select2-id="13">
                        <label class="ls-label" data-select2-id="12">
                          <b class="ls-label-text"><abbr title="Obrigatório">*</abbr> Tipo de Manifestação</b>
                          <p class="ls-label-info"></p>
                          <select class="select required select2-tipo-manifestacao select2-hidden-accessible" name="cidadao_manifestacao[tipo_manifestacao_id]" id="cidadao_manifestacao_tipo_manifestacao_id" data-select2-id="cidadao_manifestacao_tipo_manifestacao_id" tabindex="-1" aria-hidden="true">
                            <option value="" data-select2-id="2"></option>
                            <option data-description="Elogio" data-info="Demonstração, reconhecimento ou satisfação sobre o serviço oferecido ou atendimento recebido." value="1" data-select2-id="23">Elogio</option>
                            <option data-description="Denúncia" data-info="Comunicação de prática de ato ilícito cuja solução dependa da atuação dos órgãos apuratórios competentes." value="2" data-select2-id="24">Denúncia</option>
                            <option data-description="Reclamação" data-info="Demonstração de insatisfação relativa ao serviço público prestado." value="3" data-select2-id="25">Reclamação</option>
                            <option data-description="Solicitação" data-info="Solicitação de esclarecimentos e/ou dados sobre assuntos pertinentes aos órgãos e/ou serviços prestados pela Administração Pública Municipal." value="4" data-select2-id="26">Solicitação</option>
                            <option data-description="Sugestão" data-info="proposição de ideia ou formulação de proposta de aprimoramento de políticas e serviços prestados pela administração pública municipal." value="5" data-select2-id="27">Sugestão</option>
                          </select>
                          <span class="select2 select2-container select2-container--default select2-container--below" dir="ltr" data-select2-id="1" style="width: 100%;">
                            <span class="selection">
                              <span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-cidadao_manifestacao_tipo_manifestacao_id-container">
                                <span class="select2-selection__rendered" id="select2-cidadao_manifestacao_tipo_manifestacao_id-container" role="textbox" aria-readonly="true">
                                    <span class="select2-selection__placeholder">Selecione um Tipo</span>
                                </span>
                                <span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span>
                              </span>
                            </span>
                          <span class="dropdown-wrapper" aria-hidden="true"></span>
                        </span>
                      </label>
                    </div>
                  </div>
                </fieldset>
              </div>
            </div>
            <div class="card-body">      
                @csrf
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
                <label>Assunto</label>
                <div class="mb-3">
                  <textarea class="form-control" name="mensagem" id="mensagem" rows="5" aria-label="Mensagem"></textarea>
                    @error('email')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <label>Mensagem</label>
                <div class="mb-3">
                    <input type="email" class="form-control" name="email" id="email" aria-label="Email" aria-describedby="email-addon">
                    @error('email')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                <div class="mb-3">
                  <label for="anexos" class="form-label">Anexos:</label>
                  <input type="file" class="form-control" id="anexos" name="anexos[]" multiple accept="image/*, video/*, .pdf, .doc, .docx">
                  <p class="form-text">Selecione foto, vídeo ou documentos para anexar (múltiplos arquivos são permitidos).</p>
                </div>
                <div class="text-start">
                    <a href="/Saúde" class="btn bg-gradient-info w-100 mt-4 mb-0">SALVAR</a>
                </div>    
            </div>
          </div>
        </div>
       </div>
      </div>
    </div>
  </section>
</main>
@endsection
