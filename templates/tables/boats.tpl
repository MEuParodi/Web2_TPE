{include file="general/header.tpl"}

<h2 class="mt-5 mb-5">List of Our Boats</h2>
<table class="table table-success table-striped"">
    <thead>
        <tr>
            <th scope="col">name</th>
            <th scope="col">capacity</th>
            <th scope="col">model</th>
            {if isset($smarty.session.USER_ID)}
                <th scope="col">accions</th>
                <th scope="col"></th>
            {/if}
        </tr>
    </thead>

    <tbody>
        {foreach from=$boats item=$boat}
            <tr>
                <td> {$boat->name} </td> 
                <td> {$boat->capacity} </td> 
                <td> {$boat->model} </td> 
                {if isset($smarty.session.USER_ID)}
                    <td> <a href='edit/boat/{$boat->boat_id}' type="button" class='btn btn-outline-primary'>Edit</a> </td>
                    <td> <a href='delete/boat/{$boat->boat_id}' type="button" class='btn btn-outline-primary'>Delete</a> </td>
                {/if}

            </tr>
         {/foreach}
    </tbody> 
</table>
{if isset($smarty.session.USER_ID)}
    <p><a href='add/boat' type="button" class="btn btn-outline-primary">Add Boat</a> </p>
{/if}
