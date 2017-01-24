<?php
namespace Drupal\validate_module\Controller;
 
use Drupal;
use Drupal\node\Entity\Node;
use Drupal\Core\Controller\ControllerBase;
 
class ValidateController extends ControllerBase {  
   
    public function validateEmail($inputEmail) {
        // Primero, checamos que solo haya un símbolo @, y que los largos sean correctos
        if (!ereg("^[^@]{1,64}@[^@]{1,255}$", $inputEmail)) 
        {
          // correo inválido por número incorrecto de caracteres en una parte, o número incorrecto de símbolos @
          return false;
        }
        // se divide en partes para hacerlo más sencillo
        $inputEmail_array = explode("@", $inputEmail);
        $local_array = explode(".", $inputEmail_array[0]);
        for ($i = 0; $i < sizeof($local_array); $i++) 
        {
          if (!ereg("^(([A-Za-z0-9!#$%&'*+/=?^_`{|}~-][A-Za-z0-9!#$%&'*+/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$", $local_array[$i])) 
          {
            return false;
          }
        } 
        // se revisa si el dominio es una IP. Si no, debe ser un nombre de dominio válido
        if (!ereg("^\[?[0-9\.]+\]?$", $inputEmail_array[1])) 
        { 
           $domain_array = explode(".", $inputEmail_array[1]);
           if (sizeof($domain_array) < 2) 
           {
              return false; // No son suficientes partes o secciones para se un dominio
           }
           for ($i = 0; $i < sizeof($domain_array); $i++) 
           {
              if (!ereg("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$", $domain_array[$i])) 
              {
                 return false;
              }
           }
        }
        return true;
    }
   
}
 
?>