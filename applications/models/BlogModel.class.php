<?php

Class BlogModel extends Model
{
    public function getBlogs() {
        $userTable = "users";
        
        $sql = "select b.*, u.username from $this->table b left join 
                users u on b.user_id=u.id order by b.date desc limit 5 ";

        $blogs = $this->db->getAll($sql);
        
        return $blogs;
    }
}
