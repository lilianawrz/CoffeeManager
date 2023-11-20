@extends('base.app')
@section('titulo', 'Formulário de empresa')
@section('content')

@if ($errors->any())
<ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
@endif

@php
$route = !empty($company->id) ? route('company.update', $company->id) : route('company.store');
@endphp

<div class="row g-3">
    <div class="col-md-10 p-4">
        <h4>Formulário de empresa</h4>
        <div style="padding-top: 10px">
            <form action="{{ $route }}" method="POST" enctype="multipart/form-data"
                class="bg-white shadow-md rounded px-8 pt-6 pb-6 mb-4">
                @csrf <!-- Cria um hash de segurança -->
                @if (!empty($company->id))
                @method('PUT')
                @endif

                <div class="mb-3">
                    <input type="hidden" name="id" value="{{ !empty($company->id) ? $company->id : old('id', '') }}">
                    <label class="form-label">Nome</label>
                    <input type="text" name="name" class="form-control"
                        value="{{ !empty($company->name) ? $company->name : old('name', '') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">CNPJ</label><br>
                    <input type="text" name="cnpj" class="form-control"
                        value="{{ !empty($company->cnpj) ? $company->cnpj : old('cnpj', '') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">E-mail</label><br>
                    <input type="text" name="email" class="form-control"
                        value="{{ !empty($company->email) ? $company->email : old('email', '') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Telefone</label><br>
                    <input type="text" name="phone" class="form-control"
                        value="{{ !empty($company->phone) ? $company->phone : old('phone', '') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Tipo de pagamento</label><br>
                    <input type="text" name="paymentType" class="form-control"
                        value="{{ !empty($company->paymentType) ? $company->paymentType : old('paymentType', '') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Prazo</label><br>
                    <input type="text" name="deadline" class="form-control"
                        value="{{ !empty($company->deadline) ? $company->deadline : old('deadline', '') }}">
                </div>

                <div class="row">
                    <div class="col-1">
                        <button type="submit" class="btn btn-success">Salvar</button>
                    </div>
                    <div class="col-1">
                        <a id="a" class="btn btn-secondary" style="text-decoration:none;"
                            href="{{ route('company.index') }}">Voltar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection