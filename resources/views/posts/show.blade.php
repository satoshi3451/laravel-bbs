@extends('layout')

@section('content')
<div class="container mt-4">
    <div class="border p-4">
        <!-- 編集機能 -->
        <div class="mb-4 text-right">
            <a class="btn btn-primary" href="{{ route('posts.edit', ['post' => $post]) }}">
                編集する
            </a>
            <!-- 削除ボタン -->
            <form style="display: inline-block;" method="POST" action="{{ route('posts.destroy', ['post' => $post]) }}">
                @csrf
                @method('DELETE')

                <button class="btn btn-danger">削除する</button>
            </form>
            <!-- 削除ボタンここまで -->
        </div>
        <!-- 編集機能ここまで -->

        <h1 class="h5 mb-4">
            {{ $post->title }}
        </h1>

        <p class="mb-5">
            {!! nl2br(e($post->body)) !!}
        </p>

        <section>
            <h2 class="h5 mb-4">
                コメント
            </h2>

            <!-- コメントフォーム -->
            <form class="mb-4" method="POST" action="{{ route('comments.store') }}">
                @csrf

                <input name="post_id" type="hidden" value="{{ $post->id }}">

                <div class="form-group">
                    <label for="body">
                        本文
                    </label>

                    <textarea id="body" name="body" class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}" rows="4">{{ old('body') }}</textarea>
                    @if ($errors->has('body'))
                    <div class="invalid-feedback">
                        {{ $errors->first('body') }}
                    </div>
                    @endif
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">
                        コメントする
                    </button>
                </div>
            </form>
            <!-- コメントフォーム　ここまで -->

            @forelse($post->comments as $comment)
            <div class="border-top p-4">
                <time class="text-secondary">
                    {{ $comment->created_at->format('Y.m.d H:i') }}
                </time>
                <p class="mt-2">
                    {!! nl2br(e($comment->body)) !!}
                </p>
            </div>
            @empty
            <p>コメントはまだありません。</p>
            @endforelse
        </section>
    </div>
</div>
@endsection