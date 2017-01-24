<?php
namespace Drupal\pruebas_module\Controller;
 
use Drupal;
use Drupal\node\Entity\Node;
use Drupal\Core\Controller\ControllerBase;
 
class PruebasController extends ControllerBase {
     
  public function content() {
    return array(
        '#type' => 'markup',
        '#markup' => $this->t('Hola mundo !!'),
    );
  }
   
    public function crearEmpresa() {
// Utilizamos el formulario
        $form = $this->formBuilder()->getForm('Drupal\pruebas_module\Form\CrearEmpresaForm');
         
// Le pasamos el formulario y demás a la vista (tema configurado en el module)
        return [
            '#theme' => 'crear_empresa',
            '#titulo' => $this->t('FORMULARIO CHORRA'),
            '#descripcion' => 'A tope con mi primer formulario en Drupal 8',
            '#formulario' => $form
        ];
    }
   
}
 
?>