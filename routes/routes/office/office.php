<?php

Route::group(['prefix'=>'office'],function(){

  Route::get('branches',['as'=>'indexBranches','uses'=>'office\branches\ctrBranches@index']);

});

 ?>
