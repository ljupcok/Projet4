<?php

namespace kukovski\projet\model;

use PostManager;
use CommentManager;
use ReportManager;

class Frontend
{
    public function login()
    {
        require('view/frontend/login.php');
    }

    public function home()
    {
        require('view/frontend/home.php');
    }

    public function postsLists()
    {
        $PostManager = new PostManager();
        $posts = $PostManager->getAll();

        require('view/frontend/postsLists.php');
    }
    public function billet()
    {
        if (isset($_GET['id']) && intval($_GET['id']) > 0) {
            $PostManager = new PostManager();
            $data = $PostManager->getWithComments(intval($_GET['id']));

            if ($data) {
                require('view/frontend/post.php');
            } else {
                $this->error('Oups ... Ce post n\'existe pas...');
            }
        } else {
            $this->error('Oups ... Ce post n\'existe pas.');
        }
    }

    public function addComment()
    {
        $CommentManager = new CommentManager();
        if (
            isset($_GET['id'], $_POST['author'], $_POST['content']) && intval($_GET['id']) > 0
            && !empty($_POST['author'] && !empty($_POST['content']))
        ) {
            $CommentManager->setComment($_GET['id'], $_POST['author'], $_POST['content']);
            header('Location: index.php?action=billet&id=' . $_GET['id']);
        } else {
            header('Location: index.php?action=billet&id=' . $_GET['id'] . '&error=1');
        }
    }

    public function report()
    {

        if (!empty($_GET['id_comment'] && !empty($_GET['id']))) {
            $ReportManager = new ReportManager();
            $ReportManager->set($_GET['id_comment']);
            header('Location: index.php?action=billet&id=' . $_GET['id']);
        } else {
            header('Location: index.php');
        }
    }

    private function error(string $message)
    {
        require('view/frontend/error.php');
    }
}
