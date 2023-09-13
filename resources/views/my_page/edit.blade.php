@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">   
       
   <h3>登録情報変更</h3>

   {{-- ユーザー名の変更 --}}
   {{-- メールアドレスの変更 --}}
   <form method="POST" action="{{route('user.update')}}">
    @csrf
    <input name="name" placeholder="ユーザー名" />
    <input name="email" placeholder="e-mail" />
    <button>更新する</button>
  </form>





            

                
        
        
        </div>
    </div>
</div>
@endsection
