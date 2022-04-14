@extends('masterPage')

@section('indexPage')
<div class="containe-fluid text-center mt-5 text-primary">
    <h1>Bem Vindo ao Chat do Lukao</h1>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-4 offset-4" style="margin-top: 160px">
            <form action="{{route('authUser')}}" method="POST">
                @csrf
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Email" name="email">
                </div>
                <div class="mb-3">
                    <label for="pwd" class="form-label">Senha:</label>
                    <input type="password" class="form-control" id="pwd" placeholder="Senha" name="password">
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
                <a class="btn btn-primary" href="{{route('viewRegisterPage')}}">Cadastrar</a>
            </form>
            @if ($errors->any())
            <div class="mt-4 text-center">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li style="list-style-type: none">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            </div>
        </div>
    </div>
</div>
    @endsection