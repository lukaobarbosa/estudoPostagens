@extends('masterPage')

@section('contentPage')
<div style="display: flex;">
    <div class="container-fluid text-center mt-2 text-primary">
        <h2>Bem Vindo ao Chat</h2>
    </div>
    <div class="text-center mt-2 mx-2">
        <a style="text-decoration: none" href="{{route('logout')}}">Deslogar</a>
    </div>
</div>
<div class="row mx-0">
    <div class="col-8 offset-2 mt-4">
        @foreach ($posts as $post)
        <div class="mt-3 mb-3" style="overflow-wrap: break-word; border: 1px solid #A799FF; border-radius: 5px; background-color: #F9F8FF">
            <div style="display: flex; justify-content: space-between">
                <span>
                    <h5 class="px-3 py-2">{{$post->users->name}}</h5>
                </span>
                <span>
                    <p class="px-3 py-2">{{$post->created_at}}</p>
                </span>
            </div>
            <span>
                <p class="px-3 py-2">{{$post->post}}</p>
            </span>
            @if ($id == $post->users->id)
            <div class="px-3 py-2 d-flex">
                <form action="{{route('deletePost', ['id' => $post->id])}}" method="post">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger">Deletar</button>
                </form>
                <a class="btn btn-secondary mx-2" href="{{route('viewUpdatePage', ['id' => $post->id])}}">Edit</a>
            </div>
            @endif
        </div>
        @endforeach
        {{$posts->links()}}
    </div>
</div>
<div class="container-fluid mb-4">
    <div class="text-center">
        <form action="{{route('createPost', ['id' => $id])}}" method="POST">
            @csrf
            <textarea name="post" id="" cols="30" rows="4" style="width: 50%; margin-top: 100px"></textarea>
            <div>
                <button class="btn btn-primary" type="submit">Postar</button>
            </div>
        </form>
        @if ($errors->any())
        <div class="alert">
            <ul>
                @foreach ($errors->all() as $error )
                <li style="list-style-type: none;">{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
</div>

@endsection