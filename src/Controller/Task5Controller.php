<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class Task5Controller extends AbstractController {

  use RenderTableTrait;

  /**
   * @Route("/json/task-5/product", name="task5_product")
   */
  public function product() {
    /** @var $connection \Doctrine\DBAL\Connection */
    $connection = $this->getDoctrine()->getConnection();
    $sql = "SELECT * FROM product ORDER BY id ";
    $query = $connection->prepare($sql);
    $query->execute();
    $result = $query->fetchAll();
    $header = [
      'id' => 'ID',
      'name' => 'Name',
      'price' => 'Price',
      'manufacturer_id' => 'Manufacturer ID',
    ];
    //    $entityManager->get
    return $this->json(['table' => $this->renderTable($header, $result)]);
  }

  /**
   * @Route("/json/task-5/manufacturer", name="task5_manufacturer")
   */
  public function manufacturer() {
    /** @var $connection \Doctrine\DBAL\Connection */
    $connection = $this->getDoctrine()->getConnection();
    $sql = "SELECT * FROM manufacturer ORDER BY id ";
    $query = $connection->prepare($sql);
    $query->execute();
    $result = $query->fetchAll();
    $header = ['id' => 'ID', 'name' => 'Name'];
    //    $entityManager->get
    return $this->json(['table' => $this->renderTable($header, $result)]);
  }


}
