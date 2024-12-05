<?php
include_once 'config/database.php';
include_once 'models/User.php';
include_once 'models/News.php';
//include_once '../controllers/NewsController.php';

class AdminController {
    private $userModel;
    private $newsModel;

    public function __construct() {
        $database = new Database();
        $this->userModel = new User($database->pdo);
        $this->newsModel = new News($database->pdo);
        $this->categoryModel = new Category($database->pdo);
    }

    public function login()
    {
        $error = ''; 
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = $this->userModel->login($username, $password);

            if ($user) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['user_role'] = $user['role'];
                header('Location: ?action=dashboard');
                exit();
            } else {
                $error = "Sai tên đăng nhập hoặc mật khẩu";
            }
        }
        include 'views/admin/login.php';
    }

    public function dashboard() {
        //For Dũng béo
        $news = $this->newsModel->getAll();
        $_SESSION['category'] = $this->categoryModel->getAll();
        include 'views/admin/dashboard.php';
    }

    public function addNews() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Xử lý thêm tin tức
            $title = $_POST['title'];
            $content = $_POST['content'];
            $category_id = $_POST['category_id'];
            $image = $_FILES['image']['name'];

            move_uploaded_file($_FILES['image']['tmp_name'], "../uploads/" . $image);

            $this->newsModel->add($title, $content, $image, $category_id);
            header('Location: index.php?action=dashboard');
            exit();
        }
        $categories = $this->categoryModel->getAll();
        include '../views/admin/news/add.php';
    }

    public function editNews($id) {
        $news = $this->newsModel->getById($id);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Xử lý sửa tin tức
            $title = $_POST['title'];
            $content = $_POST['content'];
            $category_id = $_POST['category_id'];
            $image = $_FILES['image']['name'];

            if (!empty($image)) {
                move_uploaded_file($_FILES['image']['tmp_name'], "../uploads/" . $image);
            } else {
                $image = $news['image'];
            }

            $this->newsModel->update($id, $title, $content, $image, $category_id);
            header('Location: index.php?action=dashboard');
            exit();
        }
        $categories = $this->categoryModel->getAll();
        include 'views/admin/news/edit.php';
    }

    public function deleteNews($id) {
        $this->newsModel->delete($id);
        header('Location: index.php?action=dashboard');
        exit();
    }

    public function logout() {
        session_destroy();
        header('Location: index.php');
        exit();
    }
}
?>