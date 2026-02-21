<?php
namespace App\Controllers;
use App\Models\PostModel;
use App\Models\CategoryModel; // Assume you have this for categories

class PostController extends BaseController {
    protected $postModel;
    protected $categoryModel;

    public function __construct() {
        $this->postModel = new PostModel();
        $this->categoryModel = new CategoryModel();
    }

    public function index() {
        $data = [
            'posts' => $this->postModel->getPostsWithCategory(),
            'imageBaseUrl' => base_url('uploads/posts/'),
            'title' => 'Posts'
        ];
        return view('posts/index', $data);
    }

    public function create() {
    $categoriesRaw = $this->categoryModel->findAll();
    $categories = ['' => 'Select Category'];  // Optional blank
    foreach ($categoriesRaw as $cat) {
        $categories[$cat['id']] = $cat['name'];
    }
    
    $data = [
        'categories' => $categories,
        'title' => 'Create Post',
        'validation' => \Config\Services::validation()
    ];
    return view('posts/create', $data);
}


    public function store() {
    $validation = \Config\Services::validation();
    $validation->setRules([
        'title' => 'required|min_length[3]|max_length[255]',
        'content' => 'required|min_length[10]',
        'category_id' => 'required|integer|greater_than[0]',
        'image' => 'if_exist|uploaded[image]|max_size[image,2048]|ext_in[image,jpg,jpeg,png,gif]|is_image[image]'  // Fixed + if_exist optional
    ]);

    if (!$validation->withRequest($this->request)->run()) {
        return redirect()->back()->withInput()->with('errors', $validation->getErrors());
    }

    $imageFile = $this->request->getFile('image');
    $imageName = $imageFile->getRandomName();
    $imageFile->move(ROOTPATH . 'public/uploads/posts/', $imageName);

    $this->postModel->insert([
        'title' => $this->request->getPost('title'),
        'content' => $this->request->getPost('content'),
        'image' => 'uploads/posts/' . $imageName,
        'category_id' => $this->request->getPost('category_id')
    ]);

    return redirect()->to('/posts')->with('success', 'Post created!');
}

public function update($id)
{
    $model = new PostModel();
    $file = $this->request->getFile('image');

    if ($file->isValid() && !$file->hasMoved()) {
        $namaFile = $file->getRandomName();
        $file->move('uploads', $namaFile);
    } else {
        $namaFile = $this->request->getPost('old_image');
    }

    $model->update($id, [
        'title' => $this->request->getPost('title'),
        'content' => $this->request->getPost('content'),
        'category_id' => $this->request->getPost('category_id'),
        'image' => $namaFile
    ]);

    return redirect()->to('/posts')->with('success', 'Posts berhasil diupdate');
}
    public function edit($id)
    {
        $postModel = new PostModel();
        $categoryModel = new CategoryModel();

        $data['posts'] = $postModel->find($id);
        $data['categories'] = $categoryModel->findAll();

        return view('posts/edit', $data);
    }

    public function delete($id)
    {
    $this->postModel->delete($id);
    return redirect()->to('/posts')->with('success', 'Post deleted!');
    }
}