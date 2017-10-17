<?php

Route::group(['prefix'=>'office'],function(){

  Route::resource('branches','office\branches\ctrBranches');

  Route::resource('almacenes','office\almacenes\ctrAlmacenes');

  Route::resource("invetarios",'office\inventarios\ctrInventarios');

});

 ?>
