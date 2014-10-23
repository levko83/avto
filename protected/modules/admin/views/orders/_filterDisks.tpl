{form name="Disks" id= "disksFormFilter" htmlOptions = ["class" => "form-horizontal products_filter"]}
    <div class="form-wizard">
        <div class="block_odd">
            <div class="row-fluid">
                <div class="span12 filter_label">Цена:</div>
            </div>
            <div class="row-fluid">
                <div class="span6">от:</div>
                <div class="span6">до:</div>
            </div>
            <div class="row-fluid b10">
                <div class="span6">{$Disks->textField($disks, "priceMin", ["size" => 7])}</div>
                <div class="span6">{$Disks->textField($disks, "priceMax", ["size" => 7])}</div>
            </div>
            <div class="row-fluid b10">
                <div class="span12">
                    <div id="disksSlider"></div>
                    <script type="text/javascript">
                        nmsp = {};
                        nmsp.disks_min_price = {$disks->rangePrice->min};
                        nmsp.disks_max_price = {$disks->rangePrice->max};
                    </script>
                </div>
            </div>
            <div class="row-fluid b10">
                <div class="span3 filter_label">Диаметр:</div>
                <div class="span9">
                    {$Disks->dropDownList($disks, "disks_rim_diametr", Disks::model()->listFieldNumberValues("disks_rim_diametr", true))}
                </div>
            </div>
            <div class="row-fluid b10">
                <div class="span3 filter_label">Тип:</div>
                <div class="span9">
                    {$Disks->dropDownList($disks, "disks_type_id", Disks::model()->listVocabValues("disks_type_id", true))}
                </div>
            </div>
            <div class="row-fluid b10">
                <div class="span3 filter_label">Ширина диска:</div>
                <div class="span9">
                    {$Disks->dropDownList($disks, "disks_rim_width", Disks::model()->listFieldNumberValues("disks_rim_width", true))}
                </div>
            </div>
            <div class="row-fluid b10">
                <div class="span3 filter_label">PCD:</div>
                <div class="span9">
                    {$Disks->dropDownList($disks, "disks_port_position", Disks::model()->listFieldNumberValues("disks_port_position", true))}
                </div>
            </div>
            <div class="row-fluid b10">
                <div class="span3 filter_label">ET:</div>
                <div class="span9">
                    {$Disks->dropDownList($disks, "disks_boom", Disks::model()->listFieldNumberValues("disks_boom", true))}
                </div>
            </div>
            <div class="row-fluid b10">
                <div class="span3 filter_label">HUB:</div>
                <div class="span9">
                    {$Disks->dropDownList($disks, "disks_fixture_port_diametr", Disks::model()->listFieldNumberValues("disks_fixture_port_diametr", true))}
                </div>
            </div>
        </div>
        <div class="block_even">
            <div class="row-fluid">
                <div class="span12 filter_label">Цвет:</div>
            </div>
            <div class="row-fluid b10 divScroll">
                <div class="span12">
                    {$Disks->checkBoxList($disks, "disks_color", Disks::model()->listFieldStringValues("disks_color"))}
                </div>
            </div>
        </div>
        <div class="block_odd">
            <div class="row-fluid">
                <div class="span12 filter_label">Бренд:</div>
            </div>
            <div class="row-fluid b10 divScroll">
                <div class="span12">
                    {$Disks->checkBoxList($disks, "vendor_id", Disks::model()->listVocabValues("vendor_id"))}
                </div>
            </div>
        </div>
        <div class="block_even">
            <div class="row-fluid">
                <div class="span6">
                    {CHtml function="link" text="<i class='icon-repeat'></i> Очистить" url="#" htmlOptions=["class" => "btn blue", "id" => "searchDisksClear"]}
                </div>
                <div class="span6">
                    {CHtml function="link" text="<i class='icon-search'></i> Поиск" url="#" htmlOptions=["class" => "btn blue", "id" => "searchDisks"]}
                </div>
            </div>
        </div>
    </div>
{/form}