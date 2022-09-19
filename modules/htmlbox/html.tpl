{if $htmlbox_ssl==1}
    {if $is_https_htmlbox==1}
        {if $page_name!='index'}
            {if $htmlbox_home==1}
                {* disable *}
            {else}
<div>{$htmlboxbody|unescape:"htmlall"}</div>
            {/if}
        {else}
<span>{$htmlboxbody}</span>
        {/if}
    {/if}
{else}
    {if $page_name!='index'}
        {if $htmlbox_home==1}
                {* disable *}
        {else}
<div class="sslonhtml">{$htmlboxbody|replace:"\&quot;&lt;":"&lt;"}</div>
        {/if}
     {else}
        {$htmlboxbody}
     {/if}
{/if}