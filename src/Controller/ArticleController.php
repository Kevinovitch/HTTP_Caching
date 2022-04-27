<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ArticleController extends AbstractController
{
    // Entité Article à faire
    public function show($articleSlug, Request $request)
    {
        // Get the minimum information to compute
        // the ETag or the Last-Modified value
        // (based on the Request, data is retrieved from
        // a database or a key-value store for instance)
       //$article = ...;
         $article ='balbel';

        // create a Response with an ETag and/or a Last-Modified Header
        $response = new Response();
        $response->setEtag($article->computeETag());
        $response->setLastModified(($article->getPublishedAt()));

        // Set response as public. Otherwise it will be private by default.
        $response->setPublic();

        // Check that the Response is not modified for the given Request
        if ($response->isNotModified($request)) {
            // return the 304 Response immediately
            return $response;
        }

        // do more work here - like retrieving more data
        $comments = ...;

        // or render a template with the $response you've already started
        /* Template à faire */

        return $this->render('article/show.html.twig', [
            'article' => $article,
            'comments' => $comments
        ], $response);
    }

}
