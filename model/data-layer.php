<?php

/* diner/model/data-layer.php
 * Returns data for the diner app
 */
class DataLayer
{
    /** This field represents our database connection object
     *  @var PDO
     */
    private $_dbh;

    /** DataLayer constructor
     *
     */
    function __construct()
    {
        //TODO: Move try-catch from config.php to here
        require_once $_SERVER['DOCUMENT_ROOT'].'/../config.php';
        $this->_dbh = $dbh;
        $this->_dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->_dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    }

    /** saveOrder() accepts an Order object and insert its fields
     *  into the database
     *  @param $order Order
     *  @return $id string
     */
    function saveOrder($order)
    {
        var_dump($order);

        //1. Define the query
        $sql = "INSERT INTO student (sid, last, first, birthdate, gpa, advisor) 
                VALUES (:sid, :last, :first, :birthdate, :gpa, :advisor)";

        //2. Prepare the statement
        $statement = $this->_dbh->prepare($sql);

        //3. Bind the parameters
        $sid = $order->getSid();
        $last = $order->getLast();
        $first = $order->getFirst();
        $birthdate = $order->getBirthdate();
        $gpa = $order->getGpa();
        $advisor = $order->getAdvisor();

        $statement->bindParam(':sid', $sid, PDO::PARAM_STR);
        $statement->bindParam(':last', $last, PDO::PARAM_STR);
        $statement->bindParam(':first', $firstt, PDO::PARAM_STR);
        $statement->bindParam(':birthdate', $birthdate, PDO::PARAM_STR);
        $statement->bindParam(':gpa', $gpa, PDO::PARAM_STR);
        $statement->bindParam(':advisor', $advisor, PDO::PARAM_STR);


        //4. Execute the prepared statement
        $statement->execute();

        //5. Process the result
        $id = $this->_dbh->lastInsertId();
        //echo "Row inserted: $id";
        return $id;
    }

    function viewOrders()
    {
        //1. Define the query
        $sql = "SELECT sid, last, first FROM student
                ORDER BY last ASC";
        //2. Prepare the statement
        $statement = $this->_dbh->prepare($sql);

        //3. Bind the parameters

        //4. Execute the prepared statement
        $statement->execute();

        //5. Process the result
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
        //var_dump($result);
    }


}