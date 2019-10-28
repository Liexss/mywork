

<?php
	function MyDecrypt($textIn)
	{

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
		$hex_encrypt_data = base64_decode($textIn); //十六进制数据
		
		openssl_private_decrypt($hex_encrypt_data, $textIn, $private_key, OPENSSL_PKCS1_PADDING);
		return $textIn;

	}


?>