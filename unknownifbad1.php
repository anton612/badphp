<?php
$link = mssql_connect('COMPUTER\\iPlayWarZ', 'sa', 'password');
$selectdb = mssql_select_db("WarZ");
if (!$link || !$selectdb){
    die('DB Issue');
}
 
if(isset($_POST['Submit'])){
    /* ugly but it works */
    if(empty($_POST['email']) || empty($_POST['password']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) || preg_replace("/[^a-zA-Z\d ]/", "", $_POST['password']) != $_POST['password'] || strlen($_POST['password']) > 50){ //Since I don't know what the max password size is you should change this.
        die("Something went wrong.");
    }
    $query = mssql_query("SELECT `email` FROM Accounts WHERE email = '".$_POST['email']."'"); //No need to select EVERYTHING from that row.
    $query = mssql_num_rows($query);
    if($query > 0){
        die("Email is already in-use. Please use a different one.");
    }
    else{
        mssql_query("EXEC WZ_ACCOUNT_CREATE '".$_SERVER['REMOTE_ADDR']."', '".$_POST['email']."', '".$_POST['password']."', 0, 0, 0");
        die("Account created");
    }
}
?>
