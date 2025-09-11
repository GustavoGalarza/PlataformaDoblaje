<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\NoticiaRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Facades\Storage;

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
        $data = $request->validated();

        if ($request->hasFile('archivo_url')) {
            $file = $request->file('archivo_url');

            // Subida a Cloudinary
            $uploadedFileUrl = Storage::disk('cloudinary')->putFile(
                'noticias',   // carpeta en Cloudinary
                $file,
                'public'      // visibilidad (opcional)
            );

            $data['archivo_url'] = $uploadedFileUrl; // URL guardada en DB
        }

        Noticia::create($data);

        return redirect()->route('noticias.index')
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
        if ($request->hasFile('archivo_url')) {
            $file = $request->file('archivo_url');

            // **Borrar la imagen anterior si existe**
            if ($noticia->archivo_url) {
                Storage::disk('cloudinary')->delete($noticia->archivo_url);
            }

            // Subida nueva a Cloudinary
            $filename = time() . '_' . preg_replace('/[^A-Za-z0-9\-_\.]/', '', $file->getClientOriginalName());

            $uploadedFileUrl = Storage::disk('cloudinary')->putFileAs(
                'noticias',
                $file,
                $filename,
                'public'
            );
            $data['archivo_url'] = $uploadedFileUrl;
        }
        $noticia->update($data);
        return redirect()->route('noticias.index')
            ->with('success', 'Noticia actualizada correctamente.');
    }

    public function destroy($id): RedirectResponse
    {
        $noticia = Noticia::find($id);
        // **Borrar la imagen en Cloudinary antes de eliminar la noticia**
        if ($noticia && $noticia->archivo_url) {
            Storage::disk('cloudinary')->delete($noticia->archivo_url);
        }
        $noticia->delete();
        return Redirect::route('noticias.index')
            ->with('success', 'Noticia eliminada correctamente');
    }
        public function panel(): View
        {
            // Solo noticias publicadas, por ejemplo estado = 'publicado' o 'en_curso'
            $noticias = Noticia::where('estado', '!=', 'finalizado')
                ->orderBy('fecha_publicacion', 'desc')
                ->paginate(10);

            return view('noticia.panel', compact('noticias'));
        }

}
