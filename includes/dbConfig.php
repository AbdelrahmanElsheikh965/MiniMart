<?php

interface db{
    public function Register($table, $name, $email, $password_1, $password_2);
    public function Login($table, $email, $password);
}


