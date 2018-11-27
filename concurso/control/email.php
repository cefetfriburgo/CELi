<?php
       if(isset(email)){
           $to= 'anabeatrizquintes@gmail.com';
           $subject = 'Incrição no Celi';
           $message = 'Parábens, você acaba de se escrever no Celi. Aguarde o resultado do sorteio. ';
            			
           // To send HTML mail, the Content-type header must be set
           $headers  = 'MIME-Version: 1.0' . "\r\n";
           $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
            			
           // Additional headers
           $headers .= 'To: <destinatario@aqui.com>' . "\r\n";
           $headers .= 'From: Título do remetente <remetente@aqui.com>' . "\r\n";
           $headers .= 'Cc: remetente@aqui.com' . "\r\n";
           $headers .= 'Bcc: remetente@aqui.com' . "\r\n";
            			
            // Mail it
            mail($to, $subject, $message, $headers);
        }
 ?>