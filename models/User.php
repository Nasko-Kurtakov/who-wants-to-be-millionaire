<?php

namespace models;

use Serializable;

class User implements Serializable
{
    private $id;

    private $email;

    public function __construct($id, $email)
    {
        $this->id = $id;
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function serialize()
    {
        return serialize(
            array(
                "id" => $this->id,
                "email" => $this->email
            )
        );
    }

    public function unserialize($data)
    {
        $unserialized = unserialize($data);
        $this->id = $unserialized["id"];
        $this->email = $unserialized["email"];
    }
}