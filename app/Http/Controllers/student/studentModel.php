<?php

/**
 * Created by PhpStorm.
 * User: Matthias
 * Date: 04.05.2017
 * Time: 21:05
 */

namespace App\Http\Controllers\student;

class studentModel
{
    private $id;
    private $name;
    private $lastname;
    private $matrnr;
    private $email;


    /**
     * ContactModel constructor.
     * @param $id
     * @param $name
     * @param $lastname
     * @param $matrnr
     * @param $email
     */
    public function __construct($id, $name, $lastname, $matrnr, $email)
    {
        $this->id = $id;
        $this->name = $name;
        $this->lastname = $lastname;
        $this->matrnr = $matrnr;
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @return mixed
     */
    public function getMatrnr()
    {
        return $this->matrnr;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }
}