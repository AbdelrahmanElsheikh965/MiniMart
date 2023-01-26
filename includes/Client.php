<?php

include 'DataBase.php';

class Client extends DataBase
{

    public function setNewPass($id, $pass_1, $pass_2){
        $password = (($pass_1 === $pass_2) && strlen($pass_1) >= 8 ) ? base64_encode($pass_1) : "NotMatch";
        if ($password !== "NotMatch"){
            $sql  = "UPDATE `clients` SET `password`='$password' WHERE id=$id";
            $res  = $this->connection->query($sql);
            if ($res)
                return "True";
            return "False";
        }else{
            return "Error - Your password length should not be < 8 and must match!";
        } 
    }
    
    // Add a review (feedback)
    public function Add_Rev($title, $content, $client_id){
        $current = date("Y-m-j");
        $title   = $this->connection->real_escape_string($title);
        $content = $this->connection->real_escape_string($content);
        $sql  = "INSERT INTO reviews (`title`, `content`, created_on, client_id) VALUES ('$title', '$content', '$current', $client_id)";
        $res  = $this->connection->query($sql);
        if ($res)
            return "True";
        return "False";
    }

    // Remove from cart
    public function removeFC($id, $c_id){  
        $amountSQL  = "SELECT amount FROM `orders` WHERE product_id=$id AND client_id=$c_id";
        $r  = $this->connection->query($amountSQL);
        $amount = mysqli_fetch_assoc($r)['amount'];
        if ($amount > 1) {
            $sql  = "UPDATE `orders` SET `amount`=$amount-1 WHERE product_id=$id AND client_id=$c_id";
            $res  = $this->connection->query($sql);
            if ($res)
                return "True";
            return "False";
        }else if ($amount == 1){
            $sql  = "DELETE FROM `orders` WHERE product_id=$id AND client_id=$c_id";
            $res  = $this->connection->query($sql);
            if ($res)
                return "True";
            return "False";
        }
    }

    // TODO: Create addToCart function
    public function addToCart($product_id, $client_id){
        $check = "SELECT id, product_id, amount FROM `orders` WHERE client_id=$client_id AND product_id=$product_id";
        $result = $this->connection->query($check);
        if (mysqli_num_rows($result) == 0) {
            $current = date("Y-m-j");
            $sql  = "INSERT INTO orders (`product_id`, `client_id`, `date`, `amount`) VALUES ($product_id, $client_id, '$current', 1)";
            $res  = $this->connection->query($sql);
            if ($res)
                return "True";
            return "False";
        }else{
            $resultArray = mysqli_fetch_assoc($result);
            $amount = $resultArray['amount'];
            $oid    = $resultArray['id'];
            $current = date("Y-m-j");
            $sql  = "UPDATE orders SET `date`='$current' , `amount`=$amount+1 WHERE client_id=$client_id AND product_id=$product_id";
            $res  = $this->connection->query($sql);
            if ($res)
                return "True";
            return "False";
        }   
    }

    public function add_payment($transaction_id, $total_price, $amounts, $client_id){ 
        $sql  = "SET @ids = (SELECT group_concat(distinct product_id) FROM orders WHERE client_id = $client_id); "; 
        $sql .= " INSERT INTO transactions (transaction_id, `status`, total_price, amounts, products_ids, client_id) ";
        $sql .= " VALUES ('$transaction_id', 'Succeeded', $total_price, $amounts, @ids, $client_id); ";
        $sql .= " DELETE FROM orders WHERE client_id = $client_id";
        $res  = $this->connection->multi_query($sql);
        if ($res)
            return "True";
        return "False";
    }

}

