@extends('layouts.app')

@section('content')
<div class="jumbotron text-center">
            <h1 class="display-4">
            <i class="fas fa-tags"></i>
                超 Do!
            </h1>
            <p class="lead">TASK MANAGER APP</p>
            <hr class="my-4">
            <p>TODO管理webアプリ 超 Do! へようこそ！<br>
                TASKを登録しましょう。</p>
        </div> 

        <form action="{{ route('todo.store') }}" method="POST">
            @csrf
        <div class="input-group input-group-lg w-75 mx-auto mb-5">
            <div class="input-group-prepend">
                <span class="input-group-text required" id="inputGroup-sizing-lg">タスク名称</span>
            </div>
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" placeholder="タスクのタイトルを入力してください" required name="title" maxlength="255">
        </div>

        <div class="input-group mb-3 w-75 mx-auto mt-3">
            <div class="input-group-prepend">
                <span class="input-group-text required" id="basic-addon1">タスク期限</span>
            </div>
            <input type="date" class="form-control" name="due_date" aria-describedby="basic-addon1" required>
        </div>

        <div class="input-group mt-4 mx-auto w-75">
            <div class="input-group-prepend">
                <span class="input-group-text choice">タスク内容</span>
            </div>
            <textarea class="form-control" aria-label="With textarea" rows=5 placeholder="タスクの内容を入力してください" name="content"></textarea>
        </div>

        <input type="submit" value="送信" class="btn btn-outline-success btn-lg btn-block mt-3 mx-auto w-75 mt-5" onclick="return confirm('タスクを登録します。よろしいですか？')">
        <button type="button" class="btn btn-outline-secondary btn-lg btn-block mb-5 mx-auto w-75" onclick="history.back()">戻る</button>
        </form>








@endsection
