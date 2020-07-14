<?php

namespace app\clases;

/**
 * Description of ListaPersona
 *
 * @author yo
 */
class ListaPersona {
    //put your code here
    
    private static $lista=[
        ['correo'=>'a@gm.com',
            'apellido'=>'telmo',
            'estudiante'=>'n'],
           ['correo'=>'B@gm.com',
            'apellido'=>'sepulveda',
            'estudiante'=>'n'],
           ['correo'=>'m@gm.com',
            'apellido'=>'telmito',
            'estudiante'=>'s']
    ];
    
    static public function obtenerListaPersonas():array
    {
        return self::$lista;
    }
}
