<?php

// application/controllers/admin/blogController.class.php


class BlogController extends Controller {

    public function mainAction(){

        include CURR_VIEW_PATH . "main.html";

        // Load Captcha class

        $this->loader->library("Captcha");

        $captcha = new Captcha;

        $captcha->hello();

        $userModel = new UserModel("user");

        $users = $userModel->getUsers();

    }

    public function indexAction(){

        $blogModel = new BlogModel("articles");

        $blogs = $blogModel->getBlogs();

        // Load View template
        $this->setView('index.php');

    }

    public function menuAction(){

        include CURR_VIEW_PATH . "menu.html";

    }

    public function dragAction(){

        include CURR_VIEW_PATH . "drag.html";

    }

    public function topAction(){

        include CURR_VIEW_PATH . "top.html";

    }

}
