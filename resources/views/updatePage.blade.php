@extends('masterPage')

@section('updatePage')

<div class="container-fluid">
    <div class="container-fluid text-center text-primary mt-4">
        <h1>Atualize seu comentario</h1>
    </div>
    <div class="row">
        <div class="col-6 offset-3 text-center">
            <div style="margin-top: 180px;">
                <form action="{{route('updatePost', ['id' => $id])}}" method="post">
                    @csrf
                    @method('put')
                    <textarea name="post" id="" cols="70" rows="10">{{$getOnePost->post}}</textarea>
                    <button class="btn btn-primary mt-2" type="submit">Atualizar</button>
                </form>
                @if ($errors->any())
                <div class="mt-2">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li style="list-style: none;">{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
        </div>
    </div>

</div>


@endsection