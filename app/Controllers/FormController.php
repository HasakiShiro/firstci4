<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class FormController extends Controller
{
    public function index()
    {
        return view('tuto04/form');
    }

    public function saveFormData()
    {
        $formData = array(
            'number' => $this->request->getPost('number'),
            'month' => $this->request->getPost('month'),
            'year' => $this->request->getPost('year')
        );

        $serializedData = serialize($formData);

        $model = new \App\Models\FormDataModel();
        $model->insert(array('data' => $serializedData));

        // Redirect to success_form page
        return view('tuto04/success_form');
    }
}
