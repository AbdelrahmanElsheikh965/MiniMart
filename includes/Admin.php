<?php

include 'Database.php';

class Admin extends DataBase
{
    public function edit_prod($title, $desc, $aval, $price, $image, $id){   
        $title = $this->connection->real_escape_string($title);
        $desc = $this->connection->real_escape_string($desc);
        $sql  = "UPDATE `products` SET `title`='$title', `desc`='$desc', aval=$aval, price=$price, image='$image' WHERE id=$id";
        $res  = $this->connection->query($sql);
        if ($this->connection->affected_rows > 0)
            return "True";
        return "False";
    }

    public function add_prod($title, $desc, $aval, $price, $image, $admin_id){
        $title = $this->connection->real_escape_string($title);
        $desc = $this->connection->real_escape_string($desc);
        $sql  = "INSERT INTO `products`(`title`, `desc`, `aval`, `price`, `image`, `admin_id`) 
                    VALUES ('$title', '$desc', $aval, $price, '$image', $admin_id)";
        $res  = $this->connection->query($sql);
        if ($res)
            return "True";
        return "False";
    }

    public function delete($table, $id){
        $sql  = "DELETE FROM `$table` WHERE id=$id";
        $res  = $this->connection->query($sql);
        if ($res)
            return "True";
        return "False";
    }
}

