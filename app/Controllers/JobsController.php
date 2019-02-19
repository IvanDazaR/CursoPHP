<?php

namespace App\Controllers;

use App\Models\Job;

class JobsController extends BaseController {
    public function getAddJobAction($request) {
        
        if ($request->getMethod() == 'POST') {
            # code...
            $postData = $request->getParsedBody();
            $job = new Job(); 
            $job->title = $postData['title'];
            $job->description= $postData['description'];
            $job->save();
        }
        // include '../views/addJob.php';
        return $this->renderHTML('addJob.twig');
    }
}