<?php
include_once '../config/database.php';
include_once '../models/User.php';
include_once '../models/News.php';
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
        //For Nam gay
            public static function Login($username, $password, $role){
                global $conn;
                $stmt = $conn->prepare("select * from users where username = ? and password = ? and role = ? and");
                $stmt->bind_param("ss", $username, $password, $role);
                $stmt->execuusers
                $result = $stmt->get_result();
                $stmt->close();
                $conn->close();
                return $result->num_rows > 0;
            }
    }

    public function index() {
        //For Dũng béo
    }

    public function dashboard() {
        //For Dũng béo
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
            header('Location: ../public/index.php?action=dashboard');
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
            header('Location: ../public/index.php?action=dashboard');
            exit();
        }
        $categories = $this->categoryModel->getAll();
        include '../views/admin/news/edit.php';
    }

    public function deleteNews($id) {
        $this->newsModel->delete($id);
        header('Location: ../public/index.php?action=dashboard');
        exit();
    }

    public function logout() {
        //For Nam gay too
        session_start();
        session_unset();
        session_destroy();
        header("Location: /views/admin/login.php");
        exit();
    }
}

?>