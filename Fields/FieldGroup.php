<?php

namespace SaberCore\Fields;

abstract class FieldGroup {

  public $fields = [];

  public function __construct() {

    $this->fields = $this->fields();

  }

  public static function renderSettings() {

    print 'SETTINGS WP...';

  }

  public static function renderField1() {

    print "FIELD !1";

  }

  public function process() {

    // add the admin notice
		$admin_notice = "success";

		// redirect the user to the appropriate page
		wp_redirect( $_SERVER['HTTP_REFERER'] );
		exit;

  }

  abstract public function fields();

  public function render() {

    $this->renderName();
    $this->renderFormOpen();
    $this->renderFields();
    $this->renderSubmitButton();
    $this->renderFormClose();


  }

  /*
   * Render Fields
   */
  public function renderFields() {

    foreach( $this->fields as $field ) {
      $field->render();
    }

  }

  /*
   * Render Form Elements
   */


  public function renderFormOpen() {
    $adminPostUrl = esc_url( admin_url( 'admin-post.php' ) );
    print '<form action="' . $adminPostUrl . '" method="post">';
    print '<input type="hidden" name="action" value="saber_form">';
  }

  public function renderFormClose() {
    print '</form>';
  }

  public function renderName() {
    print '<h1>' . $this->getName() . '</h1>';
  }

  public function getName() {
    return "Field Group";
  }

  public function getKey() {
    return 'saber_form';
  }

  public function renderSubmitButton() {
    print '<input type="submit" value="Save" />';
  }

}
