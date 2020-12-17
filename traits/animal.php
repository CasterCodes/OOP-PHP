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





   