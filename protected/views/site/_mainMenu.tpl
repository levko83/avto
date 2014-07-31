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
                "label" => "Главная",
                "itemOptions" => ["class" => "leaf-0"],
                "url" => ["site/index"]
            ],
            [
                "label" => "Диски",
                "itemOptions" => ["class" => "leaf-1"],
                "url" => ["drives/index"],
                "submenuOptions" => ["class" => "sub-menu-0"],
                "items" => $this->disksSubMenu
            ],
            [
                "label" => "Шины",
                "itemOptions" => ["class" => "leaf-2"],
                "url" => ["tires/index"],
                "submenuOptions" => ["class" => "sub-menu-0"],
                "items" => $this->shinsSubMenu
            ],
            [
                "label" => "О Компании",
                "itemOptions" => ["class" => "leaf-3"],
                "url" => ["site/about"]
            ],
            [
                "label" => "Контакты",
                "itemOptions" => ["class" => "leaf-4"],
                "url" => ["site/contacts"]
            ],
            [
                "label" => "Оплата и Доставка",
                "itemOptions" => ["class" => "leaf-5"],
                "url" => ["site/delivery"]
            ],
            [
                "label" => "Новости",
                "itemOptions" => ["class" => "leaf-6"],
                "url" => "#"
            ]
        ]
}
