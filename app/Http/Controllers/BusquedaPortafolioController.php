<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perfile;
use App\Models\Idioma;
use App\Models\TipoVoz;
use App\Models\EstilosVoz;
use App\Models\RangoVocal;
use App\Models\TimbreVoz;
use App\Models\AcentosDialecto;

class BusquedaPortafolioController extends Controller
{
    public function index(Request $request)
    {
        // Filtros disponibles
        $idiomas = Idioma::all();
        $tiposVoz = TipoVoz::all();
        $estilosVoz = EstilosVoz::all();
        $rangosVocales = RangoVocal::all();
        $timbresVoz = TimbreVoz::all();
        $acentos = AcentosDialecto::all();

        // Query base
        $query = Perfile::query();

        // Búsqueda general
        if ($request->filled('q')) {
            $q = $request->q;
            $query->where(function ($sub) use ($q) {
                $sub->where('nombre', 'like', "%$q%")
                    ->orWhere('ubicacion', 'like', "%$q%")
                    ->orWhere('email', 'like', "%$q%")
                    ->orWhere('edad', $q);
            });
        }

        // Filtros avanzados
        if ($request->filled('idiomas')) {
            $query->whereHas('idiomas', fn($sub) => $sub->whereIn('idiomas.id', $request->idiomas));
        }
        if ($request->filled('tiposVoz')) {
            $query->whereHas('tiposVoz', fn($sub) => $sub->whereIn('tipo_voz.id', $request->tiposVoz));
        }
        if ($request->filled('estilosVoz')) {
            $query->whereHas('estilosVoz', fn($sub) => $sub->whereIn('estilos_voz.id', $request->estilosVoz));
        }
        if ($request->filled('rangosVocales')) {
            $query->whereHas('rangosVocales', fn($sub) => $sub->whereIn('rango_vocal.id', $request->rangosVocales));
        }
        if ($request->filled('timbresVoz')) {
            $query->whereHas('timbresVoz', fn($sub) => $sub->whereIn('timbre_voz.id', $request->timbresVoz));
        }
        if ($request->filled('acentos')) {
            $query->whereHas('acentosDialectos', fn($sub) => $sub->whereIn('acentos_dialectos.id', $request->acentos));
        }

        // Resultados
        $perfiles = $query->with(['idiomas','tiposVoz','estilosVoz','rangosVocales','timbresVoz','acentosDialectos'])
                          ->paginate(12)
                          ->appends($request->all()); // mantiene filtros en la paginación

        return view('busqueda.portafolios', compact(
            'idiomas', 'tiposVoz', 'estilosVoz', 'rangosVocales', 'timbresVoz', 'acentos', 'perfiles'
        ));
    }
}
