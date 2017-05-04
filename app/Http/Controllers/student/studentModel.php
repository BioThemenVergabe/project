<?php
/**
 * Created by PhpStorm.
 * User: Matthias
 * Date: 04.05.2017
 * Time: 21:05
 */



class studentModel
{
    private $name;
    private $lastname;
    private $matrnr;
    private $email;


    /**
     * ContactModel constructor.
     * @param $name
     * @param $lastname
     * @param $matrnr
     * @param $email
     */
    public function __construct($name, $lastname, $matrnr, $email)
    {
        $this->name = $name;
        $this->lastname = $lastname;
        $this->matrnr= $matrnr;
        $this->email= $email;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
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
        return $this->email();
    }
}