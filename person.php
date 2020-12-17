<?php
  class Person  {
         /** 
             *class properties
            *properties are the characteristics of the class - attributes
            *properties have access modifiers
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