<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;

class FileController extends Controller
{
    public function uploadForm() {
        return view('file.uploadForm');
    }

    public function uploadFile(Request $request) {
        //判断请求中是否包含name=file的上传文件
        if(!$request->hasFile('myFile')){
            exit('上传文件为空！');
        }
        $file = $request->file('myFile');
        //判断文件上传过程中是否出错
        if(!$file->isValid()){
            exit('文件上传出错！');
        }

//      有错
//        if(!file_exists($destPath))
//            mkdir($destPath,0755,true);
        $filename = $file->getClientOriginalName();

        $destPath = realpath(public_path('image'));
        move_uploaded_file($_FILES["myFile"]["tmp_name"], $destPath.'/123.png');
//        if(!$file->move($destPath.'/123.png',$filename)){
//            exit('保存文件失败！');
//        }
//
//        exit('文件上传成功！');
    }
}