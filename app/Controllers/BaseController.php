<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 *
 * Extend this class in any new controllers:
 * ```
 *     class Home extends BaseController
 * ```
 *
 * For security, be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */

    // protected $session;

    /**
     * @param CLIRequest|IncomingRequest $request
     *
     * @return void
     */
    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        // Load here all helpers you want to be available in your controllers that extend BaseController.
        // Caution: Do not put the this below the parent::initController() call below.
        // $this->helpers = ['form', 'url'];

        // Caution: Do not edit this line.
        parent::initController($request, $response, $logger);
        $this->session = \Config\Services::session();
        if (!$this->session->get('isLoggedIn') && $this->request->getCookie('remember_user')) {
            
            $userId = $this->request->getCookie('remember_user');
            $userModel = new \App\Models\UserModel();
            $user = $userModel->find($userId);
            if ($user) {
                $ses_data = [
                    'id'            => $user['id'],
                    'name'          => $user['name'],
                    'email'         => $user['email'],
                    'administrator' => $user['administrator'],
                    'isLoggedIn'    => TRUE
                ];
                $this->session->set($ses_data);
            }
        }

        // Preload any models, libraries, etc, here.
        // $this->session = service('session');
        $session = \Config\Services::session();
        if ($session->has('locale')) {
            $this->request->setLocale($session->get('locale'));
        }
    }
    public function uploadPhoto()
    {
        $session = session();
        $userId = $session->get('id');
        $validationRule = [
            'profile_image' => [
                'label' => 'Image File',
                'rules' => 'uploaded[profile_image]'
                    . '|is_image[profile_image]'
                    . '|mime_in[profile_image,image/jpg,image/jpeg,image/png]'
                    . '|max_size[profile_image,2048]', 
                ],
        ];

        if (! $this->validate($validationRule)) {
            return redirect()->back()->with('error', 'Error: Archivo inválido o muy pesado. Usa JPG/PNG (Max 2MB).');
        }

        $file = $this->request->getFile('profile_image');

        if ($file->isValid() && ! $file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/profiles/', $newName);
            $userModel = new \App\Models\UserModel();
            $userModel->update($userId, ['profile_picture' => $newName]);
            $session->set('profile_picture', $newName);

            return redirect()->back()->with('success', 'Foto actualizada.');
        }

        return redirect()->back()->with('error', 'Error al procesar la imagen.');
    }  
}
