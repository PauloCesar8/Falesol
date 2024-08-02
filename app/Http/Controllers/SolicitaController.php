<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Solicitacoes;
use Illuminate\Support\Str;

class SolicitaController extends Controller
{
    public function index(Request $request)
    {
        $estado = $request->input('estado');
        $solicitacoes = Solicitacoes::when($estado, function ($query, $estado) {
            return $query->where('verificador', $estado);
        })->get();

        return view('solicitacoes.painel-solicita', compact('solicitacoes', 'estado'));
    }

    public function mudarEstado(Request $request, $id)
    {
        $solicitacao = Solicitacoes::findOrFail($id);
        $solicitacao->verificador = $request->input('verificador');
        $solicitacao->save();

        return redirect()->route('consultar.todas')->with('success', 'Estado da solicitação atualizado com sucesso!');
    }

    public function responder(Request $request, $id)
    {
        $solicitacao = Solicitacoes::findOrFail($id);
        $solicitacao->resposta = $request->input('resposta');
        $solicitacao->save();

        return redirect()->route('consultar.todas')->with('success', 'Resposta enviada com sucesso!');
    }

    public function salvar(Request $request)
    {
        // Validação dos dados do formulário
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'mensagem' => 'required|string',
            'anexos.*' => 'nullable|file|mimes:jpg,jpeg,png,bmp,gif,svg,webp,avi,mp4,mkv,mov,pdf,doc,docx|max:10240',
            'telefone' => 'nullable|string|max:20',
        ]);

        $protocolo = strtoupper(Str::random(8)); // 8 caracteres alfanuméricos
        $password = Str::random(6); // 6 caracteres alfanuméricos

        // Criar a solicitação sem os anexos
        $solicitacao = Solicitacoes::create([
            'nome' => $request->input('nome'),
            'email' => $request->input('email'),
            'mensagem' => $request->input('mensagem'),
            'telefone' => $request->input('telefone'),
            'protocolo' => $protocolo,
            'password' => $password,
            'verificador' => 1, // Estado inicial "Em Aberto"
        ]);

        // Processar e salvar os arquivos anexados
        if ($request->hasFile('anexos')) {
            $anexos = $request->file('anexos');
            $savedFiles = [];
            foreach ($anexos as $file) {
                $uniqueFileName = Str::uuid() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('anexos', $uniqueFileName, 'public');
                $savedFiles[] = $path;
            }
            $solicitacao->anexos = json_encode($savedFiles);
            $solicitacao->save();
        }

        // Redirecionar com mensagem de sucesso contendo o protocolo e a senha
        return redirect()->back()->with('success', 'Solicitação criada com sucesso! Seu protocolo é ' . $protocolo . ' e sua senha é ' . $password);
    }
    public function showConsultaForm()
    {
        return view('solicitacoes.consulta-form');
    }

    public function consultarSolicitacao(Request $request)
    {
        $validatedData = $request->validate([
            'protocolo' => 'required|string',
            'password' => 'required|string',
        ]);

        $solicitacao = Solicitacoes::where('protocolo', $validatedData['protocolo'])
                                    ->where('password', $validatedData['password'])
                                    ->first();

        if ($solicitacao) {
            return view('solicitacoes.consulta', compact('solicitacao'));
        } else {
            return redirect()->back()->withErrors(['error' => 'Protocolo ou senha incorretos.']);
        }
    }

    public function showResponderForm($id)
    {
        $solicitacao = Solicitacoes::findOrFail($id);
        return view('solicitacoes.responder', compact('solicitacao'));
    }

    public function responderSolicitacao(Request $request, $id)
    {
        $validatedData = $request->validate([
            'resposta' => 'required|string',
        ]);

        $solicitacao = Solicitacoes::findOrFail($id);
        $solicitacao->resposta = $validatedData['resposta'];
        $solicitacao->verificador = 3; // Estado "Finalizado"
        $solicitacao->save();

        return redirect()->route('solicitacao.consulta')->with('success', 'Resposta enviada com sucesso!');
    }
}

