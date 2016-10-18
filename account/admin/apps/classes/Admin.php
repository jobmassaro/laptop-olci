<?php

class Admin {
public static function login () {
global $dbh;
global $_L;
   $username = _post('username');
	$password = _post('password');
$password = md5(SALT . $password);

	 $stmt = $dbh->prepare("SELECT id, username, password FROM admins WHERE username = :user_id AND password = :password AND status='Active'");
    $stmt->bindParam(':user_id', $username, PDO::PARAM_STR, 12);
    $stmt->bindParam(':password', $password, PDO::PARAM_STR, 30);
    $stmt->execute();
    $result = $stmt->fetchAll();
	if ($stmt->rowCount()=="1") {
        foreach ($result as $value) {
            $_SESSION['aid']=$value['id'];
            $lid = md5(uniqid(rand(),TRUE));
            $_SESSION['lid'] = $lid;
            setcookie("_lid", "$lid", time()+86400);
            r2(APP_URL.'/datasheet');

        }
    }
    else {
        r2('login','e', $_L['error_invalid_user_pass']);
    }
}
public static function changepass () {
	$self = APP_URL.'/password';
	$xstage = lc('appStage');
	if ($xstage=='Demo'){
r2($self,'e','Changing Password is disabled in the Demo Mode');
}
$d = ORM::for_table('admins')->find_one($_SESSION['aid']);
$oldpass = _post('oldpass');
$oldpass =  md5(SALT . $oldpass);
if ($oldpass != $d['password'])
{
	r2($self,'e','Incorrect Current Password');
}
$newpass = _post('newpass');
if ($newpass == ''){
r2($self,'e','New Password is empty');	
}
$newpassc = _post('newpassc');
if ($newpass != $newpassc) {
r2($self,'e','Password does not match');	
}
$password = md5(SALT . $newpass);
$d->password = $password;
$d->save();
  r2(APP_URL.'/login','s','Password Change Successful, Please Login again with New Password');
    }
public static function logout () {
session_destroy();
session_start();
  r2(APP_URL.'/login','s','Logged Out. You can login again.');
    }
}