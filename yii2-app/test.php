<?php
class Person
{
  protected $name;
  protected $age;
 
  public function getName()
  {
    return $this->name;
  }
 
  public function setName($name)
  {
    $this->name = $name;
  }
 
  private function callToPrivateNameAndAge()
  {
    return "{$this->name} is {$this->age} years old.";
  }
 
  protected function callToProtectedNameAndAge()
  {
    return "{$this->name} is {$this->age} years old.";
  }
}
 
class Employee extends Person
{
  private $designation;
  private $salary;
 
  public function getAge()
  {
    return $this->age;
  }
 
  public function setAge($age)
  {
    $this->age = $age;
  }
 
  public function getDesignation()
  {
    return $this->designation;
  }
 
  public function setDesignation($designation)
  {
    $this->designation = $designation;
  }
 
  public function getSalary()
  {
    return $this->salary;
  }
 
  public function setSalary($salary)
  {
    $this->salary = $salary;
  }
 
  public function getNameAndAge()
  {
    return $this->callToProtectedNameAndAge();
  }
}
 
$employee = new Employee();
 
$employee->setName('Prokhor');
$employee->setAge(30);
$employee->setDesignation('Software Engineer');
$employee->setSalary('30K');
 
echo $employee->getName(); // prints 'Bob Smith'
echo $employee->getAge(); // prints '30'
echo $employee->getDesignation(); // prints 'Software Engineer'
echo $employee->getSalary(); // prints '30K'
echo $employee->getNameAndAge(); // prints 'Bob Smith is 30 years old.'

// $_SERVER
?>