<?php

namespace App\Controllers;

use App\Models\Job;
use Respect\Validation\Validator as v;

class JobsController extends BaseController {
    public function getAddJobAction($request) {
        $responseMessage = null;
        if ($request->getMethod() == 'POST') {
            # code...
            $postData = $request->getParsedBody();
            $jobValidator = v::key('title', v::stringType()->notEmpty())
                  ->key('description', v::stringType()->notEmpty());

            try {
                $jobValidator->assert($postData); // true
                $postData = $request->getParsedBody();

                $files = $request->getUpLoadedFiles();
                $logo = $files['logo'];

                if ($logo->getError() == UPLOAD_ERR_OK) {
                    # code...
                    $fileName = $logo->getClientFileName();
                    $logo->moveTo("uploads/$fileName");
                    $ruta = "uploads/$fileName";
                }
                $job = new Job(); 
                $job->title = $postData['title'];
                $job->description= $postData['description'];
                $job->logo = $ruta;
                $job->save();  

                $responseMessage = 'Saved';
            } catch (\Exception $e) {
                $responseMessage = $e->getMessage();
            }
            
        }

        return $this->renderHTML('addJob.twig', [
            'responseMessage' => $responseMessage
        ]);
    }
}