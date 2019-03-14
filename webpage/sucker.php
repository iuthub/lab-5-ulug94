<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Server response</title>
    <link href="buyagrade.css" type="text/css" rel="stylesheet" />
</head>
<body>
    <?php 
        if($_SERVER["REQUEST_METHOD"]=="GET"){
    ?>
    <h1>GET request not allowed! Only POST requests</h1>
    <?php } else {
        $name = $_POST["name"];
        $sn=$_POST["sectionNumber"];
        $cn=$_POST["cardNumber"];
        $ct=$_POST["cardType"];
        if(strlen($name)==0||strlen($sn)==0||strlen($cn)==0||strlen($ct)==0){    
    ?>
    <h2>You didn't fill out form completely</h2>
    <?php } else { ?>
    <h2>Values received</h2>
    <dl>
        <dt>Name</dt>
        <dd><?php echo $_POST["name"];?></dd>
        <dt>Section</dt>
        <dd><?php echo $_POST["sectionNumber"];?></dd>
        <dt>Credit card number</dt>
        <dd><?php echo $_POST["cardNumber"];?></dd>
        <dt>Credit card type</dt>
        <dd><?php echo $_POST["cardType"]?></dd>
    </dl>
    
    <?php 
    $sucker_data = $_POST["name"].';'.$_POST["sectionNumber"].';'.$_POST["cardNumber"].';'.$_POST["cardType"]."\n";
    file_put_contents("sucker.txt",$sucker_data, FILE_APPEND);
    ?>
    <p>Here are all the suckers who have submitted here: </p>
    <pre>
        <?php 
            echo file_get_contents("./sucker.txt");
        ?>
    </pre>
    <?php } } ?>
</body>
</html>