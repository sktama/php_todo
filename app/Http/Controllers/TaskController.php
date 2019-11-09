<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Folder;
use App\Task;

class TaskController extends Controller
{
  public function index(int $id)
  {
    // 全てのフォルダーを取得する
    $folders = Folder::all();

    // 選択されたフォルダーを取得する
    $current_folder = Folder::find($id);

    // 選択されたフォルダーに紐付くタスクを取得する
    $tasks = $current_folder->tasks()->get();

    // 一覧を描画する際に値を一緒に送信
    return view('tasks/index', [
      'folders' => $folders,
      'current_folder_id' => $id,
      'tasks' => $tasks,
    ]);
  }

  /*
   * GET /folders/{id}/tasks/create
   */
  public function showCreateForm(int $id)
  {
    return view('tasks/create', [
      'folder_id' => $id
    ]);
  }
}
