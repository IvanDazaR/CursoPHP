<?php

namespace App\Controllers;

use App\Models\{Job, Project};

class IndexController {
    public function indexAction(){         
        $jobs = Job::all();
        $projects = Project::all();
        // $project1 = new Project('Project 1', 'Description 1');
        // $projects = [
        //     $project1
        // ];     
        
        $name = 'Ivan Daza';
        $limitMonths = 2000;

        include '../views/index.php';
    }
}
