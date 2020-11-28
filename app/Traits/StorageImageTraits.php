<?php
namespace App\Traits;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

trait  StorageImageTraits{
    public function storageTraitUpload($request, $fileName, $forderName)
    {

        if($request->hasFile($fileName)){
            $file = $request->$fileName;
            $filenameOrigin = $file->getClientOriginalName();
            $filenameHash = Str::random(20).'.'.$file->getClientOriginalExtension();
         $filepath = $request->file($fileName)->storeAs('public/'.$forderName.'/'.auth()->id(),$filenameHash);

         $dataUploadTrait =[
     'file_name'=>$filenameOrigin,
     'file_path'=>Storage::url($filepath)
         ];
         return $dataUploadTrait;
        }
return null;

    }

    public function storageTraitUploadMutiple($file, $forderName)
    {
       $filenameOrigin = $file->getClientOriginalName();
            $filenameHash = Str::random(20).'.'.$file->getClientOriginalExtension();
         $filepath = $file->storeAs('public/'.$forderName.'/'.auth()->id(),$filenameHash);
        $dataUploadTrait =[
        'file_name'=>$filenameOrigin,
        'file_path'=>Storage::url($filepath)
         ];
         return $dataUploadTrait;
    }
}
?>
