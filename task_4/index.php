<?php

class Animal {
   

    public function makeSound() {
        return  "Animal sound will be here..";
    }
}

class Dog extends Animal {

    // override parent animal class make soun function--
    public function makeSound() {
        return "Dog sound is :-  Gahauw Gahauw!";
    }
}

class Cat extends Animal {
     // override parent animal class make soun function--
    public function makeSound() {
        return "Cat sound is :-  Meow Meow!";
    }
}

class Cow extends Animal {
     // override parent animal class make soun function--
    public function makeSound() {
        return "Cow sound is :-  Hamba Hamba!";
    }
}



// call different classes--
$dog = new Dog();
$cat = new Cat();
$cow = new Cow();



// print  makeSound() method on each animal
echo  $dog->makeSound() . "\n";
echo  $cat->makeSound() . "\n";
echo  $cow->makeSound() . "\n";