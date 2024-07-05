<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Storage;
use App\Models\Organisasi;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::latest()->paginate(10); // Menampilkan artikel terbaru dengan pagination
        return view('admin.articles.index', compact('articles'));
    }

    /**
     * Display a listing of the resource in card format.
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        $articles = Article::latest()->paginate(12); // Menampilkan artikel terbaru dengan pagination
        $organisasis = Organisasi::all(); // Mengambil semua data organisasi (contoh menggunakan Eloquent ORM)        
        return view('welcome', compact('articles', 'organisasis'));
    }
    
    public function showlist()
    {
        $articles = Article::latest()->paginate(12); // Menampilkan artikel terbaru dengan pagination
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'author' => 'required|string|max:255',
            'date_publish' => 'required|date',
            'content' => 'required|string',
        ]);

        // Handle file upload
        if ($request->hasFile('thumbnail')) {
            $fileName = time().'.'.$request->thumbnail->extension();  
            $request->thumbnail->move(public_path('images'), $fileName);
            $validatedData['thumbnail'] = $fileName;
        }

        Article::create($validatedData);

        return redirect()->route('admin.articles.index')->with('success', 'Article added successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('admin.articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'author' => 'required|string|max:255',
            'date_publish' => 'required|date',
            'content' => 'required|string',
        ]);

        $article = Article::findOrFail($id);

        // Handle file upload
        if ($request->hasFile('thumbnail')) {
            $fileName = time().'.'.$request->thumbnail->extension();  
            $request->thumbnail->move(public_path('images'), $fileName);
            if ($article->thumbnail) {
                Storage::delete('public/images/' . $article->thumbnail);
            }
            $validatedData['thumbnail'] = $fileName;
        }

        $article->update($validatedData);

        return redirect()->route('admin.articles.index')->with('success', 'Article updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        if ($article->thumbnail) {
            Storage::delete('public/images/' . $article->thumbnail);
        }
        $article->delete();

        return redirect()->route('admin.articles.index')->with('success', 'Article deleted successfully!');
    }

    public function show($id)
{
    $article = Article::findOrFail($id);
    return view('articles.show', compact('article'));
}

}
