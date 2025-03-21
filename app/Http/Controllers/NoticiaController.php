<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Noticia;
use Illuminate\Support\Facades\Auth;


class NoticiaController extends Controller
{
    public function index()
    {
        $noticias = Noticia::with('user')->get();

        return view('main', compact('noticias'));
    }


    public function store(Request $request)
    {        
        $request->validate([
            'titulo' => 'required|string|max:255',
            'subtitulo' => 'required|string|max:255',
            'conteudo' => 'required|string',
            'materia' => 'required|integer',
            'imagem' => 'required|image|max:2048'
        ]);

        $pathImage = $request->file('imagem')->store('images', 'public');

        Noticia::create([
            'titulo' => $request->titulo,
            'subtitulo' => $request->subtitulo,
            'conteudo' => $request->conteudo,
            'materia' => $request->materia,
            'imagem' => $pathImage,
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->back()->with('success', 'Noticia criada com sucesso!');
    }

    public function aprovar($id)
    {
        $noticia = Noticia::findOrFail($id);
        $noticia->update(['status' => 1]);
        
        return redirect()->back()->with('success', 'Notícia aprovada com sucesso.');
    }

    public function reprovar($id)
    {
        $noticia = Noticia::findOrFail($id);
        $noticia->update(['status' => 2]);
        
        return redirect()->back()->with('success', 'Notícia reprovada com sucesso.');
    }

    public function painelModeracao()
    {
        $noticias = Noticia::where('status', 0)->get();
        return view('admin.aprove', compact('noticias')); 
    }

    public function getNoticiaTema($id)
    {
        
    }

}