<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\User;
use App\Services\Operations;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class MainController extends Controller
{
  public function index()
  {

    $id = session('user.id');
    //consultando todas as notas que tenham o campo deleted_at com o valor nulo 
    //assim o usuario so vai verr as notas que não form deletadas ainda 

    $notes = User::find($id)
      ->notes()->whereNull('deleted_at')
      ->get()
      ->toArray();

    return view('home', ['notes' => $notes]);
  }

  public function editNote($id)
  {
    $id = Operations::decryptId($id);
    if ($id === null) {
      return redirect()->route('home');
    }

    //carrregando a nota 
    $note = Note::find($id);

    //mostrando a pagina de edição 

    return view('edit_note', ['note' => $note]);
  }











  public function editNoteSubmit(Request $request)
  {

    //validando a requisição

    $request->validate(


      [
        'text_title' => 'required|min:3|max:200',
        'text_note' => 'required|min:3|max:3000'

      ],

      [
        'text_title.required' => 'Você esqueceu de colocar um titulo na sua nota ',
        'text_title.min' => 'o titulo deve ter pelo menos 3 caracteres',
        'text_title.max' => 'o titulo deve ter no maximo 200 caracteres',
        'text_note.required' => 'Você esqueceu de colocar um texto na nota',
        'text_note.min' => 'O texto deve ter pelo menos 3 caracteres',
        'text_note.max' => 'O texto pode ter no maximo 3000 caracteres'
      ]

    );

    //verificando se existe um id na requisição 
    if ($request->note_id == null) {
      return redirect()->to('home');
    }

    //decriptando o id 
    $id = Operations::decryptId($request->note_id);

    //carregando a nota 

    $note = Note::find($id);

    //atualizando a nota 

    $note->title = $request->text_title;
    $note->text = $request->text_note;
    $note->save();


    //redirecionando o usuario 

    return redirect()->route('home');
  }

  public function deleteNote($id)
  {
    $id = Operations::decryptId($id);

    if ($id === null) {
      return redirect()->route('home');
    }


    //carregando a nota 

    $note = Note::find($id);

    //mostrando a pagina de confirmação 
    return view('delete_note', ['note' => $note]);
  }

  public function deleteConfirm($id)
  {

    //checando o id 
    $id = Operations::decryptId($id);
    if ($id === null) {
      return redirect()->route('home');
    }

    // carrregando a nota 
    $note = Note::find($id);

    //deletando de forma fisica (hard delete)

    //$note->delete();

    //quando eu faço um soft delete eu não pagao de forma fisica 
    //eu so faço a atribuição da data hora no campo deleted_at
    //como o sistema so traz as notas que tem esse campo nulo 
    //ela não vai apareder para demais operações 
    //mas caso eu precise recuperar depois para fazer um historico ou coisa parecida
    //o registro ainda vai estar na base 
    //soft delete 

    // $note->deleted_at = date('y:m:d H:i:s');
    // $note->save();

    //soft delete configurado direto no model eu posso ate usar esse codigo 
    //mas se tiver essa linah dentro do meu model 
    //  use SoftDeletes;
    // ele so vai preencher o campo deleted_at (é mais prático e seguro )

    $note->delete();




    //redirecionando
    return redirect()->route('home');
  }

  //rota para o formulario da nova nota 
  public function newNote()
  {

    return view('new_note');
  }

  public function newNoteSubmit(Request $request)
  {

    //validando o formulário

    $request->validate(


      [
        'text_title' => 'required|min:3|max:200',
        'text_note' => 'required|min:3|max:3000'

      ],

      [
        'text_title.required' => 'Você esqueceu de colocar um titulo na sua nota ',
        'text_title.min' => 'o titulo deve ter pelo menos 3 caracteres',
        'text_title.max' => 'o titulo deve ter no maximo 200 caracteres',
        'text_note.required' => 'Você esqueceu de colocar um texto na nota',
        'text_note.min' => 'O texto deve ter pelo menos 3 caracteres',
        'text_note.max' => 'O texto pode ter no maximo 3000 caracteres'
      ]

    );




    //pegando o id do usuario que criou a nota 

    $id = session('user.id');

    //criando a nota 

    $note = new Note();
    $note->user_id = $id;
    $note->title = $request->text_title;
    $note->text = $request->text_note;
    $note->save();

    //redirecionando a apgina principal 
    return redirect()->route('home');
  }
}
