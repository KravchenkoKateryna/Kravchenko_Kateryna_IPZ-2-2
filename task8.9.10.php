<?php

interface HouseCleaning {
    public function cleanRoom();
    public function cleanKitchen();
}

abstract class Human implements HouseCleaning {
    private $height;
    private $weight;
    private $age;

    public function __construct($height, $weight, $age) {
        $this->height = $height;
        $this->weight = $weight;
        $this->age = $age;
        $this->birthNotification();
    }

    public function getHeight() {
        return $this->height;
    }

    public function setHeight($height) {
        $this->height = $height;
    }

    public function getWeight() {
        return $this->weight;
    }

    public function setWeight($weight) {
        $this->weight = $weight;
    }

    public function getAge() {
        return $this->age;
    }

    public function setAge($age) {
        $this->age = $age;
    }

    abstract protected function birthNotification();

    public function cleanRoom() {
        echo "Чистимо кімнату\n";
    }

    public function cleanKitchen() {
        echo "Чистимо кухню\n";
    }
}

class Student extends Human {
    private $university;
    private $course;

    public function __construct($height, $weight, $age, $university, $course) {
        parent::__construct($height, $weight, $age);
        $this->university = $university;
        $this->course = $course;
    }

    protected function birthNotification() {
        echo "Народився новий студент!\n";
    }

    public function getUniversity() {
        return $this->university;
    }

    public function setUniversity($university) {
        $this->university = $university;
    }

    public function getCourse() {
        return $this->course;
    }

    public function setCourse($course) {
        $this->course = $course;
    }

    public function moveToNextCourse() {
        $this->course++;
    }
}

class Programmer extends Human {
    private $programmingLanguages;
    private $experience;

    public function __construct($height, $weight, $age, $programmingLanguages, $experience) {
        parent::__construct($height, $weight, $age);
        $this->programmingLanguages = $programmingLanguages;
        $this->experience = $experience;
    }

    protected function birthNotification() {
        echo "Народився новий програміст!\n";
    }

    public function getProgrammingLanguages() {
        return $this->programmingLanguages;
    }

    public function setProgrammingLanguages($programmingLanguages) {
        $this->programmingLanguages = $programmingLanguages;
    }

    public function getExperience() {
        return $this->experience;
    }

    public function setExperience($experience) {
        $this->experience = $experience;
    }

    public function addProgrammingLanguage($language) {
        $this->programmingLanguages[] = $language;
    }
}

$student = new Student(170, 65, 20, 'Університет А', 1);
echo "\nStudent:\n";
echo "Народився новий студент!\n";
echo "Height: " . $student->getHeight() . "\n";
echo "Weight: " . $student->getWeight() . "\n";
echo "Age: " . $student->getAge() . "\n";
echo "University: " . $student->getUniversity() . "\n";
echo "Course: " . $student->getCourse() . "\n";
$student->moveToNextCourse();
echo "Після переходу на наступний курс:\n";
echo "Course: " . $student->getCourse() . "\n";
echo "Виконання методів прибирання:\n";
$student->cleanRoom();
$student->cleanKitchen();

$programmer = new Programmer(180, 75, 30, ['Java', 'Python'], 5);
echo "\nProgrammer:\n";
echo "Народився новий програміст!\n";
echo "Height: " . $programmer->getHeight() . "\n";
echo "Weight: " . $programmer->getWeight() . "\n";
echo "Age: " . $programmer->getAge() . "\n";
echo "Programming Languages: " . implode(', ', $programmer->getProgrammingLanguages()) . "\n";
echo "Experience: " . $programmer->getExperience() . " років\n";
$programmer->addProgrammingLanguage('JavaScript');
echo "Після додавання JavaScript:\n";
echo "Programming Languages: " . implode(', ', $programmer->getProgrammingLanguages()) . "\n";
echo "Виконання методів прибирання:\n";
$programmer->cleanRoom();
$programmer->cleanKitchen();
?>
