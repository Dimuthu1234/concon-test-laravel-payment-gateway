<?php
function resourceNames($name)
{
    return [
        'names' => [
            'store'     => $name . '.store',
            'index'     => $name . '.index',
            'create'    => $name . '.create',
            'update'    => $name . '.update',
            'show'      => $name . '.show',
            'destroy'   => $name . '.destroy',
            'edit'      => $name . '.edit'
        ]
    ];
}
