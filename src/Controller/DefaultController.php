<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends AbstractController
{

    public function homepage(Request $request)
    {
        $response = $this->render('static/homepage.html.twig'); // Twig à faire
        $response->setEtag(md5($response->getContent()));
        $response->setPublic(); // make sure the response is public/cacheable
        $response->isNotModified($request);

        return $response;
    }

    public function about()
    {
        $response = $this->render('static/about.html.twig');
        $response->setPublic();
        $response->setMaxAge(600);

        return $response;

    }

    public function delete(Request $request)
    {
        $submittedToken = $request->request->get('token');

        // 'delete-item' is the same value used in the template to generate the token
        if ($this->isCsrfTokenValid('delete-item', $submittedToken)){
            // ... do something, like deleting an object
        }
    }
}