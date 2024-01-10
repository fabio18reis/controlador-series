<?php


namespace App\Http\Controllers;


use App\Models\Serie;

use Illuminate\Http\Request;

class SeriesController extends Controller
{


    public function index(Request $request)
    {

        $series = Serie::query()
            ->orderBy('nome')
            ->get();

        $mensagem = $request->session()->get('mensagem');
        return view('series.index', compact('series', 'mensagem'));
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request)
    {
        $payload = $request->validate([
            'nome' => 'required|min:3',
        ]);
        Serie::create($payload);


        return redirect()->route('listar-series');
    }

    public function edit(Request $request, Serie $serie)
    {

        return view('series.edit', [
            'serie' => $serie
        ]);
    }


    public function destroy(Request $request)
    {

        Serie::destroy($request->id);

        return redirect()->route('listar-series');
    }
}
