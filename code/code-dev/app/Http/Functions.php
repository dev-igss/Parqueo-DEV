<?php
    function getUnitsArray(){
        $a = [
            '0' => 'Unidad Hospitalaria',
            '1' => 'Unidad Departamental'
        ];

        return $a;
    }

    function getRoleUserArray($mode, $id){
        $roles = [
            '0' => 'Administrador del Sistema',
            '1' => 'Administrador de Unidad',
            '2' => 'Jefe de Servicio'
        ];
 
        if(!is_null($mode)):
            return $roles;
        else:
            return $roles[$id];
        endif;
    }

    function getDietStatusArray($mode, $id){
        $roles = [
            '0' => 'Pre-Solicitud',
            '1' => 'Registrada',
            '2' => 'Servida',
            '3' => 'Anulada'
        ];

        if(!is_null($mode)):
            return $roles;
        else:
            return $roles[$id];
        endif;
    }

    function getUserStatusArray($mode, $id){
        $status = [
            '0' => 'Suspendido',
            '1' => 'Activo'
        ];

        if(!is_null($mode)):
            return $status;
        else:
            return $status[$id];
        endif;
    }

    //Key Value From JSON
    function kvfj($json, $key){
        if($json == null):
            return null;
        else:
            $json = $json;
            $json = json_decode($json, true);

            if(array_key_exists($key, $json)):
                return $json[$key];
            else:
                return null;
            endif;
        endif;
    }

    function user_permissions(){
        $p = [
            'dashboard' => [
                'icon' => '<i class="fas fa-tachometer-alt"></i>',
                'title' => 'Módulo de Dashboard',
                'keys' => [
                    'dashboard' => 'Puede ver el dashboard.',
                    'dashboard_small_stats' => 'Puede ver las estadísticas rápidas.'
                ]
            ],
            'parks' => [
                'icon' => '<i class="fa-solid fa-square-parking"></i> ',
                'title' => 'Módulo de Parqueo',
                'keys' => [
                    'park_list' => 'Puede ver el listado de parqueos.',
                    'park_add' => 'Puede agregar nuevos parqueos.',
                    'park_edit' => 'Puede editar parqueos.',
                    'park_banned' => 'Puede suspender parqueos.',
                    'park_delete' => 'Puede eliminar parqueos.'

                ]
            ],
            'users' => [
                'icon' => '<i class="fas fa-user-lock"></i> ',
                'title' => 'Módulo de Usuarios',
                'keys' => [
                    'user_list' => 'Puede ver el listado de usuarios.',
                    'user_add' => 'Puede agregar nuevos usuarios.',
                    'user_edit' => 'Puede editar usuarios.',
                    'user_banned' => 'Puede suspender usuarios.',
                    'user_delete' => 'Puede eliminar usuarios.',
                    'user_reset_password' => 'Puede restablecer contraseña de usuarios.',
                    'user_info' => 'Puede ver información de su cuenta',
                    'user_change_password' => 'Puede cambiar su contraseña de inicio de sesión'

                ]
            ]

        ];

        return $p;
    }

    function getUserYears(){
        $ya = date('Y');
        $ym = $ya - 18;
        $yo = $ym - 62;

        return [$ym, $yo];
    }

    function getMonths($mode, $key){
        $m = [
            '01' => 'Enero',
            '02' => 'Febrero',
            '03' => 'Marzo',
            '04' => 'Abril',
            '05' => 'Mayo',
            '06' => 'Junio',
            '07' => 'Julio',
            '08' => 'Agosto',
            '09' => 'Septiembre',
            '10' => 'Octubre',
            '11' => 'Noviembre',
            '12' => 'Diciembre'
        ];

        if($mode == "list"){
            return $m;
        }else{
            return $m[$key];
        }
    }

?>
