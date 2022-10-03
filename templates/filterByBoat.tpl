<main class="container">

<h2 class="mt-5 mb_3">Want to know experiences by boat?</h2>
<p class="mb_3"> These are our boats, select one:</p>

<ul class="list-group">
    {foreach from=$boats item=$boat}
        <li class="list-group-item"><a href='boats/{$boat->boat_id}'>{$boat->name}</a></li>
    {/foreach}
</ul>

{include file="footer.tpl"}