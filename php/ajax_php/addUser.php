<?php 
session_start();
header("content-type:text/html;charset=utf-8");         //设置编码
$json=file_get_contents("php://input");
$obj=json_decode($json);
include_once("connect.php");

$name=$obj->name;
$password=$obj->password;

$private_key = "-----BEGIN PRIVATE KEY-----
MIICdwIBADANBgkqhkiG9w0BAQEFAASCAmEwggJdAgEAAoGBAMlOIrJxW0RLYgrD
sOficnt/LasoWwh9jl9lhFhHfZbZUXFbQ7idwLaDYo1IDfsXNFCRrtD1f8qbutCH
QB+huJjkP9Vkd2dN7JQL2/EzodS/Aph6Qwt9dIhoHli5QEPVHys2tGUtvCiWs3UD
+s8Z2C2ms8O5EshpaKy3BQB04gfVAgMBAAECgYEAipkTZoyJa/IC5KpraJwOelzL
0qYMV0Iq/h9lCWrfWzbwzf0qGTfz8TVwaxmLFq+ZQ0eqdxAwFg02iFA2pBCyiMhy
s1ZFsRVERGk2Qo8dQb2ly3XsngHtB/j7oBJVcWvwD+JtSWkBWLYPZqpkM5uU3hD6
fEAVAmVHRjq6n7LwccECQQDzYzcYwwMa9h6m2BrEYlDQpI3Cl/jtUGNSiOWVl+nq
eBqDanzfwX6/yywNLjKVKns00zxolEG7edOeSPPyfY1pAkEA07ynr37tjJua17rA
uE0dllcAHA4Ko8boMjbvOwBNp2ypxNAtdodyjIEdJJ/7zOZJX1JSILRu3EPFmjjL
pvxdjQJAKfYqEp/UkjpqsHNDsiYNLtugATO4XBnm9dzaUD8/ugf48j1SyDURCDoc
Hy2e1O7dDQ96M8GTz6HCZWDIhj81OQJAWjx6UkaLwnLGSM4kN+dVhq7JMyugyS+J
4WycA88bSRD8QQ5fcbZD0TFtVCCCVU6HUoJo0dtTq7eOTS2LTT0cOQJBAIuD+5s/
TMnzjBKjuNaXohF2F3j54dSeEnvnUjXfLfyl8qL+9AwZaPeTZ320eWeixuSau26Z
gl5DBWDZPTcL3OE=
-----END PRIVATE KEY-----";
$hex_encrypt_data = base64_decode($password); //十六进制数据

openssl_private_decrypt($hex_encrypt_data, $password, $private_key, OPENSSL_PKCS1_PADDING);
$password=sha1($password);

$account=$obj->account;
$class=$obj->class;

$db = db_connection("localhost","root","","money");
$select = "select count(*) from student where student_id='".$account."'and is_post=1";
$result = mysqli_query($db,$select);
$attr=$result->fetch_row();
if($attr[0]!="0")
	$flag=0;
else
{
	$update = "insert into student (student_id,password,class,is_post,name) values ('".$account."','".$password."','".$class."',1,'".$name."')";
	$result = mysqli_query($db,$update);
}

echo json_encode(array("flag"=>$flag,"result"=>$update));
?>