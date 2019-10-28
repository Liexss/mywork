/*
*
* Encryption for JS
* Return encrypted text
* Create By Amove 
 */

function myEncryption(textIn)
{
	var pubKey="MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDJTiKycVtES2IKw7Dn4nJ7fy2rKFsIfY5fZYRYR32W2VFxW0O4ncC2g2KNSA37FzRQka7Q9X/Km7rQh0AfobiY5D/VZHdnTeyUC9vxM6HUvwKYekMLfXSIaB5YuUBD1R8rNrRlLbwolrN1A/rPGdgtprPDuRLIaWistwUAdOIH1QIDAQAB";
	var encrypt = new JSEncrypt();
	encrypt.setPublicKey(pubKey);
	return encrypt.encrypt(textIn);
}