<?php

//TODO: Add a description to each method

class Order
{
    private $_sid;
    private $_last;
    private $_first;
    private $_birthdate;
    private $_gpa;
    private $_advisor;



    /**
     * @param $_sid
     * @param $_last
     */
    public function __construct($sid = "", $last = "", $first = "", $birthdate = "", $gpa = "", $advisor="")
    {
        $this->_sid = $sid;
        $this->_last = $last;
        $this->_first = $first;
        $this->_birthdate = $birthdate;
        $this->_gpa = $gpa;
        $this->_advisor = $advisor;
    }

    /**
     * @return string
     */
    public function getSid()
    {
        return $this->_sid;
    }

    /**
     * @param string $sid
     */
    public function setSid(string $sid): void
    {
        $this->_sid = $sid;
    }

    /**
     * @return mixed
     */
    public function getLast()
    {
        return $this->_last;
    }

    /**
     * @param mixed $last
     */
    public function setLast($last): void
    {
        $this->_last = $last;
    }

    /**
     * @return string
     */
    public function getFirst(): mixed
    {
        return $this->_first;
    }

    /**
     * @param mixed|string $first
     */
    public function setFirst(string $first): void
    {
        $this->_first = $first;
    }

    /**
     * @return string
     */
    public function getBirthdate(): mixed
    {
        return $this->_birthdate;
    }

    /**
     * @param string $birthdate
     */
    public function setBirthdate(string $birthdate): void
    {
        $this->_birthdate = $birthdate;
    }

    /**
     * @return string
     */
    public function getGpa(): mixed
    {
        return $this->_gpa;
    }

    /**
     * @param string $gpa
     */
    public function setGpa(string $gpa): void
    {
        $this->_gpa = $gpa;
    }

    /**
     * @return mixed|string
     */
    public function getAdvisor(): mixed
    {
        return $this->_advisor;
    }

    /**
     * @param string $advisor
     */
    public function setAdvisor(string $advisor): void
    {
        $this->_advisor = $advisor;
    }



}