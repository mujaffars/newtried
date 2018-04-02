<?php
/*
  Author: harshaaliaschinna
  E-mail: harshaaliaschinna@gmail.com
  Script: Thambola or Housie Ticket Generation Script
 */
// Initializing array $tm to NULL
$tm[][] = NULL;
// First Creating empty spaces in ticket randomly such that empty places in each row should be 4
for ($k = 0; $k < 3; $k++) {
    $ran = range(0, 8);
    // selecting a range of 9 numbers and picking 4 numbers randomly
    $r = array_rand($ran, 4);
    for ($i = 0; $i < 4; $i++) {
        // Assigning 'X'(representing empty) to $tm array
        $tm[$r[$i]][$k] = '#';
    }
}
// Initializing variable count to zero
$count = 0;
// Creating and Assigning random variables into other than 'X'(representing empty)
for ($k = 0; $k < 9; $k++) {
    $ran2 = array_combine(range(1 + $count, 10 + $count), range(1 + $count, 10 + $count));
    // picking 3 or 4 variables randomly
    $r2 = array_rand($ran2, 4);

    for ($i = 0; $i < 3; $i++) {
        // if value not set in array
        if (!isset($tm[$k][$i])) {
            // Assigning randomly picked values into empty places
            $tm[$k][$i] = $r2[$i];
        }
    }
    // Increasing count value with 10 every time
    $count+=10;
}
?>
<style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
    th, td {
        padding: 5px;
        color:  #808080;
    }
</style>
<table>
<?php
// Output for Displaying ticket
for ($k = 0; $k < 3; $k++) {
    echo "<tr>";
    for ($i = 0; $i < 9; $i++) {
        echo "<td>" . $tm[$i][$k] . "</td>";
    }
    echo "</tr>";
}
?>

</table>