<?php

namespace App\Http\Controllers;
use App\Models\NivelAcesso;
use App\Models\Usuarios;
use Exception;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    public function listar(){
        $usuarios = Usuarios::with('nivelAcesso')->get();
        return view('usuarios.listar', compact('usuarios'));
    }

    public function cadastro()
    {

        $nivelAcesso = NivelAcesso::all();

        return view('usuarios.cadastro', compact('nivelAcesso'));
    }

    public function add(Request $request){

        $request->validate([
            'nome' => 'required|string|max:255',
            'dataNascimento' => 'required',
            'telefone' => 'required|string|max:255',
            'cpf' => 'required|string|max:255',
            'nivelAcessoId' => 'required'
        ]);

        try{
            Usuarios::create([
                'nome' => $request->nome,
                'data_nascimento' => $request->dataNascimento,
                'telefone' => $request->telefone,
                'nivel_acesso_id' => $request->nivelAcessoId,
                'cpf' => $request->cpf,
            ]);

            return redirect()->back()->with('success','Usuário cadastrado com sucesso!');

        }catch(Exception $e){
            return redirect()->back()->with('error','Erro ao cadastrar usuário!');

        }

    }

    public function atualizar($id){
        $usuarios = Usuarios::findOrFail($id); // Busca o produto pelo ID
        $nivelAcesso = NivelAcesso::all();
        return view('usuarios.atualizar', compact('usuarios', 'nivelAcesso'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'nome' => 'required|string|max:255',
            'dataNascimento' => 'required',
            'telefone' => 'required|string|max:255',
            'cpf' => 'required|string|max:255',
            'nivelAcessoId' => 'required'
        ]);

        $usuarios = Usuarios::findOrFail($id);
        $usuarios ->nome = $request->nome;
        $usuarios ->data_nacimento = $request->dataNascimento;
        $usuarios ->telefone = $request->telefone;
        $usuarios ->cpf = $request->cpf;
        $usuarios ->nivel_acesso_id = $request->nivelAcessoId;
        $usuarios ->nome = $request->nome;

        $usuarios->save(); // salvando no banco de dados(fazendo update)

        return redirect()->back()->with('success','Usuário atualizado com suceso');
    }

    public function deletar(int $id){
        $usuarios = Usuarios::findOrFail($id); // buscar o nível de acesso para depois deletar
        $usuarios->delete(); // faz o delete no banco de dados

        return redirect()->route('usuarios.listar')
            ->with('success','Usuário excluído com sucesso!');
    }

}