<?php
namespace App\Models;
// require_once 'BaseElement.php'; TODO: no se necesita por que estamos usando el COMPOSER
use Illuminate\Database\Eloquent\Model;

class Job extends Model {
    protected $table = 'jobs';
    // public function __construct($title, $description) {
    //     $newTitle = 'Job: ' . $title;
    //     $this->title = $newTitle;
    // }

    public function getDurationAsString() {
        $years = floor($this->months / 12);
        $extraMonths = $this->months % 12;
      
        return "Job duration: $years years $extraMonths months";
    }
}