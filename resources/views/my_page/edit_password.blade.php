@extends('layouts.app')
@section('pagecss')
    <link rel="stylesheet" href="{{ asset('css/top.css') }}">
@endsection

@section('content')




    @if(session('warning'))//エラー文を表示させる
        <div class="alert alert-danger">
            {{ session('warning') }}
        </div>
    @endif

        <div class="row mt-5 mb-5">
            <div class="col-sm-6 offset-sm-3">

                <form method="POST" action="{{route('password.change')}}">
                @method('PUT')
                @csrf
                    <div class="form-group">
                        <label for="current_password">以前のパスワード</label>
                        <input class="form-control" id="current_password" placeholder="以前のパスワード" name="current_password" type="password" value="">
                    </div>

                    <div class="form-group">
                        <label for="new_password">新しいパスワード</label>
                        <input class="form-control" id="new_password" placeholder="新しいパスワード" name="new_password" type="password" value="">
                    </div>

                    <div class="form-group">
                        <label for="new_password_confirmation">パスワードの確認</label>
                        <input class="form-control" id="new_password_confirmation" placeholder="パスワードの確認" name="new_password_confirmation" type="password" value="">
                    </div>

                    <div class="form-group">
                        <input class="btn btn-primary mt-2" type="submit" value="パスワードを変更する">
                    </div>
                </form>

            </div>
        </div>



@endsection