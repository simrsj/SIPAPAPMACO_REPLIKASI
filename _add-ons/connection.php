<?php
	try
	{
    $conn = new pdo( 
    				'mysql:host=localhost; dbname=db_sm',
                    'root',
                    '',
                    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}catch(PDOException $ex)
	{
	    die(json_encode(
	    	array(
	    		"<b>Unable connect DATABASE"
	    	)
	    )
	  );
	}
?>