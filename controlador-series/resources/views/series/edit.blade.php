@extends('layout')

@section('cabeçalho')
    Series
@endsection

@section('conteudo')
    @if (!empty($mensagem))
        <div class="alert alert-success">
            {{ $mensagem }}
        </div>
    @endif
    <a href="{{ route('form-criar-serie') }}" class="btn btn-dark mb-2">Adicionar</a>
    <ul class="list-group">

        {{ $serie }}
        <br>
        {{ $serie->nome}}
    </ul>
@endsection
