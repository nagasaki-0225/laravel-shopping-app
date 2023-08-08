<footer class>
<div class="container">
<link rel="stylesheet" href="{{ asset('css/footer.css') }}">


<div class="d-flex justify-content-center align-items-center bg-dark fixed-bottom" style="height: 100px; z-index: auto;">
    <div class="sp">
        {{-- ＃にはリンク先を指定する --}}
        <a href="{{ route('dish.create') }}" class="example rounded">D</a>
        <a href="{{ route('list') }}" class="example rounded">R</a>
        <a href="{{ route('stock') }}" class="example rounded">S</a>
        <a href="{{ route('home') }}" class="example rounded">M</a>
    </div>
    <div style="position: absolute; bottom: 0px; right: 0px; center">
        <p class="text-white">&copy; {{ config('app.name', 'Laravel') }} All rights reserved.</p>
    </div>
</div> 
</footer>
