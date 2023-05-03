<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Episode;
use App\Models\Season;
use App\Models\Serie;
use DomainException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Symfony\Component\Routing\Exception\InvalidParameterException;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        // $series = Serie::select()
        //     ->orderBy('name')
        //     ->get();]

        $series = Serie::all();

        $title = "Séries e Filmes";
        $msg = $request->session()->get('msg');
        $request->session()->forget('msg');

        return view('series.index', compact('series', 'title'))->with('msg', $msg);
    }

    public function create()
    {
        return view('series.form-adicionar', ['name' => '', 'id' => '']);
    }

    public function storeNew(SeriesFormRequest $request)
    {
        // $name = $request->name;
        
        // $serie = new Serie();
        // $serie->name = $name;
        // $serie->save();

        /**
         * Usando a propriedade 'mass assignment (atribuição em massa)' deve 
         * adicionar ao model a linha 'private $fillable = ['name'];'. Passamos 
         * um array para a variável com o nome dos campos que ele deverá aceitar. 
         * 
         * Nesse caso, poderia estar usando essa propriedade passando por
         * parâmetro '$request->all()'. Como não considero tão verboso para
         * que outros desenvolvedores possam dar manutenção decidi deixar dessa
         * forma como abaixo. Passando cada valor. Dessa forma acredito que
         * não será necessário ir até a model e ver o que está recebendo.
         * O valor passado deve ser um array.
         * 
         * Existem também o '$request->only(['name', [...]), Serie::create(['name' => $request->name])' 
         * e outros. Olhe a documentação para mais.
         */
        $serie = Serie::create($request->all());
    
        $seasons = [];
        for ($i = 1; $i <= $request->seasonsQtd; $i++) {
            $seasons[] = [
                'number' => $i,
                'series_id' => $serie->id
            ];
        }
        Season::insert($seasons);

        $episodes = [];
        foreach ($serie->seasons as $season) {
            for ($x = 1; $x <= $request->episodesQtd; $x++) {
                $episodes[] = [
                    'number' => $x,
                    'season_id' => $season->id
                ];
            }
        }
        Episode::insert($episodes);

        // $request->session()->put('msg', "Série '{$serie->name}' adicionada com sucesso!");
        
        // Redirecionando o usuário com uma flash message.
        return redirect('/series')->with('msg', "Série '{$serie->name}' adicionada com sucesso!");
    }

    public function edit(Request $request)
    {
        $serie = Serie::find($request->id);
        return view('series.form-editar', ['name' => $serie->name, 'id' => $serie->id]);
    }

    public function storeEdited(Serie $serie, SeriesFormRequest $request)
    {
        if (!$request->id) {
            throw new InvalidParameterException("Houve um problema ao editar o registro.");
        }

        $serie = Serie::find($request->id);
        $nomeAntigo = $serie->name;
        $serie->name = $request->name;
        $serie->save();
        
        return redirect('/series')->with('msg', "Série atualizada de '{$nomeAntigo}' para '{$serie->name}'!");
    }

    public function destroy(Serie $serie, Request $request)
    {
        $serie->delete();
        // $request->session()->put('msg', "Série '{$serie->name}' removida com sucesso!");

        return redirect('/series')->with('msg', "Série '{$serie->name}' removida com sucesso!");
    }
}
