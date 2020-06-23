<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use function is_array;

class Task7Controller extends AbstractController {

  use RenderTableTrait;

  /**
   * @Route("/json/task-7", name="task7")
   */
  public function index(Request $request) {
    $files = $request->files->get('files');
    $content = [];
    foreach ($files as $file) {
      $content["file:".$file->getClientOriginalName()] = json_decode(file_get_contents($file->getPathname()), TRUE);
    }
    $result = $this->renderList($content);
    return $this->json(['result' => $result]);
  }

  function renderList($list) {
    $output = ['<ul>'];
    foreach ($list as $field => $value) {
      $output[] = '<li>';

      $output[] = "{$field}:";

      if (is_array($value)) {
        $output[] = $this->renderList($value);
      }
      else {
        $output[] = $value;
      }
      $output[] = '</li>';
    }
    $output[] = '</ul>';
    return join('', $output);
  }
}
