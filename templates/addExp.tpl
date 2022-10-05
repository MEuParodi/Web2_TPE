{include file="header.tpl"}

<h2 class="mt-5 mb-5">Add a new Experience</h2>
<form action="insert/experience" method="GET" class="my-4">
    <table class="table table-success table-striped"">
        <thead>
            <tr>
                <th scope=" col">place</th>
                <th scope="col">days</th>
                <th scope="col">price</th>
                <th scope="col">description</th>
                <th scope="col">boat</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td> <input name="place" type="text" class="form-control"></td>
                <td> <input name="days" type="text" class="form-control"> </td>
                <td> <input name="price" type="text" class="form-control"> </td>
                <td> <input name="description" type="text" class="form-control"> </td>
                <td> <select name="boat_id" class="form-select" aria-label="Default select example">
                        {foreach from=$boats item=$boat}
                        <option value="{$boat->boat_id}">{$boat->name}</option>
                        {/foreach}
                    </select>
                </td>
                <td> <button type="submit" class="btn">Add</button> </td>
            </tr>
        </tbody>
    </table>

</form>