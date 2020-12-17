# Object Oriented Programming PHP

## Defining a class and its basics

```php
<?php
  class Person  {
        // access modifiers
        public string $firstName; // accessed anywhere
        public string $lastName; // accessed anywhere
        protected ? int $age; // accessed by the class and its child class
        private int $weight ; // accessed only within the class


        /*
          constructor - a function that runs when an instance of a class is created
              == construct is created using the key word __construct
              ==  it can also have access modifiers

        */
         public function __contructor ($firstName, $lastName, $age, $weight) {
             // $this keyword refers to the instance of the class
             $this->firstName = $firstName;
             $this->lastName = $lastName;
             $this->age = $age;
             $this->weight = $weight;

         }


  }
```
