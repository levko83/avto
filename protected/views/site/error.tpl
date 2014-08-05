{if $error["code"] > 0}
    <h2>Ошибка {$error["code"]}</h2>
{/if}
<div class="error">
    {if substr($smarty.server.HTTP_HOST, -4) == ".loc"}
        <strong>Message:</strong> {$error["message"]}<br>
        <strong>file:</strong> {$error["file"]} [ line: {$error["line"]} ]<br>
        {foreach $error["traces"] as $trace}
            <div>
                <strong>file:</strong> {$trace["file"]} [ line: {$trace["line"]} ]
            </div>
        {/foreach}
    {else}
        {$error["message"]}
    {/if}
</div>
