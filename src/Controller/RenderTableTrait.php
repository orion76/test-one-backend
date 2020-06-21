<?php


namespace App\Controller;


use function array_keys;
use function join;

trait RenderTableTrait {

  private function renderTable($header, $rows) {
    $table = ['<table>'];

    $table[] = '<thead>';
    $table[] = $this->renderTableRow($header, $header, 'th');
    $table[] = '</thead>';

    $table[] = '<tbody>';
    foreach ($rows as $cells) {
      $table[] = $this->renderTableRow($header, $cells);
    }
    $table[] = '</tbody>';
    $table[] = '</table>';

    return join('', $table);
  }

  private function renderTableRow($header, $cells, $td = 'td') {
    $row = ["<tr>"];
    foreach (array_keys($header) as $field) {
      $row[] = "<{$td}>{$cells[$field]}</{$td}>";
    }
    $row[] = "</tr>";
    return join('', $row);
  }

}
