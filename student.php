<?php
require_once './person.php'; 

/**
 * A Child class to the person class
 * The student class inherits the properties and methods of the parent class person
 * the can be achieved using the extends keyword
 *
 */

 class Student extends Person {
       public string $course;
       public string $department;
       public string  $studentId;


       public function __construct($firstName, $lastName, $age, $weight, $sex,$course, $department, $studentId) {
               parent::__construct($firstName, $lastName, $age, $weight, $sex);
               $this->course = $course;
               $this->department = $department;
               $this->studentId = $studentId;
               $this->weight = $weight;
       }

       /**
        * Trying to access a private property from the parent class
        * this will throw an error 
        */

       public function getWeight() {
              return $this->weight;
       }
 }


echo '<br>';

 // creating a new instance of the student class
 $studentOne = new Student('Jessica', 'Jones', 34, 50, 'Female', 'Statistics', 'MPPS', '345768');
 var_dump($studentOne);

 echo '<br>';

 // acessing the methods of the parent class
 echo $studentOne->sayHello();

 echo '<br>';

 // using setters and getter from the parent class - Person
 $studentOne->setAge(20);
 echo $studentOne->getAge();

 echo '<br>';

 // accessing static properties of the parent class
 echo Student::$eyeColor;

 echo '<br>';
 // acessing static methods of the parent class
 echo Student::showEyeColor();

 echo '<br>';

 // accessing the const 
 echo Student::MESSAGE;

 echo '<br>';
 // trying to access private property from the parent class
 echo $studentOne->getWeight();