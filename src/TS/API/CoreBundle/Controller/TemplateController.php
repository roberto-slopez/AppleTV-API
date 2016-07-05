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

/**
 * Class TemplateController
 * @package TS\API\CoreBundle\Controller
 */
class TemplateController extends FOSRestController
{
    /**
     * @Annotations\Get("/template/movie/list")
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
    public function listAction()
    {
        $sql = $this->getParameter('query_raw_list');

        $conn = $this->get('doctrine.dbal.apitv_connection');
        $some_array = $conn->fetchAll($sql);
        $view = $this->view($some_array);

        return $this->handleView($view);
    }

    /**
     * @Annotations\Get("/template/movie/detail/{movie}")
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
    public function detailAction($movie)
    {
        $sql = sprintf($this->getParameter('query_datail_movie'), $movie );

        $conn = $this->get('doctrine.dbal.apitv_connection');
        $some_array = $conn->fetchAll($sql);
        $view = $this->view($some_array);

        return $this->handleView($view);
    }
}
