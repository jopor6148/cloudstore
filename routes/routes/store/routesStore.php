<?php

Route::group(["prefix"=>"store"],function(){

  Route::resource("proveedores","store\proveedores\ctrProveedores");


});

 ?>
