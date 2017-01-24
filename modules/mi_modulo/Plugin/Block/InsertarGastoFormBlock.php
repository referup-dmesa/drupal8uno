<?php
namespace Drupal\mi_modulo\Plugin\Block;
 
use Drupal\Core\Block\BlockBase;
use Drupal;
/** * 
 * Bloque que muestra un formulario para insertar gastos *
 * @Block(
 *   id = "insertar_gasto_form_block",
 *   admin_label = @Translation("formulario para insertar gastos")
 * )
 */
class MiBloqueBlock extends BlockBase {
    /**
     * {@inheritdoc}
     */
    public function build() {
        return [
            '#type' => 'markup',
            '#markup' => 'mi bloque por fin!!!!!!!!',
        ];
    }
}