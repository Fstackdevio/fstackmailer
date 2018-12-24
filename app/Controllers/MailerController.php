<?php
namespace App\Controllers;

use App\Renders\ApiView;
use Slim\Http\Request;
use Slim\Http\Response;
use Psr\Log\LoggerInterface;

final class MailerController {
    private $view;
    private $logger;
    private $db;
    private $session;
    private $passwordHasher;

    public function __construct(ApiView $view, LoggerInterface $logger, $cdb, $sess, $phash){
        $this->view = $view;
        $this->logger = $logger;
        $this->db = $cdb;
        $this->session = $sess;
        $this->passwordHasher = $phash;
    }  

    public function test(Request $request, Response $response, $args){
        $input = $request->getParsedBody();
        $uEmail = htmlspecialchars($input['email']);
        $uPass = htmlspecialchars($input['password']);

        $message = ['message' => "You're already logged in!", 'data' => $uEmail];
        return $this->view->render($request, $response, $message, 401);
    }

    public function Sendmail(Request $request, Response $response, $args){
      
    }
}
