<?php

namespace App\Models;

// require_once 'BaseElement.php'; TODO: No se necesita por que estamos usando COMPOSER
use Illuminate\Database\Eloquent\Model;

class Project extends Model {
    protected $table = 'projects';
    public function getDurationAsString(){
		return'';
	}
}