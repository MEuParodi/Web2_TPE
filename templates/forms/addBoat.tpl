{include file="general/header.tpl"}

<h2 class="mt-5 mb-5">Add a new Boat</h2>
<form action="insert/boat" method="POST" class="my-4">
    <table class="table table-success table-striped"">
        <thead>
            <tr>
                <th scope=" col">name</th>
        <th scope="col">capacity</th>
        <th scope="col">model</th>
        <th scope="col">image</th>
        <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td> <input name="name" type="text" class="form-control"> </td>
                <td> <input name="capacity" type="text" class="form-control"> </td>
                <td> <input name="model" type="text" class="form-control"> </td>
                <td> <select name="image" class="form-select" aria-label="Default select example">
                        <option value="boat1.jpg">image1</option>
                        <option value="boat2.jpg">image2</option>
                        <option value="boat3.jpg">image3</option>
                        <option value="boat4.jpg">image4</option>
                        <option value="boat5.jpg">image5</option>
                    </select>
                </td>
                <td> <button type="submit" class="btn">Add</button> </td>
            </tr>
        </tbody>
    </table>
</form>