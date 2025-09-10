<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\NoticiaRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;

class NoticiaController extends Controller
{
    public function index(Request $request): View
    {
        $noticias = Noticia::paginate();

        return view('noticia.index', compact('noticias'))
            ->with('i', ($request->input('page', 1) - 1) * $noticias->perPage());
    }

    public function create(): View
{
    $noticia = new Noticia();
    $usuarios = User::pluck('name', 'id'); // obtiene [id => nombre]
    return view('noticia.create', compact('noticia', 'usuarios'));
}

    public function store(NoticiaRequest $request): RedirectResponse
    {
        // Guardar tal cual viene del form
        $data = $request->validated();
        Noticia::create($data);

        return Redirect::route('noticias.index')
            ->with('success', 'Noticia creada correctamente.');
    }

    public function show($id): View
    {
        $noticia = Noticia::find($id);
        return view('noticia.show', compact('noticia'));
    }

    public function edit($id): View
{
    $noticia = Noticia::find($id);
    $usuarios = User::pluck('name', 'id');
    return view('noticia.edit', compact('noticia', 'usuarios'));
}

    public function update(NoticiaRequest $request, Noticia $noticia): RedirectResponse
    {
        $data = $request->validated();
        $noticia->update($data);

        return Redirect::route('noticias.index')
            ->with('success', 'Noticia actualizada correctamente');
    }

    public function destroy($id): RedirectResponse
    {
        Noticia::find($id)->delete();
        return Redirect::route('noticias.index')
            ->with('success', 'Noticia eliminada correctamente');
    }
}
