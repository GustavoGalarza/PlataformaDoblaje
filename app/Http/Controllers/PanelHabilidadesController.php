<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idioma;
use App\Models\TipoVoz;
use App\Models\EstilosVoz;
use App\Models\RangoVocal;
use App\Models\TimbreVoz;
use App\Models\AcentosDialecto;

class PanelHabilidadesController extends Controller
{
    public function index()
    {
        $idiomas = Idioma::all();
        $tipoVozs = TipoVoz::all();
        $estilosVozs = EstilosVoz::all();
        $rangoVocals = RangoVocal::all();
        $timbreVozs = TimbreVoz::all();
        $acentosDialectos = AcentosDialecto::all();

        return view('habilidades.panel', compact(
            'idiomas', 
            'tipoVozs', 
            'estilosVozs', 
            'rangoVocals', 
            'timbreVozs', 
            'acentosDialectos'
        ));
    }
}
