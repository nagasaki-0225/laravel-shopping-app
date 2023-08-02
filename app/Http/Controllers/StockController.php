<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index() {        
        return view('stock.stock');
    }
    public function create() {        
        return view('stock.create');
    }
    public function store() {        
        return view('stock.create');
    }
}
