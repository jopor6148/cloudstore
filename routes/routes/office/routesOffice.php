<?php

Route::group(['prefix'=>'office'],function(){

  Route::resource("","office\ctrOffice");

  Route::resource('branches','office\branches\ctrBranches');

  Route::resource('almacenes','office\almacenes\ctrAlmacenes');

  Route::resource("invetarios",'office\inventarios\ctrInventarios');

  Route::resource("articulos","office\articulos\ctrArticulos");

});

 ?>
