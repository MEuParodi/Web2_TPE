{include file="general/header.tpl"}

<h2 class="mt-5 mb-5">List of Our Boats</h2>

{if isset($warning)}
  <div class="alert alert-danger mt-3">
    Warning! {$warning} <br>
      <a href='remove/boat/{$boat_to_delete}' type="button" class='btn btn-sm btn-outline-primary'>Delete</a>
      <a href='boat' type="button" class='btn btn-sm btn-outline-primary'>Cancel</a>
  </div>
{/if} 

<div class="row row-cols-1 row-cols-md-6 g-4">
  {foreach from=$boats item=$boat}
    <div class="col">
      <div class="card">
        <img src="images/{$boat->image}" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-subtitle mb-2 text-muted">{$boat->name}</h5>
          <p> Capacity: {$boat->capacity} </p>
          <p> Model: {$boat->model} </p>
          {if isset($smarty.session.USER_ID)}
            <a href='edit/boat/{$boat->boat_id}' type="button" class='btn btn-sm btn-outline-primary'>Edit</a>
            <a href='delete/boat/{$boat->boat_id}' type="button" class='btn btn-sm btn-outline-primary'>Delete</a>
          {/if}
        </div>
      </div>
    </div>
  {{/foreach}}
</div>



{if isset($smarty.session.USER_ID)}
  <p><br><br><a href='add/boat' type="button" class="btn btn-primary">Add Boat</a> </p>
{/if}