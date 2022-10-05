{include file="header.tpl"}

<h2 class="mt-5 mb-5">List of Experiences</h2>
<table class="table table-success table-striped"">
    <thead>
        <tr>
            <th scope="col">place</th>
            <th scope="col">days</th>
            <th scope="col">price</th>
            <th scope="col">description</th>
            <th scope="col">boat</th>
            <th scope="col">accions</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>

    <tbody>
        {foreach from=$exps item=$exp}
            <tr>
                <td> {$exp->place} </td> 
                <td> {$exp->days} </td> 
                <td> {$exp->price} </td> 
                <td> {$exp->description|truncate:60} </td> 
                <td> {$exp->boat_id} </td>
                <td> <a href='experience/{$exp->exp_id}' type='button' class='btn btn-success'>Show details</a> </td>
                <td> <a href='update/experience/{$exp->exp_id}' type="button" class='btn btn-outline-primary'>Update</a> </td>
                <td> <a href='delete/experience/{$exp->exp_id}' type="button" class='btn btn-outline-primary'>Delete</a> </td>
            </tr>
         {/foreach}
    </tbody> 
</table>

<p><a href='add/experience' type="button" class="btn btn-outline-primary">Add experience</a> </p>

