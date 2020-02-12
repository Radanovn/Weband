<?php

class Human
{
    private $firstName;
    private $lastName;

    public function __construct(string $firstName, string $lastName)
    {
        $this->setFirstName($firstName);
        $this->setLastName($lastName);
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setFirstName(string $firstName)
    {
        if (strlen($firstName) < 4) {
            throw new Exception("Expected length at least 4 symbols! Argument: firstName");
        }
        $this->firstName = ucfirst($firstName);
    }

    public function setLastName(string $lastName)
    {
        if (strlen($lastName) < 3) {
            throw new Exception("Expected length at least 4 symbols! Argument: firstName");
        }
        $this->lastName = ucfirst($lastName);
    }
}

class Student extends Human
{
    private $facultyNumber;

    public function __construct(string $firstName, string $lastName, int $facultyNumber)
    {
        parent::__construct($firstName, $lastName);

        $this->setFaculcyNumber($facultyNumber);
    }

    public function setFaculcyNumber($facultyNumber)
    {
        if (!strlen((strval($facultyNumber)) < 5 || strlen(strval($facultyNumber) > 10))) {
            throw new Exception("Invalid faculty number!");
        }
        $this->facultyNumber = intval($facultyNumber);
    }

    public function getFaculty(): int
    {
        return $this->facultyNumber;
    }
}

class Worker extends Human
{
    private $weekSalary;
    private $workHPerDay;

    public function __construct(string $firstName, string $lastName, int $weekSalary, int $workHPerDay)
    {
        parent::__construct($firstName, $lastName);
        $this->setSalary($weekSalary);
        $this->setWorkHPerDay($workHPerDay);
    }

    public function setSalary(int $weekSalary)
    {
        if (intval($weekSalary) < 10) {
            throw new Exception("Expected value mismatch!Argument: weekSalary");
        }
        $this->weekSalary = intval($weekSalary);
    }

    public function getSalary(): int
    {
        return $this->weekSalary;
    }

    public function setWorkHPerDay(int $workHPerDay)
    {
        if ($workHPerDay < 1 && $workHPerDay > 12) {
            throw new Exception("Expected value mismatch!Argument: workHoursPerDay");
        }
        $this->workHPerDay = $workHPerDay;
    }

    public function getWorkHPerDay()
    {
        return $this->workHPerDay;
    }
}


$input = [
    'Ivan Ivanov 483255',
    // 'Pesho Kirov 159010'
];

$students = [];
$workers = [];

for ($i = 0; $i < count($input); $i++) {
    $input2 = explode(' ', $input[0]);

    $firstName = $input2[0];
    $lastName = $input2[1];
    $facultyNumber = $input2[2];

    $student = new Student($firstName, $lastName, $facultyNumber);
    $students[] = $student;
}

echo "First Name:" . ' ' . $student->getFirstName()
    . ' <br> ' . "Last Name:" . ' ' . $student->getLastName()
    . '  <br> ' . "Faculty number:" . ' ' . $student->getFaculty();


$workerInput = [
    'Ivcho',
    'Ivancov',
    '1590',
    '10'
];
echo ' <br> ';
for ($i = 0; $i < count($workerInput); $i++) {

    $firstName = $workerInput[0];
    $lastName = $workerInput[1];
    $weekSalary = intval($workerInput[2]);
    $workHPerDay = intval($workerInput[3]);
    
    

    $worker = new Worker($firstName, $lastName, $weekSalary, $workHPerDay);
    $workers[] = $worker;
}

echo "First Name:" . ' ' . $worker->getFirstName()
. ' <br> ' . "Last Name:" . ' ' . $worker->getLastName()
. '  <br> ' . "Week Salary:" . ' ' . $worker->getSalary()
. '  <br> ' . "Hours per day:" . ' ' . $worker->getWorkHPerDay()
. '  <br> ' . "Salary per hour:" . ' ' . number_format($worker->getSalary() / ($worker->getWorkHPerDay() * 7), 2);
