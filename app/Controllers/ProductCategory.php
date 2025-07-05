<?php

namespace App\Controllers;

use App\Models\ProductCategoryModel;

class ProductCategory extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new ProductCategoryModel();
    }

    public function index()
    {
        $data['categories'] = $this->model->findAll();
        return view('v_produkkategori', $data);
    }

    public function create()
    {
        $dataForm = [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'created_at' => date('Y-m-d H:i:s')
        ];

        $this->model->insert($dataForm);

        return redirect()->to('productcategory')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $dataForm = [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $this->model->update($id, $dataForm);

        return redirect()->to('productcategory')->with('success', 'Data berhasil diubah!');
    }

    public function delete($id)
    {
        $this->model->delete($id);

        return redirect()->to('productcategory')->with('success', 'Data berhasil dihapus!');
    }
}
