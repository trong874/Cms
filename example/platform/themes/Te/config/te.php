<?php
use BytePlatform\Facades\Shortcode;
use BytePlatform\Item;

return [
    'name' => 'Te',
    'commands' => [],
    'fields' => [],
    'shortcodes' => [
        Shortcode::Create('test')
        ->Parameters([
            Item::Add('column')->Title('Column')->Column(Item::Col3)->Type('select')->DataOption(function () {
                return Item::getColumnValue();
            }),
            Item::Add('limit')->Title('Limit')->Column(Item::Col12)->Type('input')
        ])
    ],
    'actions' => [],
    'widgets' => [],
];
