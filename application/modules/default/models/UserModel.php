<?php

class UserModel extends AppModel
{
    public function read($user_id = null)
    {
        return $this->_db->fetchAll("SELECT * FROM users");
    }

}