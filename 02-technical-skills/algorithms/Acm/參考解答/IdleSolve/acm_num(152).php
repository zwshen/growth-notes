<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=big5">
		<title>ACM程式設計</title>
		<!-- 版權所有:小豆(smallredbean) smallredbean.csie90@nctu.edu.tw
    		          國立台中女子高級中學 55th318
        		      國立交通大學資訊工程學系大一
		-->
	</head>
	<body>
		<font face="Arial">
		Follows 555.c (Total 68 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 555 C */
/* A */
#include &lt;stdio.h&gt;
void main( void )
{
	char card[4][2][13] ,  top , dec , print[4][26] , a[53] , b[53] ;
	int i , j , k , point ;
	/* S W N E */
	while( scanf("%c\n" , &dec )==1 ){
		if( dec=='#' ) break ;
		switch ( dec ){
			case 'S' : i = 1 ; break ;
			case 'W' : i = 2 ; break ;
			case 'N' : i = 3 ; break ;
			case 'E' : i = 0 ; break ;
		}
		for( j=0 ; j&lt;13 ; j++ )
			for( k=0 ; k&lt;4 ; k++ , i=(i+1)%4 ){
				scanf( "%c" , &card[i][0][j] ) ;
				if( card[i][0][j]=='\n' ) scanf( "%c" , &card[i][0][j] ) ;
				scanf( "%c" , &card[i][1][j] ) ;
				if( card[i][1][j]=='\n' ) scanf( "%c" , &card[i][1][j] ) ;
			}
		for( i=0 ; i&lt;4 ; i++ ){
			point = 0 ; dec = 'C' ;
			while( dec!='Z' ){
				top = '2' ;
				while( top!='Z' ){
					for( k=0 ; k&lt;13 ; k++ ){
						if( card[i][0][k]==dec && card[i][1][k]==top ){
							print[i][point] = dec ;
							print[i][point+1] = top ;
							point += 2 ;
						}
					}
					switch ( top ){
						case '9' : top = 'T' ; break ;
						case 'T' : top = 'J' ; break ;
						case 'J' : top = 'Q' ; break ;
						case 'Q' : top = 'K' ; break ;
						case 'K' : top = 'A' ; break ;
						case 'A' : top = 'Z' ; break ;
						default : top++ ; break ;
					}
				}
				if( dec=='C' ) dec = 'D' ;
				else if( dec=='D' ) dec = 'S' ;
				else if( dec=='S' ) dec = 'H' ;
				else if( dec=='H' ) dec = 'Z' ;
			}
		}
		for( i=0 ; i&lt;4 ; i++ ){
			switch ( i ){
				case 0 : dec = 'S' ; break ;
				case 1 : dec = 'W' ; break ;
				case 2 : dec = 'N' ; break ;
				case 3 : dec = 'E' ; break ;
				default : break ;
			}
			printf( "%c:" , dec ) ;
			for( j=0 ; j&lt;26 ; j+=2 )
				printf( " %c%c" , print[i][j] , print[i][j+1] ) ;
			printf( "\n" ) ;
		}
		printf( "\n" ) ;
		scanf( "\n" ) ;
	}
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

