<?php

/*
 * Init autoloading
 */
spl_autoload_register('saberCoreLoader');
function saberCoreLoader( $className ) {

  if ( 0 !== strpos( $className, 'SaberCore\\' ) ) {
    return;
  }

  // strip the namespace leaving only the final class name
  $className = str_replace('SaberCore\\', '', $className);
  $className = str_replace('\\', '/', $className);

  require( $className . '.php' );

}
