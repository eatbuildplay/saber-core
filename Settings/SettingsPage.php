<?php

namespace SaberCore\Settings;

abstract class SettingsPage {

  public $parentSlug  = 'saber-core-dashboard';
  public $pageTitle   = 'Saber Core Settings';
  public $menuTitle   = 'Saber Core Settings';
  public $capability  = 'manage_options';
  public $slug        = 'saber-core-settings';
  public $callback    = false;
  public $position    = 10;

  public function create() {

    $this->callback = [ $this, 'callback' ];
    $this->parentSlug = $this->parentSlug();
    $this->pageTitle  = $this->pageTitle();
    $this->menuTitle  = $this->menuTitle();

    \add_submenu_page(
      $this->parentSlug,
      $this->pageTitle,
      $this->menuTitle,
      $this->capability,
      $this->slug,
      $this->callback,
      $this->position
    );

  }

  abstract public function parentSlug();

  abstract public function pageTitle();

  public function menuTitle() {
    return $this->pageTitle;
  }

  public function capability( $value ) {
    $this->capability = $value;
  }

  public function slug() {
    return strtolower( $this->pageTitle );
  }

  public function position( $value ) {
    $this->position = $value;
  }

  public function callback() {
    print 'HELLO SUBPAGEEDDD';
  }

}
