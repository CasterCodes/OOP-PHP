# Object Oriented Programming PHP

## Defining a class and its basics

# The person Class

```php
<?php
  class Person  {
         /**
            -class properties
            -properties are the characteristics of the class - attributes
            -properties have access modifiers
         */
        public string $firstName; // accessed anywhere
        public string $lastName; // accessed anywhere
        protected ? int $age; // accessed within the class and its child class
        private int $weight ; // accessed only within the class
        public string $sex;

         /**
          *Static properties
          *they belong to the class and not the instance of the class
          *can be accessed using the self keyword
          */

         // static properties
         public static int $height = 6;
         public static string $eyeColor = 'blue';


        /*
          constructor - a function that runs when an instance of a class is created
              == construct is created using the key word __construct
              ==  it can also have access modifiers

        */
         public function __construct ($firstName, $lastName, $age, $weight, $sex) {
             // $this keyword refers to the instance of the class
             $this->firstName = $firstName;
             $this->lastName = $lastName;
             $this->age = $age;
             $this->weight = $weight;
             $this->sex = $sex;

         }


         /*
             Methods
             == methods are just functions defined  inside a class
             == method can also access modifiers
             == there custom methods and inbuilt methods commonly known as magic   methods
             == some magic methods include __set(), __get(), __constructor(), __destructor()
          */



          // Custom method
          public function sayHello() {
                   return 'Hello my name '. $this->firstName .' '. $this->lastName . ' and am ' .$this->age . ' years old';
          }


          /**
           * SETTERS AND GETTERS
           * With protected and private properties it is a good idea to use setters and getters
           * We can use magic setters and getters using  the magic methods __set() and __get()
           * OR building custom setters and getters
           */

            // Custom setters and getters
            public function setAge($age){
                  $this->age = $age;
            }
            public function getAge() {
                return $this->age;
            }

            public function setWeight($weight) {
                    $this->weight = $weight;
            }

            public function getWeight() {
                return $this->weight;
            }


        /**
         * STATIC METHODS AND PROPERTIES
         * can be access without creating an instance of a class
         * defined by using static keyword word
         */
         public static function showEyeColor() {
               return self::$eyeColor;
         }



        /**
         * CONSTANTS
         * Constant can be change once declared
         * Are declared uing the keyword const
         * They are case sensitive
         * Good idea to define them using UPPERCASE
         */
        const MESSAGE ='This is how to use a constants in php';

        public function showMessage() {
               return self::MESSAGE;
        }


  }



// creating an instance of a class
$personOne =  new Person('Kevin', 'Caster', 24, 65, 'Male');
var_dump($personOne);
echo '</br>';

// trying to access class properties
echo $personOne->firstName ; // Kevin
echo '</br>';
echo $personOne->lastName;  // Caster
echo '</br>';
//   echo $personOne->age; // Fatal error Cannot access protected property
//   echo $personOne->weight; // Fatal error cannot access a private property


// Using setters and getters
echo $personOne->getAge();  // 24
$personOne->setAge(34);
echo '</br>';
echo $personOne->getAge();
echo '</br>';

// calling a method of a class
echo $personOne->sayHello();
echo '<br>';

// acessing static properties
echo Person::$eyeColor;
echo '<br>';
echo Person::$height;
echo '<br>';

//Accessing static methods
echo Person::showEyeColor();
echo '<br>';


//Acessing
echo Person::MESSAGE;



?>
```

# A Student child class

```php
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
```

# Traits in PHP

PHP only allows a single inheritance- meaning a a child class can only inherit from a single parent class
Traits solve this problem

**Traits are used to define methods that can be used my multiple class**

**Traits can have methods with access modifiers or abstract methods**

```php
<?php
 /**
  * Traits solve the problem of single inheritance in php
  */
  // defining a trait

  trait Sound {
       public function cowSound(){
           return 'Cow sound';
       }

       public function catSound(){
             return 'Cat sound';
       }
       protected function specificSound(){
                return 'Specific sound';
       }
  }


  trait Feeding  {
          public function catFood(){
                   return 'Cat food';
          }
          public function cowFood() {
                 return 'Cow food';
          }
  }



  /**
   * Define a class and use the sound trait
   */


   class Animal {
         use Sound, Feeding;
   }


   // create an instance of the class and use the  trait methods

   $animalOne = new Animal();

   echo $animalOne->cowSound();

   echo '<br>';

   echo $animalOne->catSound();

   echo '<br>';


   echo $animalOne->catFood();

   echo '<br>';

   echo $animalOne->cowFood();

   // trying to access protected trait method
  //echo $animalOne->specificSound(); this throws a fatal error

   echo '<br>';

   /**
    * A child class can also use the trait methods from the parent class
    */
   class Cow extends Animal {

   }

   $cowOne = new Cow();

   echo $cowOne->cowSound();







```
