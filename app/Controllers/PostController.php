<?php

namespace App\Controllers;

use App\Models\PostModel;

class PostController extends BaseController
{
    public function index()
    {
        $model = new PostModel();
        $data['posts'] = $model->findAll();

        return view('posts/index',$data);
    }

    public function create()
    {
        return view('posts/create');
    }

    public function store()
    {
        $model = new PostModel();
        $data = [
            'email' => $this->request->getPost('email'),
            'title' => $this->request->getPost('title'),
            'slug' => $this->request->getPost('slug'),
            'body' => $this->request->getPost('body')
        ];
        $model->insert($data);

        return redirect()->to('/posts');
    }

    public function edit($id)
    {
        $model = new PostModel();
        $data['post'] = $model->find($id);

        return view('posts/edit', $data);
    }

    public function update($id)
    {
        $model = new PostModel();
        $data = [
            'email' => $this->request->getPost('email'),
            'title' => $this->request->getPost('title'),
            'slug' => $this->request->getPost('slug'),
            'body' => $this->request->getPost('body')
        ];
        $model->update($id, $data);

        return redirect()->to('/posts');
    }

    // public function delete($slug=0)
    public function delete($id)
    {
        $model = model(NewsModel::class);
        $data['emailArray'] = $model->getEmail($slug);
        $model->where('id', $data['emailArray']['id'])->delete();

        

        $model = new PostModel();
        $model->delete($id);

        return redirect()->to('/posts');
    }
}