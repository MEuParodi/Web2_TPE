{include file="header.tpl"}

<h2 class="mt-5 mb-5">List of Our Boats</h2>
<table class="table table-success table-striped"">
    <thead>
        <tr>
            <th scope="col">name</th>
            <th scope="col">capacity</th>
            <th scope="col">model</th>
            <th scope="col">accions</th>
            <th scope="col"></th>
        </tr>
    </thead>

    <tbody>
        {foreach from=$boats item=$boat}
            <tr>
                <td> {$boat->name} </td> 
                <td> {$boat->capacity} </td> 
                <td> {$boat->model} </td> 
                <td> <a href='edit/boat/{$boat->boat_id}' type="button" class='btn btn-outline-primary'>Update</a> </td>
                <td> <a href='delete/boat/{$boat->boat_id}' type="button" class='btn btn-outline-primary'>Delete</a> </td>
            </tr>
         {/foreach}
    </tbody> 
</table>

<p><a href='add/boat' type="button" class="btn btn-outline-primary">Add Boat</a> </p>

{include file="footer.tpl"}