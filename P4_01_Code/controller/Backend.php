<?php

namespace kukovski\projet\model;

use PostManager;
use CommentManager;
use ReportManager;

class Backend extends Database
{
    private function canConnect(string $pseudo, string $pass)
    {
        $Admin = new Admin();
        $results = $Admin->getAdminByPseudo($pseudo);
        if (!$results) {
            return false;
        }

        return password_verify($pass, $results['password']);
    }

    public function signOut()
    {
        session_destroy();
        header("Location: index.php");
    }

    // Backend View
    public function home()
    {
        if (isset($_SESSION['LOGGED_ADMIN'])) {
            require('view/backend/home.php');
        } else {
            if (!empty($_POST['pseudo']) && !empty($_POST['pass'])) {
                if ($this->canConnect($_POST['pseudo'], $_POST['pass'])) {
                    $_SESSION['LOGGED_ADMIN'] = $_POST['pseudo'];
                    header('Location: indexAdmin.php');
                } else {
                    header('Location: indexAdmin.php?error=1');
                }
            } elseif (!empty($_POST['pseudo']) || !empty($_POST['pass'])) {
                header('Location: indexAdmin.php?error=2');
            } else {
                require('view/backend/login.php');
            }
        }
    }

    public function viewAddPost()
    {
        require('view/backend/addPost.php');
    }
    public function editPost()
    {
        if (isset($_GET['id'])) {
            $PostManager = new PostManager();
            $post = $PostManager->get($_GET['id']);
            require('view/backend/editPost.php');
        } else {
            header('Location: indexAdmin.php?action=listPost');
        }
    }
    public function listPost()
    {

        $PostManager = new PostManager();
        $posts = $PostManager->getAll();

        require('view/backend/listPost.php');
    }

    public function reportedList()
    {
        $ReportManager = new ReportManager();
        $reportedComments = $ReportManager->getAll();
        $CommentManager = new CommentManager();
        for ($i = 0; $i < count($reportedComments); $i++) {
            $comment = $CommentManager->getComment($reportedComments[$i]['id_comment']);
            $reportedComments[$i]['author'] = $comment['author'];
            $reportedComments[$i]['content'] = $comment['comment']; // TODO content a place de comment 
        }
        require('view/backend/report.php');
    }

    // Backend function ADD/EDIT/DELETE Post
    public function addPost()
    {
        $PostManager = new PostManager();
        if (isset($_POST['title']) && !empty($_POST['title']) && isset($_POST['content']) && !empty($_POST['content'])) {
            $PostManager->set(htmlspecialchars($_POST['title']), $_POST['content']);

            header('Location: indexAdmin.php?action=listPost');
        } else {
            header('Location: indexAdmin.php?action=viewAddPost&error=1');
        }
    }

    public function updatePost()
    {
        $PostManager = new PostManager();
        if (
            isset($_POST['id'], $_POST['title'], $_POST['content']) &&
            !empty($_POST['id']) && !empty($_POST['title']) && !empty($_POST['content'])
        ) {
            $PostManager->update($_POST['id'], $_POST['title'], $_POST['content']);
            header('Location: indexAdmin.php?action=listPost');
        } else {
            header('Location: indexAdmin.php?action=listPost&error=1');
        }
    }

    public function deletePost()
    {
        $PostManager = new PostManager();
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $PostManager->delete($_GET['id']);
            header('Location: indexAdmin.php?action=listPost');
        } else {
            header('Location: indexAdmin.php');
        }
    }

    public function deleteComment()
    {
        if (!empty($_GET['id_comment']) && $_GET['id_comment'] > 0) {
            $CommentManager = new CommentManager();
            $CommentManager->deleteComment($_GET['id_comment']);
            $ReportManager = new ReportManager();
            $ReportManager->delete($_GET['id_comment']);
        }
        header('Location: indexAdmin.php?action=reportedList');
    }

    public function deleteReport()
    {
        if (!empty($_GET['id_comment']) && $_GET['id_comment'] > 0) {
            $ReportManager = new ReportManager();
            $ReportManager->delete($_GET['id_comment']);
        }
        header('Location: indexAdmin.php?action=reportedList');
    }
}
