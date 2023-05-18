<?php
use Sectheater\Http\route ;
use App\Controllers\homeController;

// route::get('/' ,function (){
//     echo "hi";
// });
route::get('/',[homeController::class,'index']);