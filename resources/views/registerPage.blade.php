@extends('masterPage')

@section('registerPage')

<div class="container-fluid text-center text-primary mt-5">
    <h1>Por Favor Registre-se !!</h1>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-4 offset-4" style="margin-top: 80px">
            <form action="{{route('createUser')}}" method="POST">
                @csrf
                
            <div class="mb-3 mt-3">
                    <label for="name" class="form-label">Nome:</label>
                    <input type="text" class="form-control" id="neme" placeholder="Nome" name="name">
                </div>
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Email" name="email">
                </div>
                <div class="mb-3">
                    <label for="pwd" class="form-label">Senha:</label>
                    <input type="password" class="form-control" id="pwd" placeholder="Senha" name="password">
                </div>
                <button type="submit" class="btn btn-primary">Criar</button>
                <a class="btn btn-primary" href="{{route('viewIndexPage')}}">Cancelar</a>
            </form>
        </div>
    </div>

@endsection