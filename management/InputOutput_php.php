<?php 
		function Input(){
			$open = fopen("php://STDIN", "r");
			$a = fgets($open);
			fclose($open);
			return $a;
		}
		echo "enter your name";
		$b = Input();
		echo "\n" . "your name  = " . $b;
 ?>