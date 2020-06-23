<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use function call_user_func;
use function method_exists;

class Task4Controller extends AbstractController {

  /**
   * @Route("/json/task-4/{method}", name="task4")
   */
  public function index($method) {
    $result = NULL;
    if (method_exists($this, $method)) {
      $result = call_user_func([$this, $method]);
    }
    else {
      $result = "Error";
    }
    return $this->json(['result' => $result]);
  }

  public function existsMethod() {
    return "Success";
  }
}
