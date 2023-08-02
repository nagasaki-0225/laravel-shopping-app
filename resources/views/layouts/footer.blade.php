<footer class>
<div class="container">
<link rel="stylesheet" href="{{ asset('css/footer.css') }}">

<div class="d-flex justify-content-center align-items-center bg-dark fixed-bottom" style="height: 100px; z-index: auto;">
{{-- ＃にはリンク先を指定する --}}
<a href="{{ route('home') }}" class="example rounded">M</a>
<a href="{{ route('dish') }}" class="example rounded">D</a>
<a href="{{ route('list') }}" class="example rounded">R</a>
<a href="{{ route('stock') }}" class="example rounded">S</a>

</div>
<br>
<div style="position: absolute; bottom: 2px; right: 2px; center">
<p class="text-white bg-dark">&copy; {{ config('app.name', 'Laravel') }} All rights reserved.</p>
</div>
</div> 
</footer>
