<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{

    /**
     * @Route("/home", name="homepage")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index()
    {
        // somehow create a Response object, like by rendering a template
        $response = $this->render('blog/index.html.twig'); // template à faire

        // cache publicly for 3600 seconds
        $response->setPublic();
        $response->setMaxAge(3600);

        // (optional) set a custom Cache-Control directive
        $response->headers->addCacheControlDirective('must-revalidate', true);

        return $response;
    }

    public function expirationChapter()
    {
        // somehow create a Response object, like by rendering a template
        $response = $this->render('blog/index.html.twig');

        /* Expiration with the Cache-Control Header */

        // sets the number of seconds after which the response
        // should no longer be considered fresh by shared caches
        $response->setPublic();
        $response->setMaxAge(600);

        /* Expiration with the Expires Header */

        $date = new \DateTime();
        $date->modify('+600 seconds');

        $response->setExpires($date);
    }
}