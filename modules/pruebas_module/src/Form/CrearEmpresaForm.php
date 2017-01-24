<?php
namespace Drupal\pruebas_module\Form;
 
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Component\Utility\UrlHelper;
use Drupal\validate_module\Controller\ValidateController;
 
 
class CrearEmpresaForm extends FormBase {
 
    /**
     * {@inheritdoc}
     */
    public function getFormId() {
        // Nombre del formulario
        return 'crear_empresa_form';
    }
 
    /**
     * {@inheritdoc}
     */
    public function buildForm(array $form, FormStateInterface $form_state) {
     
      
       // Definimos los campos
        $form['name'] = [
            '#type'     => 'textfield',
            '#title'    => $this->t('Sitio web'),
            '#required' => TRUE,
        ];
        
        $form['password'] = [
            '#type'     => 'textfield',
            '#title'    => $this->t('Sitio web'),
            '#required' => TRUE,
        ];
         
        $form['location'] = [
            '#type'     => 'text_format',
            '#title'    => $this->t('Dirección'),
            '#required' => TRUE,
        ];
        
         
        
     $form['phone_number'] = array(
      '#type' => 'tel',
      '#title' => $this->t('phone number guapa')
     );         
        
        $form['submit'] = [
            '#type'  => 'submit',
            '#value' => $this->t('Crear empresa'),
        ];
        return $form;
    }
 
    /**
     * {@inheritdoc}
     */
    public function validateForm(array &$form, FormStateInterface $form_state) {
      $lolo = ValidateController::validateEmail($form_state->getValue('web'));
      if(!$lolo){
        $form_state->setErrorByName('web', $this->t('mail mal'));
        
      }
        // Hacemos las validaciones necesarias
        if (empty($form_state->getValue('web'))) {
         //   $form_state->setErrorByName('web', $this->t('Es necesario introducir un sitio web'));
        }
    }
 
    /**
     * {@inheritdoc}
     */
    public function submitForm(array &$form, FormStateInterface $form_state) {
$language = \Drupal::languageManager()->getCurrentLanguage()->getId();
$user = \Drupal\user\Entity\User::create();

// Mandatory.
$user->setPassword('password');
$user->enforceIsNew();
$user->setEmail('email');
$user->setUsername('user_name');

// Optional.
$user->set('init', 'email');
$user->set('langcode', $language);
$user->addRole('rid');
$user->activate();

// Save user account.
$result = $user->save();
      drupal_set_message($this->t('el numero de tel de la chica guapa es @number', array('@number' => $form_state->getValue('phone_number'))));
      drupal_set_message($this->t('Tu pagina web @web', array('@web' => $form_state->getValue('web'))));
      // Mostrar resultados al enviar el formulario en un mensaje de drupal
    }
}