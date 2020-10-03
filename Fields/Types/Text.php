<?php

namespace SaberCore\Fields\Types;

abstract class Text extends FieldType {

  abstract public function key();
  abstract public function labelText();

  public function render() {

    $this->renderFieldOpen();

    $this->renderLabel();
    print '<input type="text" name="' . $this->key() . '" id="' . $this->key() . '"" />';

    $this->renderFieldClose();

  }

  public function renderLabel() {
    print '<label>' . $this->labelText() . '</label><br />';
  }

  public function renderFieldOpen() {

    print '<div class="saber-field">';

  }

  public function renderFieldClose() {

    print '</div>';

  }



}
