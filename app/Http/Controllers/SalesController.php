<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use App\Models\SoldItem;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SalesController extends Controller
{
    public function index() {
        $sales = Sales::paginate(10);
        return Inertia::render('Sales/Index', [
            'sales' => $sales
        ]);
    }
}
