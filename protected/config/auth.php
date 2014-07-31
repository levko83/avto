<?php

    return array(
        'guest' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Guest',
            'bizRule' => null,
            'data' => null
        ),
        'manager' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'снабженец',
            'children' => array(
                "guest"
            ),
            'bizRule' => null,
            'data' => null
        ),
        'callCenter' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'менеджер CallCenter',
            'children' => array(
                "guest"
            ),
            'bizRule' => null,
            'data' => null
        ),
        'administrator' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'администратор системы',
            'children' => array(
                'callCenter',
                'manager'
            ),
            'bizRule' => null,
            'data' => null
        ),
        'root' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'супер пользователь',
            'children' => array(
                'administrator'
            ),
            'bizRule' => null,
            'data' => null
        ),
    );