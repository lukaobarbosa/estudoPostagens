<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Models\Post;
use App\Repositories\Contracts\RepositoryContractInterface;

class AbstractRepository implements RepositoryContractInterface
{
   protected $modelUser;
   protected $modelPost;

    public function __construct(User $modelUser, Post $modelPost)
    {   
        $this->modelUser = $modelUser;

        $this->modelPost = $modelPost;
    }

   public function createUser(array $data)
   {
       return $this->modelUser->create($data);
   }

   public function createPost($id, array $data)
   {
        return $this->modelUser->find($id)->posts()->create($data);
   }

   public function getPost()
   {
       return $this->modelPost->orderByDesc('created_at')->Paginate(5);
   }

   public function deletePost($id)
   {
       return $this->modelPost->destroy($id);
   }

   public function getOnePost($id)
   {
       return $this->modelPost->where('id', $id)->first();
   }

   public function updatePost($id, array $data)
   {
        return $this->modelPost->find($id)->update($data);
   }

}