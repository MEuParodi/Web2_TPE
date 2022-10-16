{include file="general/header.tpl"}

<h2 class="mt-5 mb-5">List of Our Boats</h2>

{if isset($error)}
  <div class="alert alert-danger mt-3">
    Error: {$error} <br>
  </div>
{/if} 

<a href="{$location}">Volver</a>