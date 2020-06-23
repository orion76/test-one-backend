<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class Task6Controller extends AbstractController {

  use RenderTableTrait;

  /**
   * @Route("/json/task-6", name="task6")
   */
  public function index() {
    /** @var $connection \Doctrine\DBAL\Connection */
    $connection = $this->getDoctrine()->getConnection();
    $sql = "SELECT product.id AS id, product.name AS name, product.price AS price, manufacturer.name AS manufacturer ";
    $sql .= "FROM product ";
    $sql .= "INNER JOIN manufacturer ON manufacturer.id = product.manufacturer_id ";
    $sql .= "ORDER BY id ";


    $query = $connection->prepare($sql);
    $query->execute();

    $result = $query->fetchAll();
    $header = [
      'id' => 'ID',
      'name' => 'Name',
      'price' => 'Price',
      'manufacturer' => 'Manufacturer',
    ];
    //    $entityManager->get
    return $this->json(['table' => $this->renderTable($header, $result)]);
  }
}
