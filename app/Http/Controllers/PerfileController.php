<?php

namespace App\Http\Controllers;

use App\Models\Perfile;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\PerfileRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class PerfileController extends Controller
{
    public function index(Request $request): View
    {
        $perfiles = Perfile::paginate();

        return view('perfile.index', compact('perfiles'))
            ->with('i', ($request->input('page', 1) - 1) * $perfiles->perPage());
    }

    public function create(): View
    {
        $perfile = new Perfile();
        $usuarios = User::pluck('name', 'id'); // Para select de usuarios
        return view('perfile.create', compact('perfile', 'usuarios'));
    }

    public function store(PerfileRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('foto_url')) {
            $file = $request->file('foto_url');

            $uploadedFileUrl = Storage::disk('cloudinary')->putFile(
                'perfiles',
                $file,
                'public'
            );

            $data['foto_url'] = $uploadedFileUrl;
        }

        Perfile::create($data);

        return Redirect::route('perfiles.index')
            ->with('success', 'Perfil creado correctamente.');
    }

    public function show($id): View
    {
        $perfile = Perfile::find($id);

        return view('perfile.show', compact('perfile'));
    }

    public function edit($id): View
    {
        $perfile = Perfile::find($id);
        $usuarios = User::pluck('name', 'id');
        return view('perfile.edit', compact('perfile', 'usuarios'));
    }

    public function update(PerfileRequest $request, Perfile $perfile): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('foto_url')) {
            $file = $request->file('foto_url');

            // borrar la foto anterior si existe
            if ($perfile->foto_url) {
                Storage::disk('cloudinary')->delete($perfile->foto_url);
            }

            $filename = time() . '_' . preg_replace('/[^A-Za-z0-9\-_\.]/', '', $file->getClientOriginalName());

            $uploadedFileUrl = Storage::disk('cloudinary')->putFileAs(
                'perfiles',
                $file,
                $filename,
                'public'
            );

            $data['foto_url'] = $uploadedFileUrl;
        }

        $perfile->update($data);

        return Redirect::route('perfiles.index')
            ->with('success', 'Perfil actualizado correctamente.');
    }

    public function destroy($id): RedirectResponse
    {
        $perfile = Perfile::find($id);

        if ($perfile && $perfile->foto_url) {
            Storage::disk('cloudinary')->delete($perfile->foto_url);
        }

        $perfile->delete();

        return Redirect::route('perfiles.index')
            ->with('success', 'Perfil eliminado correctamente.');
    }
}
