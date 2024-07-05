<?php

namespace App\Http\Controllers;
use App\Models\Article;
use App\Models\Organisasi;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totalArticles = Article::count();
        $totalOrganisasi = Organisasi::count();
        return view('admin.dashboard', compact('totalArticles', 'totalOrganisasi'));
    }
}
