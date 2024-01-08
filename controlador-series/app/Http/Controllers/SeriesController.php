<?php 


namespace App\Http\Controllers;


use App\Models\Serie;

use Illuminate\Http\Request;

class SeriesController extends Controller{


    public function index(Request $request){

        $series = Serie::query()
        ->orderBy('nome')
        ->get();
    
        $mensagem = $request->session()->get('mensagem');
        return view('series.index',compact('series', 'mensagem'));
    }

    public function create(){
     return view('series.create');
    }

    public function store(Request $request){
        $request->validate([
            'nome'=> 'required|min:3',
        ]);
       $serie =  Serie::create(["nome" => $request->nome]);
        $qtdTemporadas = $request ->qtd_temporadas;

        for($i = 1; $i <= $qtdTemporadas; $i++){

            $temporada = $serie->temporadas()->create(['numero' => $i]);

            for($j = 1; $j <= $request->qtd_episodios; $j++){
              $temporada =  $temporada->episodios()->criar(['numero' => $j]);
            }
        }


       $request ->session()
       ->flash('mensagem',"Série:{$serie->id} Adicionada com sucesso: {$serie->nome}");
        //Echo "Série com Id [$serie->id} Criada: {$serie->nome}";
        return redirect()->route('listar-series');
    }


    public function destroy(Request $request){

        Serie::destroy($request->id);
        $request ->session()
       ->flash('mensagem',"Série Deletada com sucesso");
        return redirect()->route('listar-series');
    }

  


}