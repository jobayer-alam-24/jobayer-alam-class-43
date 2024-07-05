<?php

class Book
{
    private $title;
    private $author;
    private $isbn;

    public function __construct($title, $authorName, $isbnNumber)
    {
        $this->title = $title;
        $this->author = $authorName;
        $this->isbn = $isbnNumber;
    }

    public function getTitle()
    {
        return $this->title;
    }
    public function getAuthor()
    {
        return $this->author;
    }
    public function isbn()
    {
        return $this->isbn;
    }
    public function __destruct()
    {
        echo "Lesson finished..";
    }
}

class Employee
{
    protected $name;
    protected $position;
    protected $salary;

    public function __construct($name, $position, $salary)
    {
        $this->name = $name;
        $this->position = $position;
        $this->salary = $salary;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getPosition()
    {
        return $this->position;
    }
    public function getSalary()
    {
        return $this->salary;
    }
}

class Manager extends Employee
{
    private $department;

    public function __construct($name, $position, $salary, $department)
    {
        parent::__construct($name, $position, $salary);
        $this->department = $department;
    }
    public function getDepartment()
    {
        return $this->department;
    }
}

class BankManagement{
    private $accountNumber;
    private $balance;
    private $lastDepositDate;
    private $lastWithdrawalDate;

    public function __construct($accountNumber, $initialBalance){
        $this->accountNumber = $accountNumber;
        $this->balance = $initialBalance;
        $this->lastDepositDate = null;
        $this->lastWithdrawalDate = null;
    }

    public function deposit($amount){
        if($amount > 500){
            $this->balance += $amount;
            $this->lastDepositDate = date('Y-m-d H:i:s');
        }else{
            echo "Deposit Amount is Too Low. It must be Above 500";
        }
    }
    public function withdraw($amount) {
        if ($amount > $this->balance) {
            echo $this->getBalance() . " You can not withdraw above your Current Balance <br>";
        } else {
            if ($amount > 500) {
                $this->balance -= $amount;
                $this->lastWithdrawalDate = date('Y-m-d H:i:s');
            } else {
                echo "Withdrawal Amount must be above 500 <br>";
            }
        }
    }
    
    public function getBalance(){
        echo "Current Balance is:  $" . $this->balance;
    }
    public function getAccountNumber(){
        echo "Account Number " . $this->accountNumber;
    }
    public function info() {
        echo "Account Number: " . $this->accountNumber . "<br>";
        echo "Current Balance: $" . $this->balance . "<br>";
        echo "Last Deposit Date: " . ($this->lastDepositDate ? $this->lastDepositDate : "No deposits yet") . "<br>";
        echo "Last Withdrawal Date: " . ($this->lastWithdrawalDate ? $this->lastWithdrawalDate : "No withdrawals yet") . "<br>";
    }
}



$book = new Book("Clean Code", "Robert C. Martin", "978-0132350884");
echo "I read " . $book->getTitle() . " Written By " . $book->getAuthor() . ".<br> ISBN: " . $book->isbn() . "<br>";

$employee1 = new Employee("John Doe", "Developer", 70000);
$employee2 = new Employee("Jane Smith", "Designer", 65000);

$manager = new Manager("Alice Johnson", "Project Manager", 90000, "Development");

echo "Employee 1: " . $employee1->getName() . ", Position: " . $employee1->getPosition() . ", Salary: $" . $employee1->getSalary() . "<br>";
echo "Employee 2: " . $employee2->getName() . ", Position: " . $employee2->getPosition() . ", Salary: $" . $employee2->getSalary() . "<br>";

echo "Manager: " . $manager->getName() . ", Position: " . $manager->getPosition() . ", Salary: $" . $manager->getSalary() . ", Department: " . $manager->getDepartment() . "<br>";

$rahim = new BankManagement("01903081154", 50000);
echo $rahim->getBalance() . "<br>";
$rahim->deposit(600);
$rahim->withdraw(6000);
echo $rahim->getBalance() . "<br>";
echo $rahim->info();