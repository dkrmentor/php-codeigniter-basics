
<?php
//testing
echo $welcome = 'hello world' . '<br>';
//variable
$a = 20;
$a = 30;
echo $a . "<br>";
// constant
define("TITLE", "Welcome yrrrrrrr constant");
echo TITLE . "<br>";
//condition

//if-else
echo 'value of num is ??' . '<br>';
$num = 3;
if ($num == 2) {
    echo 'yes its 2' . '<br>';
} else if ($num > 2) {
    echo 'its greater then 2' . '<br>';
} else {
    echo 'sorry its smaller then 2' . '<br>';
}

//switch-case
$color = "black";
switch ($color) {
    case "red":
        echo "its red" . '<br>';
        break;
    case "yellow":
        echo "its yellow" . '<br>';
        break;
    case "black":
        echo "its black" . '<br>';
        break;
    default:
        echo "none match" . '<br>';
}

//loops
//while
$x = 1;
while ($x <= 6) {
    echo 'i am below 6' . ' ' . '<br>';
    $x++;
}
//do-while
$y = 10;
do {
    echo 'i am above 6 ' . $y . '<br>';
    $y--;
} while ($y >= 6);
//for
for ($i = 0; $i < 5; $i++) {
    echo 'veluw of i is ' . $i . ' <br>';
}
//for-each
$names = array("dhara", "kumari", "rajput");
foreach ($names as $key => $nam_val) {
    echo 'value of  name ' . $key . ' is ' . $nam_val . ' <br>';
}

//function [reusable block of code]
//create function
function funcWriteNewMsg()
{
    echo 'function echo';
}
//call function 
funcWriteNewMsg();
echo '<br>';

//array [store multiple data]

//indexing array
$cars = array("BMW", "TATA", "SUZUKI", "COROLLA");
echo 'third car is ' . $cars[3] . '<br>';
foreach ($cars as $key => $car_val) {
    echo 'cars ' . $car_val . '<br>';
}
//pre is used for formatted output.
echo '<pre>';
print_r($cars);
echo '</pre>';

//associative array [key-value-pair]
$ages = array(
    'umer' => 24,
    'nofil' => 20,
    'saad' => 34,
    'zainab' => 22,
    'dhara' => 24,
);
echo $ages['umer'];
echo '<pre>';
print_r($ages);
echo '</pre>';

//multi-dimensionsl array [nested array]
$data = array(
    array("BMW", "TATA", "SUZUKI", "COROLLA"),
    array(
        'umer' => 24,
        'nofil' => 20,
        'saad' => 34,
        'zainab' => 22,
        'dhara' => 24,
    )
);
echo $data[0][1];
echo '<pre>';
print_r($data);
echo '</pre>';

//some other concept of arrays are
//array merge , array push , array pop , array reverse , array slice 
?>

<?php 
//db- connection
echo 'test db';
?>

