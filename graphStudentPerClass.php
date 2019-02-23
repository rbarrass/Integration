<?php
      require('src/jpgraph.php');
      require('src/jpgraph_pie.php');
      require('functions/connectDatabase.php');
      $dbconn = connectionDB();
      $tabclass = array();
      $tabnbeleve = array();
      $sql = "SELECT COUNT(*) AS count, branchcl FROM users INNER JOIN classrooms ON users.idcl=classrooms.idcl GROUP BY classrooms.branchcl";
      $req = pg_query($sql) or die('Error : '.pg_last_error());
      while ($line=pg_fetch_array($req, null, PGSQL_ASSOC)) {
          $tabclass[] = $line['branchcl'];
          $tabnbeleve[] = $line['count'];
      }
      $graph = new PieGraph(400, 300);
      $graph->title->Set("Volume d'élève par classe");
      $oPie = new PiePlot($tabnbeleve);
      $oPie->SetLegends($tabclass);
      $oPie->SetCenter(0.4);
      $oPie->SetValueType(PIE_VALUE_ABS);
      $oPie->value->SetFormat("%d");
      $graph->Add($oPie);
      $graph->Stroke();

    
    ?>