<link href="css/bootstrap.min.css" media="screen" rel="stylesheet" type="text/css" >
<link href="css/bootstrap-theme.min.css" media="screen" rel="stylesheet" type="text/css" >

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

$newNumbers = array();
if (count($revealedNos) < 90) {
    $revealCnt = 0;
    if ($_POST && $_POST['key'] === '8161931a734726cf2f92758da8da7647') {
        do {
            $randNo = rand(1, 90);
            if (!in_array($randNo, $revealedNos)) {
                $newNumbers[] = $randNo;
                $revealedNos[] = $randNo;
                $revealCnt++;
            }
        } while ($revealCnt < 7 && count($revealedNos) < 90);

        file_put_contents('new numbers.txt', '');
        file_put_contents('new numbers.txt', implode(",", $newNumbers));

        file_put_contents('numbers.txt', '');
        file_put_contents('numbers.txt', implode(",", $revealedNos));
    }
} else {
    ?>
    <div class="alert alert-danger">All numbers revealed</div>
<?php }
?>

<?php
$newNumbers = '';
$myfile = fopen("new numbers.txt", "r") or die("Unable to open file!");
if (filesize("new numbers.txt") > 0) {
    $newNumbers = fread($myfile, filesize("new numbers.txt"));
}
fclose($myfile);
if ($newNumbers !== '' && trim($newNumbers) !== '') {
    $newNumbers = explode(",", $newNumbers);
} else {
    $newNumbers = array();
}
?>

<form method="post" style="margin: 0 auto; text-align: center;">
    <div>
        <div>Total no's revealed count <div class="btn btn-info"><?php echo count($revealedNos); ?></div></div>
        <br/>
        <div>New numbers revealed</div>
        <?php foreach ($newNumbers As $rowNew) { ?>
            <div class='btn btn-success'><?php echo $rowNew; ?></div>
        <?php } ?>
        <br/>
        <div>Revealed numbers</div>
        <?php foreach ($revealedNos As $rowRev) { ?>
            <div class='btn btn-warning'><?php echo $rowRev; ?></div>
        <?php } ?>
        <br/>
    </div>
    <div>               
        <br/>
        <input type="text" name="key" id="key" value="" placeholder="Enter key"/>  
        <input type="hidden" name="hdnField" id="hdnField" value="post"/>               
        <br/>
        <br/>
        <input class='btn btn-success' type="submit" value="Generate no's"/>
    </div>
</form>

<?php
if (isset($_POST['hdnField']) && isset($_SERVER['REQUEST_URI'])) {
    header('Location: ' . $_SERVER['REQUEST_URI']);
    exit();
}
?>