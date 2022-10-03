{include file="header.tpl"}
{* {include file="form_alta.tpl"} *}

<!-- tabla de tareas -->
<h2 class="mt-5 mb-5">List of Our Boats</h2>
<table class="table table-success table-striped"">
    <thead>
        <tr>
            <th scope="col">name</th>
            <th scope="col">capacity</th>
            <th scope="col">model</th>
            <th scope="col">accions</th>
        </tr>
    </thead>

    <tbody>
        {foreach from=$boats item=$boat}
            <tr>
                <td> {$boat->name} </td> 
                <td> {$boat->capacity} </td> 
                <td> {$boat->model} </td> 
                <td> <a href='experiences/{$boat->boat_id}' type='button' class='btn btn-success'>TODO ABM</a> </td>
                
            </tr>
         {/foreach}
    </tbody> 
</table>
  
{include file="footer.tpl"}