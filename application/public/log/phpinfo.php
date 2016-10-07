<?php
// echo 1111111111111;
phpinfo();
// $y=$_POST['year'];
// $m=$_POST['month'];
// $d=$_POST['day'];
// $DOCUMENT_ROOT=$_SERVER['DOCUMENT_ROOT'];

/**
switch($m){
	case 1;
	$m="Jan";
	break;
	case 2;
	$m="Feb";
	break;
	case 3;
	$m="Mar";
	break;
	case 4;
	$m="Apr";
	break;
	case 5;
	$m="May";
	break;
	case 6;
	$m="Jun";
	break;
	case 7;
	$m="Jul";
	break;
	case 8;
	$m="Aug";
	break;
	case 9;
	$m="Sep";
	break;
	case 10;
	$m="Oct";
	break;
	case 11;
	$m="Nov";
	break;
	case 12;
	$m="Dec";
	break;}


	@$fp=fopen("$DOCUMENT_ROOT/../Windows/Temp/php-errors.log",'rb');
	if(!$fp){
		echo "This file do not opened";
		exit;}




		if(empty($d))
		{
			if(empty($m))
			{
				if(empty($y))//000
				{
					echo"you don't choose the right time";
				}
				else//001
				{
					while(!feof($fp))
					{
						$log=fgets($fp);
						$d1=substr($log,1,2);
						$m1=substr($log,4,3);
						$y1=substr($log,8,4);


						if($y==$y1)
						{
							echo $log."<br/>";
						}
					}
				}
			}
			else
			{
				if(empty($y))//010
				{
					while(!feof($fp))
					{
						$log=fgets($fp);
						$d1=substr($log,1,2);
						$m1=substr($log,4,3);
						$y1=substr($log,8,4);


						if($m==$m1)
						{
							echo $log."<br/>";
						}
					}
				}
				else//011
				{
					while(!feof($fp))
					{
						$log=fgets($fp);
						$d1=substr($log,1,2);
						$m1=substr($log,4,3);
						$y1=substr($log,8,4);


						if($m==$m1&&$y==$y1)
						{
							echo $log."<br/>";
						}
					}
				}
			}
		}
		else
		{
			if(empty($m))
			{
				if(empty($y))//100
				{
					while(!feof($fp))
					{
						$log=fgets($fp);
						$d1=substr($log,1,2);
						$m1=substr($log,4,3);
						$y1=substr($log,8,4);


						if($d==$d1)
						{
							echo $log."<br/>";
						}
					}
				}
				else//101
				{
					while(!feof($fp))
					{
						$log=fgets($fp);
						$d1=substr($log,1,2);
						$m1=substr($log,4,3);
						$y1=substr($log,8,4);


						if($d==$d1&&$y==$y1)
						{
							echo $log."<br/>";
						}
					}
				}
			}
			else
			{
				if(empty($y))
				{
					while(!feof($fp))
					{
						$log=fgets($fp);
						$d1=substr($log,1,2);
						$m1=substr($log,4,3);
						$y1=substr($log,8,4);


						if($d==$d1&&$m==$m1)
						{
							echo $log."<br/>";
						}
					}
				}
				else
				{
					while(!feof($fp))
					{
						$log=fgets($fp);
						$d1=substr($log,1,2);
						$m1=substr($log,4,3);
						$y1=substr($log,8,4);


						if($d==$d1&&$m==$m1&&$y==$y1)
						{
							echo $log."<br/>";
						}
					}
				}
			}
		}

*/
		?>
		