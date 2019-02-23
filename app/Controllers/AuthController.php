<?php

namespace App\Controllers;

use App\Models\User;
use Respect\Validation\Validator as v;
use Zend\Diactoros\Response\RedirectResponse;

class AuthController extends BaseController {
    public function getLogin() {
        return $this->renderHTML('login.twig');
    }
    public function postLogin($request){
        $postData = $request->getParsedBody();
        $responseMessage= null;
        $user = User::where('email', $postData['email'])->first();
        
        if ($user) {
            # code...
            if (password_verify($postData['password'], $user->password)) {
                # code...
                $_SESSION['userId'] = $user->id;
                return new RedirectResponse('admin');
            } else {
                # code...
                $responseMessage= 'Bad credentials';
            }
        } else {
            # code...
            $responseMessage= 'Bad credentials';
        }
        return $this->renderHTML('login.twig', ['responseMessage'=>$responseMessage]);
    }
    public function getLogout() {
        unset($_SESSION['userId']);
        return new RedirectResponse('login');
    }
    public function getLoginRequired() {
         return new RedirectResponse('/cursoPHP/login');
        //  $responseMessage= 'Protected route';
          
   	}
}
