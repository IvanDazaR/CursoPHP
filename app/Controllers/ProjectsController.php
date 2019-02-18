<?php

namespace App\Controllers;

use App\Models\Project;

class ProjectsController extends BaseController {
    public function getAddProjectAction($request) {
        
        if ($request->getMethod() == 'POST') {
            # code...
            $postData = $request->getParsedBody();
            $project = new Project(); 
            $project->title = $postData['title'];
            $project->description= $postData['description'];
            $project->save();
        }
        // include '../views/addProject.php';
        echo $this->renderHTML('addProject.twig');
    }
}