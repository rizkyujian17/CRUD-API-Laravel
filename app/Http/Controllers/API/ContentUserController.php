<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller; 
use App\ContentUser;
use App\User;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Contracts\Routing\ResponseFactory;
use Validator;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class ContentUserController extends Controller
{
 
    public function add(Request $request,ContentUser $ContentUser){
        
        $validator = Validator::make($request->all(), [ 
            'NamaFile' => 'required', 
            'DeskripsiFile' => 'required',   
            'file'=>'required',
        ]);
        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401);            
        }
        
        $uploadedFile = $request->file('file');
        $path = $uploadedFile->store('public/file');

        $file = $ContentUser->create([
            'content_user_id'=>Auth::user()->id,
            'NamaFile' => $request->NamaFile,
            $uploadedFile->getClientOriginalName(),
            'DeskripsiFile' => $request->DeskripsiFile,
            'file' => $path,
        ]);
    
        
        return response()->json(['Status'=>'SUKSES'], 201); 
  
    }
    public function ShowDataId($id){
        $data= ContentUser::with('user')->where('id',$id)->get();
        
      
        // $data = \App\ContentUser::where('content_user_id',$id)->get();
        if (count([$data])>0){
            $res['message']="Sukses Mengambi data!";
            $res['values']=$data;
            return response($res,200);
            // return Storage::download([$data]);
        }else{
            $res['message']="Gagal!";
            return response ($res,404);
        }
    }
    public function ShowContentID($id){
        $data = ContentUser::where('id',$id)->get();
        
        if (count($data)>0){
            $res['message']="Sukses Mengambi data!";
            $res['values']=$data;
            return response($res,200);
        }else{
            $res['message']="Gagal!";
            return response ($res,404);
        }
    }
    public function UpdateByContent(Request $request, ContentUser $content_users,$id)
    {
        $this->authorize('UpdateByContent', $content_users);
         $content_users= ContentUser::find($id);
         $content_users->NamaFile= $request->get('NamaFile', $content_users->NamaFile);
         $content_users->DeskripsiFile= $request->get('DeskripsiFile',$content_users->DeskripsiFile);
         $content_users->save();

        return response()->json(['Status'=>'Sukses'],201);
    }
    public function DeleteByContent(Request $request, ContentUser $content_users,$id)
    {
        $this->authorize('DeleteByContent',$content_users);
        $data= ContentUser::find($id);
        if($data->delete()){
            $res['message'] ="Success!";
            $res['value']="$data";
            return response($res);
        }else{
            $res['message']="Gagal!";
            return response($res);
        }
        return "data berhasil dihapus";

    }
    public function DownloadGambar($id){
        $dl= ContentUser::find($id);
        
        return Storage::download($dl->file,$dl->NamaFile);
    }
}












