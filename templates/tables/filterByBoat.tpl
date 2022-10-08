<main class="container">

<h3 class="mt-5 mb_3">Want to know experiences by boat?</h3>

<ul class="list-group">
    {foreach from=$boats item=$boat}
        <li class="list-group-item"><a href='experience/boats/{$boat->boat_id}'>{$boat->name}</a></li>
    {/foreach}
    <li class="list-group-item"><a href='experience'>View all experiences</a></li>

</ul>

