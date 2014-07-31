<section id="center">
    {if $this->breadcrumbs}
        {include file="application.views.site._breadcrumbs"}
    {/if}
    <div id="squeeze">
        <article class="node">
          {$model->text}
        </article>
    </div>
</section>