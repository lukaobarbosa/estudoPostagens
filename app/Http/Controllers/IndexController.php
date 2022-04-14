<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Contracts\RepositoryContractInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\PostRequest;
use App\Http\Requests\UpdateRequest;

class IndexController extends Controller
{
    public function createUser(RepositoryContractInterface $model, Request $request)
    {   
        $model->createUser(['name' => $request->input('name'),
                            'email' => $request->input('email'),
                            'password' => Hash::make($request->input('password'))
        ]);

        return redirect()->route('viewIndexPage');
    }

    public function createPost(RepositoryContractInterface $model, PostRequest $request, $id)
    {  
        $model->createPost($id, $request->all());

        return back(); 
    }

    public function authUser(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)){
            
            $request->session()->regenerate();
            
            return redirect()->intended('/contentPage/{id}');
        }

        return back()->withErrors(['status' => 'Email ou Senha incorretos']);
    }

    public function deletePost(RepositoryContractInterface $model, $id)
    {
        $model->deletePost($id);

        return back();
    }

    public function updatePost(RepositoryContractInterface $model, $id, UpdateRequest $request)
    {
        $model->updatePost($id, $request->all());

        return redirect()->route('contentPage', $id);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('viewIndexPage');
    }
    
    public function viewIndexPage()
    {
        return view('indexPage');
    }

    public function viewRegisterPage()
    {
        return view('registerPage');
    }
    
    public function viewContentPage(RepositoryContractInterface $model)
    {
        $posts = $model->getPost();
        
        $id = Auth::id();

        return view('contentPage', compact('posts', 'id'));
    }

    public function viewUpdatePage(RepositoryContractInterface $model, $id)
    {
       $getOnePost = $model->getOnePost($id);

        return view('updatePage', compact('id','getOnePost'));
    }
}
