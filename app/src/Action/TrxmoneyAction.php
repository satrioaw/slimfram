<?php

namespace App\Action;

use Slim\Views\Twig;
use Psr\Log\LoggerInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Carlosocarvalho\SimpleInput\Input\Input;
use App\Helper\JsonRequest;
use App\Helper\JsonRenderer;

use App\Model\User;
use App\Model\Transaction;

class TrxmoneyAction 
{

    private $view;
    private $logger;
    private $session;
    private $jsonRequest;
    private $jsonRender; 

    public function __construct(Twig $view, LoggerInterface $logger)
    {
        $this->view = $view;
        $this->logger = $logger;
        $this->session  = new \App\Helper\Session;
        $this->jsonRequest  = new JsonRequest();
        $this->jsonRender   = new JsonRenderer();
    }

    public function index(Request $request, Response $response, $args)
    {
        $this->logger->info("Home page action dispatched");

        $this->view->render($response, 'trx.twig',[
            'send' => User::find($this->session->user_id)->trx,
            'receive' => Transaction::where('to',$this->session->user_id)->get(),         
            ]);

        return $response;
    }

    public function update(Request $request, Response $response, $args)
    {
        Transaction::find($args['id'])->update([
                    'approved' => 1
                ]);
        return $response->withRedirect('/trx');
    }

    public function create(Request $request, Response $response, $args)
    {
        $this->view->render($response, 'send.twig',[
            'user' => $this->session->user_id,
            ]);

        return $response;
    }

    public function store(Request $request, Response $response, $args)
    {
       Transaction::create([
            'user_id' => $this->session->user_id,
            'to' => Input::post('to'),
            'description' => Input::post('description'),
            'amount' => Input::post('amount'),
            'approved' => 0
        ]);

       return $response->withRedirect('/trx');
    }

    public function indexJson(Request $request, Response $response, $args)
    {
        $this->logger->info("Json index accessed");

        $data = [
            'send' => User::find(1)->trx,
            'receive' => Transaction::where('to',1)->get(),         
            ];


        $response = $this->jsonRender->render($response, 200, $data);
        return $response;
    }
}