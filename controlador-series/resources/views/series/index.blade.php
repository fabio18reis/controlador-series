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

        @foreach ($series as $serie)
            <li class="list-group-item justify-content-between d-flex align-items-center">{{ $serie->nome }}
                <div class="d-flex align-items-end justify-content-between m-2">
                    <form action="/series/remover/{{ $serie->id }}" method="POST"
                        onsubmit="return confirm('Tem certeza que deseja excluir a série {{ addslashes($serie->nome) }}?')">
                        @csrf
                        <!-- Mudando o tipo de envio desse formulário com laravel -->
                        @method('delete')
                        <button href="#" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
@endsection
