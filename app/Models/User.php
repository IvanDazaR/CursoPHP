<?php
namespace App\Models;
// require_once 'BaseElement.php'; TODO: no se necesita por que estamos usando el COMPOSER
use Illuminate\Database\Eloquent\Model;

class User extends Model {
    protected $table = 'users';
}