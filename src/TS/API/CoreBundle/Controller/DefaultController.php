<?php

namespace TS\API\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations,
    FOS\RestBundle\Controller\FOSRestController,
    FOS\RestBundle\Request\ParamFetcherInterface,
    FOS\RestBundle\View\View,
    FOS\RestBundle\View\RouteRedirectView,
    FOS\RestBundle\Util\Codes;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends FOSRestController
{
    /**
     * @Annotations\Post("/test")
     *
     * @ApiDoc(
     *   section = "WS",
     *   resource = true,
     *     statusCodes = {
     *         201 = "Created",
     *         400 = "Bad Request: Errores en input",
     *         405 = "Method Not Allowed"
     *     }
     * )
     *
     * @Annotations\View(
     *     statusCode = Codes::HTTP_BAD_REQUEST,
     *     templateVar = "form"
     * )
     */
    public function getDemosAction()
    {
        $data = array("hello" => "world");
        $view = $this->view($data);
        return $this->handleView($view);
    }
}
