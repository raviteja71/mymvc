<?php

// application/controllers/admin/blogController.class.php


class IndexController extends Controller 
{

    public function indexAction() {

        $blogModel = new BlogModel("articles");

        $blogs = $blogModel->getBlogs();

        // Load View template
        include  CURR_VIEW_PATH . "index.php";

    }
    
}
