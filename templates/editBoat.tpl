{include file="header.tpl"}

<h2 class="mt-5 mb-5">Updating Boat</h2>
<form action="update/boat" method="POST" class="my-4">
    <table class="table table-success table-striped"">
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">name</th>
                <th scope="col">capacity</th>
                <th scope="col">model</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td> <input name="boat_id" type="hidden" value= "{$boat->boat_id}" class="form-control"> </td> 
                    <td> <input name="name" type="text" value= "{$boat->name}" class="form-control"> </td> 
                    <td> <input name="capacity" type="text" value= "{$boat->capacity}" class="form-control"> </td> 
                    <td> <input name="model" type="text" value= "{$boat->model}" class="form-control"> </td> 
                    <td> <button type="submit" class="btn">Update</button> </td>
                </tr>
        </tbody> 
    </table> 
</form>

