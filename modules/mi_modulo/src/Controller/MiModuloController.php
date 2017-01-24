<?php
//mi_modulo/src/Controller/MiModuloController.php

namespace Drupal\mi_modulo\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal;

class MiModuloController extends ControllerBase {  
  
  public function insertarGasto() {
        $form = $this->formBuilder()->getForm('Drupal\mi_modulo\Form\InsertarGastoForm');
        
        return [
            '#theme' => 'pagina_insertar_gasto',
            '#titulo' => $this->t('Mi formulario'),
            '#descripcion' => 'Insertar formulario',
            '#formulario' => $form
        ];
    }
  
    public function pagina_1() {
      return array();
        //Voy a enviar por ejemplo los gastos de este mes
        $gastos = array();

        //Hacemos la consulta a la base de datos
        $query = ['uno','dos','tres','cuatro'];
        //metemos los gastos en un array para emviarlos a la vista
        if (!empty($query)) {
            foreach ($query as $gastoId) {
                $gasto = $gastoId;
                $gastos[] = $gasto;
            }
        }
        
        print var_dump($gastos);
        return array(
            '#theme' => 'pagina_1',
            '#titulo' => 'Mi titulo traducido',
            '#descripcion' => 'Gastos de este mes.',
            '#gastos' => $gastos,            
        );
    }

    public function pagina_2() {
        return array(
            '#type' => 'markup',
            '#markup' => $this->t('Esta es otra página!'),
        );
    }
}