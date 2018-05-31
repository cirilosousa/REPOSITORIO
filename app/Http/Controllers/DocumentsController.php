<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;

class DocumentsController extends Controller
{
   public function getfile($path) {
   	return response()->file(storage_path('app/documents/' . $path));
   }
}
