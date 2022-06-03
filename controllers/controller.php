<?php
/*
328/diner/controllers/controller.php
*/

class Controller
{
    private $_f3;

    function __construct($f3)
    {
        $this->_f3 = $f3;
    }

    function home()
    {
        $view = new Template();
        echo $view->render('views/home.html');
    }

    function admin()
    {
        //Get the orders from the DB and save them to the F3 hive
        $orders = $GLOBALS['dataLayer']->viewOrders();
        var_dump($orders);
        $this->_f3->set('orders', $orders);

        $view = new Template();
        echo $view->render('views/admin.html');
    }

    function order()
    {
        //If the form has been submitted
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            var_dump($_POST);

            //Get the user data from the post array
            $sid = $_POST['sid'];
            $this->_f3->set('userId', $sid);

            //Create a new Order object
            $order = new Order();
            $order->setSid($sid);
            $_SESSION['order'] = $order;

            $last = $_POST['last'];
            $this->_f3->set('userLast', $last);
            $_SESSION['order']->setLast($last);

            $first = $_POST['first'];
            $this->_f3->set('userFirst', $first);
            $_SESSION['order']->setFirst($first);

            $birthdate = $_POST['birthdate'];
            $this->_f3->set('userBirth', $birthdate);
            $_SESSION['order']->setBirthdate($birthdate);

            $gpa = $_POST['gpa'];
            $this->_f3->set('userGPA', $gpa);
            $_SESSION['order']->setGpa($gpa);

            $advisor = $_POST['advisor'];
            $this->_f3->set('userAdvisor', $advisor);
            $_SESSION['order']->setAdvisor($advisor);



            header('location: student');
        }
        $view = new Template();
        echo $view->render('views/order.html');
    }

    function student()
    {
        //Write to database
        $orderId = $GLOBALS['dataLayer']->saveOrder($_SESSION['order']);
        $this->_f3->set('orderId', $orderId);

        $view = new Template();
        echo $view->render('views/student.html');

        session_destroy();
    }


} // end of Controller class


