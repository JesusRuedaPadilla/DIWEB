public static function obtieneProductosPaginados(int $pagina, int $filas):array
    {
        $registros = array();
        $res = self::$con->query("select * from tech.productos");
        $registros =$res->fetchAll();
        $total = count($registros);
        $paginas = ceil($total /$filas);
        $registros = array();
        if ($pagina <= $paginas)
        {
            $inicio = ($pagina-1) * $filas;
            $res= self::$con->query("select * from tech.productos limit $inicio, $filas");
            $registros = $res->fetchAll(PDO::FETCH_ASSOC);
        }
        return $registros;
    }




paginado.php

=========================================
<?php
require_once("GBD.php");
DB::conecta();
$lista = DB::obtieneProductosPaginados($_GET['p'],$_GET['t']);
for ($i=0;$i<count($lista);$i++)
{
    echo $lista[$i]['nobre']. "<br>";
}

?>