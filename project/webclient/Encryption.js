/*
 * �澆捆銝剜�𣸆ase64��惩�閫��
 *  Depends:
 *	Base64.js
 *	UnicodeAnsi.js
 */

 function Encryption(str) {
	if(str)
		return encode64(strUnicode2Ansi(str));
	else
		return str;
}

function Decryption(str) {
	if(str)
		return strAnsi2Unicode(decode64(str));
	else
		return str;
}


/*
 * 撣行�劐葉����base64蝻𣇉�閫��
 */
function zhBase64Encode(str){
	if(str)
		return encode64(utf16to8(str));
	else
		return str;
}

function zhBase64Decode(str){
	if(str)
		return utf8to16(decode64(str));
	else
		return str;
}hunter
