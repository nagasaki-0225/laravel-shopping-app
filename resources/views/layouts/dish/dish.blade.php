@extends('layouts.app')
@section('pagename') dish @endsection
@section('pagecss')
<link rel="stylesheet" href="{{ asset('css/dish.css') }}">
@endsection
@section('content')
<br>
<h1>dish</h1>
  
<body> 
<form action="{{ route('dish') }}" method="get">
<input type="text" placeholder="料理名">
<select class="number"> 
<option>1</option> 
<option>2</option> 
<option>3</option> 
<option>4</option> 
<option>5</option> 
<option>6</option> 
<option>7</option> 
<option>8</option>   
<option>9</option> 
<option>10</option> 
<option>11</option> 
<option>12</option> 
</select></div>
<div class="count">
<label>人前</label> 
</div>
<input type="submit" value="確定"> 
<input type="reset" value="中止">
</form>

<i class="fa-solid fa-magnifying-glass"></i>
</body>
 



<div class=" ">

@endsection