<?php

namespace App\Controllers;

use App\Models\NewsModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class News extends BaseController
{
    public function index()
    {
        $model = model(NewsModel::class);

        $data = [
            'news'  => $model->getNews(),
            'title' => 'Emails archive',
        ];

        return view('templates/header', $data)
            . view('news/index')
            . view('templates/footer');
    }

    public function view($slug = null)
    {
        $model = model(NewsModel::class);

        $data['news'] = $model->getNews($slug);

        if (empty($data['news'])) {
            throw new PageNotFoundException('Cannot find the news item: ' . $slug);
        }

        $data['title'] = $data['news']['title'];

        // return view('templates/header', $data)
        return view('templates/header', $data)
            . view('news/view')
            . view('templates/footer');
    }

    public function create()
    {
        helper('form');

        // Checks whether the form is submitted.
        if (! $this->request->is('post')) {
            // The form is not submitted, so returns the form.
            return view('templates/header', ['title' => 'New Message'])
                . view('news/create')
                . view('templates/footer');
        }

        $post = $this->request->getPost(['email', 'title', 'body']);

        // Checks whether the submitted data passed the validation rules.
        if (! $this->validateData($post, [
            'email' => 'required|max_length[255]|min_length[3]',
            'title' => 'required|max_length[255]|min_length[3]',
            'body'  => 'required|max_length[5000]|min_length[10]',
        ])) {
            // The validation fails, so returns the form.
            return view('templates/header', ['title' => 'New Message'])
                . view('news/create')
                . view('templates/footer');
        }

        $model = model(NewsModel::class);

        $model->save([
            'email' => $post['email'],
            'title' => $post['title'],
            'slug'  => url_title($post['title'], '-', true),
            'body'  => $post['body'],
        ]);

        return view('templates/header', ['title' => 'New Message'])
            . view('news/success')
            . view('templates/footer');
    }

    public function edit($slug=0)
    {
        $model=model(NewsModel::class);
        $data['emailArray'] = $model->getNews($slug);

        return view('templates/header', ['title' => 'Update News'])
            . view('news/update', $data)
            . view('templates/footer');
    }

    public function update()
    {
        helper('form', 'url');

        $model = model(NewsModel::class);
        // Creates an array $existingData for updating slug=title if title is updated (coded later on below)
        $existingData = $model->find($this->request->getVar('id'));

        $data = [
            'id' => $this->request->getVar('id'),
            'email' => $this->request->getVar('email'),
            'title' => $this->request->getVar('title'),
            'slug' => $this->request->getVar('slug'),
            'body' => $this->request->getVar('body')
        ];
            
        // Check to see if 'Title' field is updated
        if ($data['title'] !== $existingData['title']) {
            // if title updated, update slug=title
            $data['slug'] = url_title($data['title'], '-', true);
        }

        $primaryKey = 'id';

        $model->save($data);

        return view('templates/header', ['title' => 'Update Success!'])
            . view('news/success')
            . view('templates/footer');
    }

    public function delete($slug=0)
    {
        $model = model(NewsModel::class);
        $data['emailArray'] = $model->getNews($slug);
        $model->where('id', $data['emailArray']['id'])->delete();

        if ($this->request->is('delete')) {
            // The form is not submitted, so returns the form.
            return view('templates/header', ['title' => 'New Message'])
            . view('news/success')
            . view('templates/footer');
        }

        return view('templates/header', ['title' => 'Deletion Success!'])
            . view('news/success')
            . view('templates/footer');
    }
}