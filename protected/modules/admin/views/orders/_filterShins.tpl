{form name="Shins" id= "shinsFormFilter" htmlOptions = ["class" => "form-horizontal products_filter"]}
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
                <div class="span6">{$Shins->textField($shins, "priceMin", ["size" => 7])}</div>
                <div class="span6">{$Shins->textField($shins, "priceMax", ["size" => 7])}</div>
            </div>
            <div class="row-fluid b10">
                <div class="span12">
                    <div id="shinsSlider"></div>
                    <script type="text/javascript">
                        nmsp = {};
                        nmsp.shins_min_price = {$shins->rangePrice->min};
                        nmsp.shins_max_price = {$shins->rangePrice->max};
                    </script>
                </div>
            </div>
            <div class="row-fluid b10">
                <div class="span3 filter_label">Ширина шины:</div>
                <div class="span9">
                    {$Shins->dropDownList($shins, "shins_profile_width", Shins::model()->listFieldNumberValues("shins_profile_width", true))}
                </div>
            </div>
            <div class="row-fluid b10">
                <div class="span3 filter_label">Профиль:</div>
                <div class="span9">
                    {$Shins->dropDownList($shins, "shins_profile_height", Shins::model()->listFieldNumberValues("shins_profile_height", true))}
                </div>
            </div>
            <div class="row-fluid b10">
                <div class="span3 filter_label">Диаметр:</div>
                <div class="span9">
                    {$Shins->dropDownList($shins, "shins_diametr", Shins::model()->listFieldNumberValues("shins_diametr", true))}
                </div>
            </div>
            <div class="row-fluid b10">
                <div class="span3 filter_label">Индекс нагрузки:</div>
                <div class="span9">
                    {$Shins->dropDownList($shins, "shins_load_index", Shins::model()->listFieldStringValues("shins_load_index", true))}
                </div>
            </div>
        </div>
        <div class="block_even">
            <div class="row-fluid">
                <div class="span12 filter_label">Сезонность:</div>
            </div>
            <div class="row-fluid b10">
                <div class="span12">
                    {$Shins->checkBoxList($shins, "shins_season_id", Shins::model()->listVocabValues("shins_season_id"))}
                </div>
            </div>
        </div>
        <div class="block_odd">
            <div class="row-fluid">
                <div class="span3 filter_label">Тип авто:</div>
                <div class="span9">
                    {$Shins->dropDownList($shins, "shins_type_of_avto_id", Shins::model()->listVocabValues("shins_type_of_avto_id", true))}
                </div>
            </div>
        </div>
        <div class="block_even">
            <div class="row-fluid">
                <div class="span12 filter_label ch">
                    {$Shins->checkBox($shins, "shins_run_flat_technology_id", ['value' => 2, 'uncheckValue' => ""])} Run Flat
                </div>
            </div>
        </div>
        <div class="block_odd">
            <div class="row-fluid">
                <div class="span12 filter_label ch">
                    {$Shins->checkBox($shins, "shins_spike_id", ['value' => 2, 'uncheckValue' => ""])} Шипы
                </div>
            </div>
        </div>
        <div class="block_even">
            <div class="row-fluid">
                <div class="span12 filter_label">Бренд:</div>
            </div>
            <div class="row-fluid b10 divScroll">
                <div class="span12">
                    {$Shins->checkBoxList($shins, "vendor_id", Shins::model()->listVocabValues("vendor_id"))}
                </div>
            </div>
        </div>
        <div class="block_odd">
            <div class="row-fluid">
                <div class="span6">
                    {CHtml function="link" text="<i class='icon-repeat'></i> Очистить" url="#" htmlOptions=["class" => "btn blue", "id" => "searchShinsClear"]}
                </div>
                <div class="span6">
                    {CHtml function="link" text="<i class='icon-search'></i> Поиск" url="#" htmlOptions=["class" => "btn blue", "id" => "searchShins"]}
                </div>
            </div>
        </div>
    </div>
{/form}