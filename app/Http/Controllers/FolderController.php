<?php

namespace App\Http\Controllers;

//Folderクラスを使用するのでファイルの読み込みが必要
use App\Folder; 

use Illuminate\Http\Request;

//バリデーションを設定したファイルを読み込む
use App\Http\Requests\CreateFolder;


class FolderController extends Controller
{
    //
    public function showCreateForm()
    {
        return view('folders/create');
    }

    public function create(CreateFolder $request)
    {
        //フォルダモデルのインスタンスを作成する
        $folder = new Folder();

        //タイトルに入力値を代入する
        $folder->title = $request->title;

        //インスタンスの状態をデータベースに書き込む
        $folder->save();

        return redirect()->route('tasks.index', [
            'id' => $folder->id,
        ]);
    }
}
