<?php

require_once 'discountvoucherpurchase.civix.php';
/**
 * Create discount code on form submit
 *
 * @param string $formName
 * @param object $form
 */
function discountvoucherpurchase_civicrm_postProcess($formName, &$form ) {
  if($formName == 'CRM_Contribute_Form_Contribution_Confirm' && isset($form->_id) && $form->_id == 24){
    $params = array(
      'code' => $form->_params['contactID'] . '-' . $form->_params['contributionID'],
      'description' => 'gift from ' . $form->_params['email-5'],
      'amount' => 100,
      'amount_type' => 1,
      'count_max' => 1,
      'memberships'=> array(7,22),
      'version' => 3,
      'multi_valued' => array('memberships' => 1),
      );
    $code = civicrm_api('Item', 'create', $params);
  }
}

/**
 * Implementation of hook_civicrm_config
 */
function discountvoucherpurchase_civicrm_config(&$config) {
  _discountvoucherpurchase_civix_civicrm_config($config);
}

/**
 * Implementation of hook_civicrm_xmlMenu
 *
 * @param $files array(string)
 */
function discountvoucherpurchase_civicrm_xmlMenu(&$files) {
  _discountvoucherpurchase_civix_civicrm_xmlMenu($files);
}

/**
 * Implementation of hook_civicrm_install
 */
function discountvoucherpurchase_civicrm_install() {
  return _discountvoucherpurchase_civix_civicrm_install();
}

/**
 * Implementation of hook_civicrm_uninstall
 */
function discountvoucherpurchase_civicrm_uninstall() {
  return _discountvoucherpurchase_civix_civicrm_uninstall();
}

/**
 * Implementation of hook_civicrm_enable
 */
function discountvoucherpurchase_civicrm_enable() {
  return _discountvoucherpurchase_civix_civicrm_enable();
}

/**
 * Implementation of hook_civicrm_disable
 */
function discountvoucherpurchase_civicrm_disable() {
  return _discountvoucherpurchase_civix_civicrm_disable();
}

/**
 * Implementation of hook_civicrm_upgrade
 *
 * @param $op string, the type of operation being performed; 'check' or 'enqueue'
 * @param $queue CRM_Queue_Queue, (for 'enqueue') the modifiable list of pending up upgrade tasks
 *
 * @return mixed  based on op. for 'check', returns array(boolean) (TRUE if upgrades are pending)
 *                for 'enqueue', returns void
 */
function discountvoucherpurchase_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _discountvoucherpurchase_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implementation of hook_civicrm_managed
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 */
function discountvoucherpurchase_civicrm_managed(&$entities) {
  return _discountvoucherpurchase_civix_civicrm_managed($entities);
}
