<?php

namespace App\Services;

use App\Models\Post;

class PostService{
    // Save
    public function save(array $data, $id = null){
        return Post::updateOrCreate(
            [
                'id' => $id
            ],
            [
                'title' => $data['title'],
                'description' => $data['description']
            ]
        );
    }
    //get all
    public function getAll($limit = 6){
        return Post::paginate($limit);
    }
    //get by id
    public function getById($id){
        return Post::find($id);
    }
    //Delete
    public function delete($id){
        return Post::destroy($id);
    }
}