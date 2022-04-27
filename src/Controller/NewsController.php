<?php

namespace App\Controller;

class NewsController
{

    public function latest($maxPerPage) // Compléter l'action
    {
        // ....
        $response->setPublic();
        $response->setMaxAge(60);

        return $response;
    }
}