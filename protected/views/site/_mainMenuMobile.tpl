{widget name="zii.widgets.CMenu"
        encodeLabel=false
        activateParents=false
        activeCssClass="active"
        firstItemCssClass="first"
        itemCssClass="leaf"
        lastItemCssClass="last"
        htmlOptions=["class" => "menu clearfix"]
        items=[
            [
                "label" => "Шины",
                "itemOptions" =>["class" => "leaf-0"],
                "url" => ["tires/index"],
                "submenuOptions" => ["class" => "sub-menu-0"],
                "items" => $this->shinsSubMenu
            ],
            [
                "label" => "Диски",
                "itemOptions" => ["class" => "leaf-1"],
                "url" => ["drives/index"],
                "submenuOptions" => ["class" => "sub-menu-0"],
                "items" => $this->disksSubMenu
            ],
            [
                "label" => "Меню",
                "itemOptions" => ["class" => "leaf-2"],
                "url" => ["drives/index"],
                "submenuOptions" => ["class" => "menu-second clearfix"],
                "items" => [
                    [
                        "label" => "Главная",
                        "url" => ["site/index"]
                    ],
                    [
                        "label" => "О Компании",
                        "url" => ["site/about"]
                    ],
                    [
                        "label" => "Контакты",
                        "url" => ["site/contacts"]
                    ],
                    [
                        "label" => "Оплата и Доставка",
                        "url" => "#"
                    ],
                    [
                        "label" => "Новости",
                        "url" => "#"
                    ]
                ]
            ]
        ]
}
