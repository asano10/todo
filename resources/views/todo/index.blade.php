

@extends('layouts.app')

@section('content')
<div class="jumbotron text-center">
            <h1 class="display-4">
            <i class="fas fa-tags"></i>
                超 Do!
            </h1>
            <p class="lead">TASK MANAGER APP</p>
            @if (session('flash_message'))
            <div class="flash-success-bg w-100 text-center mb-3">
                <span class="flash-success-font">
                    ✔ {{ session('flash_message') }}
                </span>
            </div>
            @endif
            <hr class="my-4">
            <p>TODO管理webアプリ 超Do! へようこそ！<br>
                計画的なタスク運営を心がけましょう。</p>
                <a type="button" class="btn btn-primary btn-lg btn-block" href="{{ route('todo.create') }}">＋ タスク作成</a>
        </div> 

        <div class="mx-auto w-75">
            <div class="alert alert-primary" role="alert">
                現在進行中のタスク
                <hr class="my-4">
                @if($process->isEmpty())
                <p>現在進行中のタスクはありません。</p>
                @else
                @foreach($process as $processItem)
                <div class="card">
                    <h5 class="card-header">期限：{{ $processItem->due_date }}</h5>
                    <div class="card-body">
                        <h5 class="card-title">{{ $processItem->title }}</h5>
                        <p class="card-text">{{ $processItem->content }}</p>
                        <form action="{{ route('todo.update', $processItem->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <button type="submit" class="btn btn-success">Complete</button>
                        </form>
                    </div>
                </div>
                @endforeach
                @endif

            </div>

            <div class="alert alert-danger" role="alert">
                未完了のタスク
                <hr class="my-4">
                @if($created->isEmpty())
                <p>未完了のタスクはありません。</p>
                @else
                @foreach($created as $createdItem)
                <div class="card">
                    <h5 class="card-header">期限：{{ $createdItem->due_date }}</h5>
                    <div class="card-body">
                        <h5 class="card-title">{{ $createdItem->title }}</h5>
                        <p class="card-text">{{ $createdItem->content }}</p>
                        <form action="{{ route('todo.update', $createdItem->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <button type="submit" class="btn btn-primary">Do</button>
                        </form>
                    </div>
                </div>
                @endforeach
                @endif
            </div>

            <div class="alert alert-success" role="alert">
                完了したタスク
                <hr class="my-4">
                @if($completed->isEmpty())
                <p>未完了のタスクはありません。</p>
                @else
                @foreach($completed as $completedItem)
                <div class="card">
                    <h5 class="card-header">期限：{{ $completedItem->due_date }}</h5>
                    <div class="card-body">
                        <h5 class="card-title">{{ $completedItem->title }}</h5>
                        <p class="card-text">{{ $completedItem->content }}</p>
                        <div class="btn-group" role="group" aria-label="Basic example">
                        <form action="{{ route('todo.update', $completedItem->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <button type="submit" class="btn btn-danger">Back</button>
                        </form>
                        <form action="{{ route('todo.destroy', $completedItem->id) }}" method="post" >
                        @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-secondary" onclick="return confirm('タスクを削除します。よろしいですか？')" style="color: black;">削除</button>
                    </form>
                    </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>

@endsection
