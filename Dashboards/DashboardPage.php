<?php

namespace SaberCore\Dashboards;

abstract class DashboardPage {

  public $pageTitle   = 'Saber Core';
  public $menuTitle   = 'Saber Core';
  public $capability  = 'manage_options';
  public $slug        = 'saber-core-dashboard';
  public $callback    = false;
  public $icon        = 'dashicons-format-aside';
  public $position    = 10;

  public function create() {

    $this->callback = [ $this, 'callback' ];
    $this->pageTitle = $this->pageTitle();
    $this->menuTitle = $this->menuTitle();
    $this->slug = $this->slug();

    $result = \add_menu_page(
      $this->pageTitle,
      $this->menuTitle,
      $this->capability,
      $this->slug,
      $this->callback,
      $this->icon,
      $this->position
    );

  }

  abstract public function pageTitle();
  abstract public function slug();

  public function menuTitle() {
    return $this->pageTitle;
  }

  public function capability( $value ) {
    $this->capability = $value;
  }

  public function icon( $value ) {
    $this->icon = $value;
  }

  public function position( $value ) {
    $this->position = $value;
  }

  public function callback() {
    print "PAGE ONTENTEEE!!!!";
  }

}
