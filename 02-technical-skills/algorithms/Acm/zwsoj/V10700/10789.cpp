/* @JUDGE_ID: 13160EW 10789 C++ */
// 02/05/06 23:23:18

//@BEGIN_OF_SOURCE_CODE 

#include <iostream>
#include <string.h>

using namespace std;

const int TABLE_SIZE = 10 + 26 + 26;
int table[TABLE_SIZE];	// 10 + 26 + 26

void init() {
	for(int i=0;i<TABLE_SIZE;i++)
		table[i] = 0;
}

inline int convert(char c) {
	if( c >= '0' && c <= '9' ) return c-'0';
	if( c >= 'A' && c <= 'Z' ) return c-'A'+10;	// 0~9, A~Z
	if( c >= 'a' && c <= 'z' ) return c-'a'+36;	// 0~9, A-Z, a~z
	return 0;
}

inline char unConvert(int n) {
	if( n < 10 ) return '0' + n;
	if( n < 36 ) return 'A' + n-10;
	return 'a' + n - 36;
}

inline bool isPrime(int cnt) {
	switch( cnt ) {
		case 2: return true;
		case 3: return true;
		case 5: return true;
		case 7: return true;
		case 11: return true;
		case 13: return true;
		case 17: return true;
		case 19: return true;
		case 23: return true;
		case 29: return true;
		case 31: return true;
		case 37: return true;
		case 41: return true;
		case 43: return true;
		case 47: return true;
		case 53: return true;
		case 59: return true;
		case 61: return true;
		case 67: return true;
		case 71: return true;
		case 73: return true;
		case 79: return true;
		case 83: return true;
		case 89: return true;
		case 97: return true;
		case 101: return true;
		case 103: return true;
		case 107: return true;
		case 109: return true;
		case 113: return true;
		case 127: return true;
		case 131: return true;
		case 137: return true;
		case 139: return true;
		case 149: return true;
		case 151: return true;
		case 157: return true;
		case 163: return true;
		case 167: return true;
		case 173: return true;
		case 179: return true;
		case 181: return true;
		case 191: return true;
		case 193: return true;
		case 197: return true;
		case 199: return true;
		case 211: return true;
		case 223: return true;
		case 227: return true;
		case 229: return true;
		case 233: return true;
		case 239: return true;
		case 241: return true;
		case 251: return true;
		case 257: return true;
		case 263: return true;
		case 269: return true;
		case 271: return true;
		case 277: return true;
		case 281: return true;
		case 283: return true;
		case 293: return true;
		case 307: return true;
		case 311: return true;
		case 313: return true;
		case 317: return true;
		case 331: return true;
		case 337: return true;
		case 347: return true;
		case 349: return true;
		case 353: return true;
		case 359: return true;
		case 367: return true;
		case 373: return true;
		case 379: return true;
		case 383: return true;
		case 389: return true;
		case 397: return true;
		case 401: return true;
		case 409: return true;
		case 419: return true;
		case 421: return true;
		case 431: return true;
		case 433: return true;
		case 439: return true;
		case 443: return true;
		case 449: return true;
		case 457: return true;
		case 461: return true;
		case 463: return true;
		case 467: return true;
		case 479: return true;
		case 487: return true;
		case 491: return true;
		case 499: return true;
		case 503: return true;
		case 509: return true;
		case 521: return true;
		case 523: return true;
		case 541: return true;
		case 547: return true;
		case 557: return true;
		case 563: return true;
		case 569: return true;
		case 571: return true;
		case 577: return true;
		case 587: return true;
		case 593: return true;
		case 599: return true;
		case 601: return true;
		case 607: return true;
		case 613: return true;
		case 617: return true;
		case 619: return true;
		case 631: return true;
		case 641: return true;
		case 643: return true;
		case 647: return true;
		case 653: return true;
		case 659: return true;
		case 661: return true;
		case 673: return true;
		case 677: return true;
		case 683: return true;
		case 691: return true;
		case 701: return true;
		case 709: return true;
		case 719: return true;
		case 727: return true;
		case 733: return true;
		case 739: return true;
		case 743: return true;
		case 751: return true;
		case 757: return true;
		case 761: return true;
		case 769: return true;
		case 773: return true;
		case 787: return true;
		case 797: return true;
		case 809: return true;
		case 811: return true;
		case 821: return true;
		case 823: return true;
		case 827: return true;
		case 829: return true;
		case 839: return true;
		case 853: return true;
		case 857: return true;
		case 859: return true;
		case 863: return true;
		case 877: return true;
		case 881: return true;
		case 883: return true;
		case 887: return true;
		case 907: return true;
		case 911: return true;
		case 919: return true;
		case 929: return true;
		case 937: return true;
		case 941: return true;
		case 947: return true;
		case 953: return true;
		case 967: return true;
		case 971: return true;
		case 977: return true;
		case 983: return true;
		case 991: return true;
		case 997: return true;
		case 1009: return true;
		case 1013: return true;
		case 1019: return true;
		case 1021: return true;
		case 1031: return true;
		case 1033: return true;
		case 1039: return true;
		case 1049: return true;
		case 1051: return true;
		case 1061: return true;
		case 1063: return true;
		case 1069: return true;
		case 1087: return true;
		case 1091: return true;
		case 1093: return true;
		case 1097: return true;
		case 1103: return true;
		case 1109: return true;
		case 1117: return true;
		case 1123: return true;
		case 1129: return true;
		case 1151: return true;
		case 1153: return true;
		case 1163: return true;
		case 1171: return true;
		case 1181: return true;
		case 1187: return true;
		case 1193: return true;
		case 1201: return true;
		case 1213: return true;
		case 1217: return true;
		case 1223: return true;
		case 1229: return true;
		case 1231: return true;
		case 1237: return true;
		case 1249: return true;
		case 1259: return true;
		case 1277: return true;
		case 1279: return true;
		case 1283: return true;
		case 1289: return true;
		case 1291: return true;
		case 1297: return true;
		case 1301: return true;
		case 1303: return true;
		case 1307: return true;
		case 1319: return true;
		case 1321: return true;
		case 1327: return true;
		case 1361: return true;
		case 1367: return true;
		case 1373: return true;
		case 1381: return true;
		case 1399: return true;
		case 1409: return true;
		case 1423: return true;
		case 1427: return true;
		case 1429: return true;
		case 1433: return true;
		case 1439: return true;
		case 1447: return true;
		case 1451: return true;
		case 1453: return true;
		case 1459: return true;
		case 1471: return true;
		case 1481: return true;
		case 1483: return true;
		case 1487: return true;
		case 1489: return true;
		case 1493: return true;
		case 1499: return true;
		case 1511: return true;
		case 1523: return true;
		case 1531: return true;
		case 1543: return true;
		case 1549: return true;
		case 1553: return true;
		case 1559: return true;
		case 1567: return true;
		case 1571: return true;
		case 1579: return true;
		case 1583: return true;
		case 1597: return true;
		case 1601: return true;
		case 1607: return true;
		case 1609: return true;
		case 1613: return true;
		case 1619: return true;
		case 1621: return true;
		case 1627: return true;
		case 1637: return true;
		case 1657: return true;
		case 1663: return true;
		case 1667: return true;
		case 1669: return true;
		case 1693: return true;
		case 1697: return true;
		case 1699: return true;
		case 1709: return true;
		case 1721: return true;
		case 1723: return true;
		case 1733: return true;
		case 1741: return true;
		case 1747: return true;
		case 1753: return true;
		case 1759: return true;
		case 1777: return true;
		case 1783: return true;
		case 1787: return true;
		case 1789: return true;
		case 1801: return true;
		case 1811: return true;
		case 1823: return true;
		case 1831: return true;
		case 1847: return true;
		case 1861: return true;
		case 1867: return true;
		case 1871: return true;
		case 1873: return true;
		case 1877: return true;
		case 1879: return true;
		case 1889: return true;
		case 1901: return true;
		case 1907: return true;
		case 1913: return true;
		case 1931: return true;
		case 1933: return true;
		case 1949: return true;
		case 1951: return true;
		case 1973: return true;
		case 1979: return true;
		case 1987: return true;
		case 1993: return true;
		case 1997: return true;
		case 1999: return true;
	}
	return false;
}

void compute(char* buf) 
{
	init();

	// count it
	int len = strlen(buf);
	for(int i=0;i<len;i++)
		table[ convert(buf[i]) ] += 1;

	// display answers (ascii order)
	bool flag = true;
	for(int i=0;i<TABLE_SIZE;i++) {
		if( isPrime( table[i] ) ) {
			cout << (char)unConvert( i );
			flag = false;
		}
	}
	if( flag ) cout << "empty";
}

int main()
{
	int t;
	cin >> t;
	for(int c=1;c<=t;c++) {
		char buf[2002];
		cin >> buf;
		cout << "Case " << c << ": ";
		compute( buf );
		cout << endl;
	}

	return 0;
}

