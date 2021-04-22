<?php

namespace App\Http\Controllers;

use App\Models\Prayer;
use Illuminate\Http\Request;

class PrayerController extends Controller
{
    public function index()
    {
        $prayers = Prayer::all();

        return view('prayer.index', compact('prayers'));
    }

    public function create()
    {
        return view('prayer.create');
    }
}
