<table class="table table-striped table-hover" id="example">
    <thead>
        <tr>
            <th>
                <span class="custom-checkbox">
                    <input type="checkbox" id="selectAll">
                    <label for="selectAll"></label>
                </span>
            </th>
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($userr as $varobj)
            <tr>
                <td>
                    <span class="custom-checkbox">
                        <input type="checkbox" id="checkbox1" name="options[]" value="1">
                        <label for="checkbox1"></label>
                    </span>
                </td>
                <td>{{ $varobj['name'] }}</td>
                <td>{{ $varobj['email'] }}</td>
                <td>{{ $varobj['address'] }}</td>
                <td>{{ $varobj['phone'] }}</td>
                <td>
                    <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons"
                            data-toggle="tooltip" title="Edit"
                            id="a{{ $varobj['id'] }}">&#xE254;</i></a>
                    <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i
                            class="material-icons" data-toggle="tooltip" title="Delete"
                            id="b{{ $varobj['id'] }}">&#xE872;</i></a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
