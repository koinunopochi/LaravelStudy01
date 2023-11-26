<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Requests\CreateTaskRequest;

class CreateTaskAction extends Controller
{
  /**
   * Handle the incoming request.
   */
  public function __invoke(CreateTaskRequest $request)
  {
    $task = new Task(); // Task モデルのインスタンスを作成
    $task->name = $request->validated()['name']; // バリデーションを行った値のみ取得
    $task->save(); // tasks テーブルに保存

    return response()->json(['id' => $task->id, 'name' => $task->name], 201);
  }
}
