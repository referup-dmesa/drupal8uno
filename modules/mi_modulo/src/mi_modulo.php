<?php

function mi_modulo_theme($existing, $type, $theme, $path) {

    return array(
      
        'pagina_1' => array(
            'variables' => array(
                'titulo' => 'Página 1', 
                'descripcion' => NULL,
                'otraVariable' => NULL
                ),
            'template' => 'pagina-1'),
        
        'pagina_2' => array(
            'variables' => array(
                'titulo' => 'Página 2', 
                'descripcion' => NULL,
                'otraVariable' => NULL
                ),
            'template' => 'pagina-2'),
        );
}