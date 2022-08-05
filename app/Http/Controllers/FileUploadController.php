<?php

namespace App\Http\Controllers;

use App\Models\Arquivo;
use PDOException;

use Illuminate\Http\Request;
use File;

class FileUploadController extends Controller
{
   public  function dropzoneUi()
   {
      return view('upload-view');
   }

   /** 
    * File Upload Method 
    * 
    * @return void 
    */

   public  function dropzoneFileUpload(Request $request)
   {

      $userid = true;
      $usercodigo = false;
      $id_user = $request->input('id_geral');
      if(!$id_user){
         $id_user = $request->input('inputcodigo');
         $usercodigo = true;
         $userid = false;
      }

      $image = $request->file('file');
      $tipo = $image->extension();

      $size = $image->getSize();
      $size = $this->formatBytes($size);

      $nameRef =  rand(0, time()) . time();
      $imageName = $nameRef . '.' . $tipo;
      $image->move(public_path('/arquivos/' . $id_user), $imageName);

      $dados = new Arquivo();
      $dados->arq_name_ref = $nameRef;
      $dados->arq_tipo = $tipo;
      $dados->arq_url = $id_user . '/' . $nameRef . '.' . $tipo;
      
      if($userid){
         $dados->arq_users_id = $id_user;
      }     
      
      if($usercodigo){
         $dados->arq_codigo = $request->input('inputcodigo');
      }
      $dados->arq_size = $size;
      $dados->arq_name_arq = $image->getClientOriginalName();
      $dados->save();

      return response()->json(['success' => $imageName]);
   }
   public function getfiles($id)
   {
      $files = Arquivo::where('arq_users_id', $id)->get();
      return view('pages.usuario.file', compact('files'));
   }
   public function getpublicacao($id)
   {
      $files = Arquivo::where('arq_codigo', $id)->get();
      return view('pages.publicacao.file', compact('files'));
   }

   function formatBytes($size, $precision = 2)
   {
      $base = log($size, 1024);
      $suffixes = array('by', 'kb', 'mb', 'gb', 'tb');

      return round(pow(1024, $base - floor($base)), $precision) . $suffixes[floor($base)];
   }
   public function delete($id){
      $deletar = Arquivo::find($id);
      
      if(isset($deletar)){
          try {
              $deletar->delete();
              unlink(public_path('arquivos/'.$deletar->arq_url));
              return 'Ok';
          }catch (PDOException $e) {
              if (isset($e->errorInfo[1]) && $e->errorInfo[1] == '1451') {
                  return 'Erro';
              }
          }
      }
  }
}
