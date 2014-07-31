{assign var=actions value=ActionsHelper::getActions()}
{if count($actions) > 0}
<div class="discounted-items">
    <h2 class=title>Товары со скидкой</h2>
    <div class="content clearfix">
        {foreach from=$actions item="action"}
            {if $action["type"] == "drive"}
                {assign var=prod_type value="drives"}
            {else}
                {assign var=prod_type value="tires"}
            {/if}
            <div class="view-row first clearfix">
                <div class="image-row">
                    <a href="/{$prod_type}/{$action["id"]}-{$action["translit"]}.html">
                        <img src="{imageResizer product_type=$action["type"] imageName=$action["imageName"] width=90 height=90}" alt=" " title=" " />
                    </a>
                </div>
                <div class=row-title><a href="/{$prod_type}/{$action["id"]}-{$action["translit"]}.html">{$action["display_name"]}</a></div>
                <div class="old-price text-line">{$action["oldPrice"]} грн</div>
                <div class="price text-line">{$action["newPrice"]} грн</div>
            </div>
        {/foreach}
    </div>
</div>
{/if}