<div class="breadcrumbs">
    {foreach $this->breadcrumbs as $breadcrumb}
        <div itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
            {if !$breadcrumb@last}<a itemprop="url" href="{$breadcrumb["url"]}"> <span itemprop="title">{$breadcrumb["title"]}</span></a>{else}{$breadcrumb["title"]}{/if}{if !$breadcrumb@last} >{/if}
        </div>
    {/foreach}
</div>