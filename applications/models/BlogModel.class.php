<?php

Class BlogModel extends Model
{
    public function getBlogs() {
        $sql = "select * from $this->table";

        $blogs = $this->db->getAll($sql);

        return $blogs;
    }
}
