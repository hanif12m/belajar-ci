<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

use App\Models\DiskonModel;

abstract class BaseController extends Controller
{
    protected $request;
    protected $helpers = [];

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Load session service
        $this->session = session();

        // Set session diskon aktif hari ini
        $today = date('Y-m-d');
        $diskonModel = new DiskonModel();
        $diskonAktif = $diskonModel->where('tanggal', $today)->first();

        if ($diskonAktif) {
            session()->set('diskon_nominal', $diskonAktif['nominal']);
        } else {
            session()->remove('diskon_nominal');
        }
    }
}
