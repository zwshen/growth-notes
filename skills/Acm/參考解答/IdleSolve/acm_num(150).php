<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=big5">
		<title>ACM�{���]�p</title>
		<!-- ���v�Ҧ�:�p��(smallredbean) smallredbean.csie90@nctu.edu.tw
    		          ��ߥx���k�l���Ť��� 55th318
        		      ��ߥ�q�j�Ǹ�T�u�{�Ǩt�j�@
		-->
	</head>
	<body>
		<font face="Arial">
		Follows 541.c (Total 32 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 541 C */
/* A */
#include &lt;stdio.h&gt;
void main( void )
{
	int a[100][100] ;
	while( 1 )
	{
		int i , j , n , number , row=0 , colunm=0 ;
		scanf( "%d" , &n ) ;
		if( n==0 ) break ;
		for( i=0 ; i&lt;n ; i++ )
			for( j=0 ; j&lt;n ; j++ ) scanf( "%d" , &a[i][j] ) ;
		for( i=0 ; i&lt;n ; i++ )
		{
			number=0 ;
			for( j=0 ; j&lt;n ; j++ ) number+=a[i][j] ;
			if( number%2==1 && row==0 ) row=i+1 ;
			else if( number%2==1 && row!=0 ) row=-1 ;
		}
		for( i=0 ; i&lt;n ; i++ )
		{
			number=0 ;
			for( j=0 ; j&lt;n ; j++ ) number+=a[j][i] ;
			if( number%2==1 && colunm==0 ) colunm=i+1 ;
			else if( number%2==1 && colunm!=0 ) colunm=-1 ;
		}
		if( row==0 && colunm==0 ) printf( "OK\n" ) ;
		else if( row==-1 || colunm==-1 ) printf( "Corrupt\n" ) ;
		else printf( "Change bit (%d,%d)\n" , row , colunm ) ;
	}
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

