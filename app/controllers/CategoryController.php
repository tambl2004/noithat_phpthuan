<?php

class CategoryController extends Controller
{
    public function index()
    {
        $category = new Category();
        $data['categories'] = $category->all();

        $this->render("categories/index", $data);
    }

    public function create()
    {
        $this->render("categories/create");
    }

    public function store()
    {
        if (!empty($_POST['name'])) {
            $category = new Category();
            $category->create($_POST['name']);
        }

        header("Location: index.php?option=categories");
        exit;
    }

    public function edit()
    {
        $id = $_GET['id'] ?? 0;
        $category = new Category();
        $data['category'] = $category->find($id);

        $this->render("categories/edit", $data);
    }

    public function update()
    {
        $id = $_POST['id'] ?? 0;
        $name = $_POST['name'] ?? "";

        $category = new Category();
        $category->updateCategory($id, $name);

        header("Location: index.php?option=categories");
        exit;
    }

    public function delete()
    {
        $id = $_GET['id'] ?? 0;

        $category = new Category();
        $category->delete($id);

        header("Location: index.php?option=categories");
        exit;
    }
}
