<!-- formulario de alta de tarea -->
// el action add es el que lee la tabla de ruteo

<form action="add" method="POST" class="my-4">
    <title>Make your booking</title>
    <div class="row">
        <div class="col-3">
            <div class="form-group">
                <label>DNI</label>
                <input name="dni" type="text" class="form-control">
            </div>
        </div>

        <div class="col-4">
            <div class="form-group">
                <label>Surname</label>
                <input name="surname" type="text" class="form-control">
            </div>
        </div>

        <div class="col-4">
            <div class="form-group">
                <label>email</label>
                <input name="email" type="text" class="form-control">
            </div>
        </div>

        <div class="col-3">
            <div class="form-group">
                <label>Check in</label>
                <input name="checkin" type="date" class="form-control">
            </div>
        </div>

        <div class="col-3">
            <div class="form-group">
                <label>Check out</label>
                <input name="checkout" type="date" class="form-control">
            </div>
        </div>

        <div class="col-3">
            <div class="form-group">
                <label>Select Boat</label>
                <select name="boat_id" class="form-control">
                    <option value="1">Calm (34 ft)</option>
                    <option value="2">Sky (34 ft)</option>
                    <option value="3">Ocean (36 ft)</option>
                    <option value="4">Blue (44 ft)</option>
                    <option value="5">Loneliness (42 ft)</option>
                    <option value="6">Freedom (50 ft)</option>
                </select>
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary mt-2">Submit</button>
</form>