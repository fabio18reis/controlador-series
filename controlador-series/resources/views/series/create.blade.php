@extends('layout')

@section('cabeçalho')
    Serie
@endsection

@section('conteudo')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post">
        <!-- token para envio de requisições -->
        @csrf
        <div class="row">
            <div class="col col-8">
                <label class="" for="nome">Nome da Série</label>
                <input type="text" class="form-control" name="nome" id="nome">
            </div>

            <div class="col col-col8">
                <label class="" for="qtd_episodios">N° de Temporadas</label>
                <input type="number" class="form-control" name="qtd_temporadas" id="qtd_temporadas">
            </div>

            <div class="col col-col8">
                <label class="" for="qtd_episodios">N° de Episódios</label>
                <input type="number" class="form-control" name="qtd_episodios" id="qtd_episodios">
            </div>
        </div>
        <button class="btn btn-primary mt-2 ">Adicionar</button>
    </form>
@endsection
