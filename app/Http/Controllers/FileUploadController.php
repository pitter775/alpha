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
    
      $id_user = $request->input('id_geral');
      $image = $request->file('file');
      $tipo = $image->extension();

      $size = $image->getSize();
      $size = $this->formatBytes($size);

      $nameRef =  rand(0, time()) . time();
      $imageName = $nameRef . '.' . $tipo;
      $image->move(public_path('arquivos/' . $id_user), $imageName);

      $dados = new Arquivo();
      $dados->name_ref = $nameRef;
      $dados->tipo = $tipo;
      $dados->url = $id_user . '/' . $nameRef . '.' . $tipo;
      $dados->users_id = $id_user;
      $dados->size = $size;
      $dados->name_arq = $image->getClientOriginalName();
      $dados->save();

      return response()->json(['success' => $imageName]);
   }
   public function getfiles($id)
   {
      $files = Arquivo::where('users_id', $id)->get();
      return view('pages.usuario.file', compact('files'));
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
              unlink(public_path('arquivos/'.$deletar->url));
              return 'Ok';
          }catch (PDOException $e) {
              if (isset($e->errorInfo[1]) && $e->errorInfo[1] == '1451') {
                  return 'Erro';
              }
          }
      }
  }
}
