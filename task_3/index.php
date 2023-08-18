<?php

class Employee {
    private $name;
    private $salary;

    public function __construct($name, $salary) {
        $this->name = $name;
        $this->setSalary($salary);
    }

    public function getName() {
        return $this->name;
    }

    public function getSalary() {
        return $this->salary;
    }

    public function setSalary($salary) {
        if ($salary > 0) {
            $this->salary = $salary;
        } else {
            echo "Salary must be a positive value.";
        }
    }
}



///giving employee name and salary------
    $employee = new Employee("Rasel Amin", 20000);
    echo "Employee Name: " . $employee->getName() . "\n";
    echo "Employee Salary: " . $employee->getSalary() . "\n";

    // testing by giving negative salary value--------
    $employee = new Employee("Rasel Amin", -20000);
