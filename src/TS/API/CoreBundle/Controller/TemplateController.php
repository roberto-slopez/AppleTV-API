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


class TemplateController extends FOSRestController
{
    /**
     * @Annotations\Get("/template/{type}")
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
    public function indexAction($type)
    {
        /*$em = $this->getDoctrine()->getManager();
        $data = $em->getRepository('TSAPICoreBundle:Client')->findAll();*/
        $sql = " 
            SELECT `uc_products`.`nid` as code,`node_field_data`.`title`,
            `uc_products`.`model` as SKU,`file_managed`.`filename` as filename
             FROM `uc_products` inner join `node` 
            on `uc_products`.`vid`= `node`.`vid` and `uc_products`.`nid`= `node`.`nid`
            inner join `node__uc_product_image` 
            on `node__uc_product_image`.`entity_id` = `node`.`nid`
            inner join `file_managed`
            on `node__uc_product_image`.`uc_product_image_target_id` = `file_managed`.`fid`
            inner join `node_field_data`
            on `node_field_data`.`nid` = `node`.`nid`
        ";

        $conn = $this->get('doctrine.dbal.apitv_connection');
        //{
        //  "code": "23",
        //  "title": "La camioneta",
        //  "SKU": "123456",
        //  "filename": "1.png"
        //}
        $some_array = $conn->fetchAll($sql);
        $view = $this->view($some_array);
        return $this->handleView($view);
    }
}
