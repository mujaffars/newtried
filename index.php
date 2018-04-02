<link href="css/bootstrap.min.css" media="screen" rel="stylesheet" type="text/css" >
<link href="css/bootstrap-theme.min.css" media="screen" rel="stylesheet" type="text/css" >

<style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        text-align: center;
    }
    th, td {
        padding: 5px;
        color:  #808080;
        background-color: #06e4cd;
    }
    .newNoDiv{
        width: 50%;
        height: 15%;
        margin: 0 auto;
        text-align: center;
        background-color: #ed9e2f;
    }
    table{
        width: 50%;
        height: 80%;
        margin: 0 auto;
    }
    body{
        background-image: url('logo.jpg')
    }
    td div{
        height: 100%;
        width: 100%;
        padding: 10px;
        border-radius: 100%;
        color: black;
    }
</style>

<?php
$newNumbers = '';
$myfile = fopen("new numbers.txt", "r") or die("Unable to open file!");
if (filesize("new numbers.txt") > 0) {
    $newNumbers = fread($myfile, filesize("new numbers.txt"));
}
fclose($myfile);
if ($newNumbers !== '' && trim($newNumbers) !== '') {
    $newNumbers = explode(",", $newNumbers);
}else{
    $newNumbers = array();
}
?>

<div class="newNoDiv">
    <div>New numbers revealed</div>
    <br/>
    <?php foreach ($newNumbers As $rowNew) { ?>
        <div class='btn btn-success'><?php echo $rowNew; ?></div>
    <?php } ?>
</div>
<table>
    <?php
    $numbers = '';
// First of all read the file
    $myfile = fopen("numbers.txt", "r") or die("Unable to open file!");
    if (filesize("numbers.txt") > 0) {
        $numbers = fread($myfile, filesize("numbers.txt"));
    }
    fclose($myfile);

    $revealedNos = array();
    if ($numbers !== '' && trim($numbers) !== '')
        $revealedNos = explode(",", $numbers);

// Output for Displaying ticket
    for ($k = 1; $k < 10; $k++) {
        echo "<tr>";
        for ($i = 1; $i <= 10; $i++) {
            $sum = ($k - 1) * 10;

            $appendClass = '';

            $displayNo = ($i + $sum);
            if (in_array($displayNo, $revealedNos)) {
                $appendClass = 'btn btn-success';
            }
            echo "<td class=''> <div class='$appendClass'>" . ($i + $sum) . "</div></td>";
        }
        echo "</tr>";
    }
    ?>

</table>