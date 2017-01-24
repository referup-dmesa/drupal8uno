<?php

/* 
 * @file 
 * Contains \Drupal\example\Form\ExampleForm
 */

namespace Drupal\modulodos\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;



class ExampleFormController extends FormBase {
  public function getFormdId(){
    return 'example_form';
  }  
  
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['phone_number'] = array(
      '#type' => 'tel',
      '#title' => $this->t('phone number guapa')
    );
    $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Save'),
      '#button_type' => 'prymary',
    );
    
   return $form;
  }
  
  public function validateForm(array &$form, FormStateInterface $form_state) {
    
  }

  public function getFormId() {
    
  }

  public function submitForm(array &$form, FormStateInterface $form_state) {
    drupal_set_message($this->t('The phone number is @number', array('@number' => $form_state->getValue('phone_number'))));
  }
}