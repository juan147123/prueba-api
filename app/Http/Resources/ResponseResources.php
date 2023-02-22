<?php

namespace App\Http\Resources;

use App\Http\Utils\Message;

final class ResponseResources
{
    public static function Response($request, $config, $custom = [])
    {
        try {
            $tipo = $config->tipo;
            switch ($tipo) {
                case 0:
                    if ($request) {
                        $data = array("message" => Message::EXITO_REGISTRO, "error" => false);
                    } else {

                        $data = array("message" => Message::ERROR_REGISTRO, "error" => false);
                    }
                    break;
                case 1:
                    if ($request == 1) {
                        $data = array("id" => $config->id, "message" => Message::EXITO_ACTUALIZAR);
                    } else {

                        $data = array("id" => -1, "message" => Message::ERROR_ACTUALIZAR);
                    }
                    break;
                case 2:
                    if ($request == 1) {
                        $data = array("id" => $config->id, "message" => Message::EXITO_ELIMINAR);
                    } else {

                        $data = array("id" => -1, "message" => Message::ERROR_ELIMINAR);
                    }
                    break;
                case 3:
                    if ($request == 1) {
                        $data = array("id" => $config->id, "message" => Message::EXITO_ELIMINAR);
                    } else {

                        $data = array("id" => -1, "message" => Message::ERROR_ELIMINAR);
                    }
                    break;
                case 4:
                    if ($request) {
                        $data = array("data" => $request);
                    } else {

                        $data = array("id" => $config->id, "message" => Message::ERROR_BUSQUEDA);
                    }
                    break;
                case 5:
                    $data = $custom;
                    break;
                default:
                    $data = array("message" => Message::ERROR_BUSQUEDA, "error" => true);
            }
        } catch (\Throwable $th) {
            return $th;
        }
        return json_encode(
            $data
        );
    }
}
