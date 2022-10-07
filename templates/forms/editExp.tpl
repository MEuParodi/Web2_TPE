{include file="general/header.tpl"}

<h2 class="mt-5 mb-5">Updating Experience</h2>
<form action="update/experience" method="POST" class="my-4">
    <table class="table table-success table-striped"">
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">place</th>
                <th scope="col">days</th>
                <th scope="col">price</th>
                <th scope="col">description</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td> <input name="exp_id" type="hidden" value= "{$exp->exp_id}" class="form-control"> </td> 
                    <td> <input name="place" type="text" value= "{$exp->place}" class="form-control"> </td> 
                    <td> <input name="days" type="text" value= "{$exp->days}" class="form-control"> </td> 
                    <td> <input name="price" type="text" value= "{$exp->price}" class="form-control"> </td> 
                    <td> <input name="description" type="text" value= "{$exp->description}" class="form-control"> </td> 
                    <td> <select name="boat_id" class="form-select" aria-label="Default select example">
                                {foreach from = $boats item = $boat}
                                    <option value="{$boat->boat_id}">{$boat->name}</option>
                                {/foreach}
                         </select>
                    <td> <button type="submit" class="btn">Update</button> </td>
                </tr>
        </tbody> 
    </table> 
</form>
