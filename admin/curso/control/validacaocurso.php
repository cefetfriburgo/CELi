<?php
	function validarnomecurso ($nomecurso){
	    if($nomecurso == NULL || is_numeric($nomecurso))
	    return 1;
	    else
	        return 0;
	}
?>
