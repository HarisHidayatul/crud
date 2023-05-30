{{-- @dd($userr) --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap CRUD Data Table for Database with Modal Form</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<body>
    {{-- {{ $userr[1]['Name']}} --}}
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Manage <b>Employees</b></h2>
                    </div>
                    <div class="col-sm-6">
                        <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i
                                class="material-icons">&#xE147;</i> <span>Add New Employee</span></a>
                        <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i
                                class="material-icons">&#xE15C;</i> <span>Delete</span></a>
                    </div>
                </div>
            </div>
            {{-- @include('table') --}}
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
                <tbody></tbody>
            </table>


            <div class="clearfix">
                <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                <ul class="pagination">
                    <li class="page-item disabled"><a href="#">Previous</a></li>
                    <li class="page-item"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item active"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                    <li class="page-item"><a href="#" class="page-link">Next</a></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Add Modal HTML -->
    <div id="addEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="formsubmit">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Employee</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea name="address" id="address" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" name="phone" id="phone" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-success" value="Add">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Edit Modal HTML -->
    <div id="editEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="formedit">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Employee</h4>
                        <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" id="nameEdit" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" id="emailEdit" required>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea class="form-control" id="addressEdit" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" class="form-control" id="phoneEdit" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="button" class="btn btn-info" value="Save" onclick="submitedit()">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Delete Modal HTML -->
    <div id="deleteEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Employee</h4>
                        <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete these Records?</p>
                        <p class="text-warning"><small>This action cannot be undone.</small></p>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-danger" value="Delete">
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- <script type="text/javascript" src="script.js"></script> --}}
    <script>
        var valIdDel = "";
        var valIdEdt = "";
        var data = [];

        const containEdit = document.getElementById("editEmployeeModal");
        const modalEdit = new bootstrap.Modal(containEdit);

        function submitedit() {
            let name = $('#nameEdit').val();
            let email = $('#emailEdit').val();
            let address = $('#addressEdit').val();
            let phone = $('#phoneEdit').val();
            let id = data[valIdEdt].id - 1;
            $.ajax({
                url: 'edit/' + id,
                type: "get",
                data: {
                    name: name,
                    email: email,
                    address: address,
                    phone: phone,
                },
                success: function(response) {
                    alert(id)
                    // alert('Success'+response);
                    // console.log(response);
                    if (response) {
                        // $('#formedit').modal('hide'); //tutup form
                        // refreshTable()
                        modalEdit.hide();
                        alert(id)
                    }
                },
                error: function(response) {
                    console.log(e);
                    console.log(response);
                }
            })
        };

        function refreshTable() {
            $('table table-striped table-hover').fadeOut();
            $('table table-striped table-hover').load('', function() {
                $('table table-striped table-hover').fadeIn();
            });
        }
        $(document).ready(function() {
            // Activate tooltip
            $('[data-toggle="tooltip"]').tooltip();


            var elementTable = document.getElementById("demo");
            @foreach ($userr as $varobj)
                data.push({
                    id: '{{ $varobj['id'] }}',
                    name: '{{ $varobj['name'] }}',
                    email: '{{ $varobj['email'] }}',
                    address: '{{ $varobj['address'] }}',
                    phone: '{{ $varobj['phone'] }}',

                });
            @endforeach
            var order_data = '';
            var index = 1;
            $.each(data, function(key, value) {
                order_data += '<tr>';
                order_data +=
                    '<td><span class="custom-checkbox"><input type="checkbox" id="checkbox1" name="options[]" value="1"><label for="checkbox1"></label></span></td>';
                order_data += '<td>' + value.name + '</td>';
                order_data += '<td>' + value.email + '</td>';
                order_data += '<td>' + value.address + '</td>';
                order_data += '<td>' + value.phone + '</td>';
                order_data +=
                    '<td><a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit" id="a' +
                    index +
                    '">&#xE254;</i></a><a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete" id="b' +
                    index + '">&#xE872;</i></a></td>';
                index = index + 1;
            })
            $('#example>tbody').append(order_data);
            // Select/Deselect checkboxes
            var checkbox = $('table tbody input[type="checkbox"]');
            $("#selectAll").click(function() {
                if (this.checked) {
                    checkbox.each(function() {
                        this.checked = true;
                    });
                } else {
                    checkbox.each(function() {
                        this.checked = false;
                    });
                }
            });
            checkbox.click(function() {
                if (!this.checked) {
                    $("#selectAll").prop("checked", false);
                }
            });

            // $('#formsubmit').submit(function(){
            //     alert("TES"); // show response from the php script.
            //     $.ajax({
            //         url: '/inputData',
            //         type:"POST",
            //         data: $(this).serialize(),             
            //         success: function(data) {               
            //         }
            //     })
            // });





            $('#formsubmit').on('submit', function(e) {
                //fungsi for add data
                // alert('ok');
                // e.preventDefault();
                let name = $('#name').val();
                let email = $('#email').val();
                let address = $('#address').val();
                let phone = $('#phone').val();
                // console.log(name);
                // console.log(email);
                // console.log(address);
                // console.log(phone);
                $.ajax({
                    url: 'inputData',
                    type: "GET",
                    data: {
                        name: name,
                        email: email,
                        address: address,
                        phone: phone,
                    },
                    success: function(response) {
                        // alert('Success'+response);
                        // console.log(response);
                        if (response) {
                            // $('#formsubmit').modal('hide'); //tutup form
                            // refreshTable()
                        }
                    },
                    error: function(response) {
                        console.log(e);
                        console.log(response);
                    }
                })
            })
        });

        

        $(document).on("click", "[id^=a]", function(event, ui) {
            //function for edit (when clicked)
            valIdEdt = this.id.substring(1);
            // alert(valIdEdt);
            document.getElementById('nameEdit').value = data[valIdEdt - 1].name;
            document.getElementById('emailEdit').value = data[valIdEdt - 1].email;
            document.getElementById('addressEdit').value = data[valIdEdt - 1].address;
            document.getElementById('phoneEdit').value = data[valIdEdt - 1].phone;
        })

        $(document).on("click", "[id^=b]", function(event, ui) {
            //function for delete (when clicked)
            valIdDel = this.id.substring(1);
            alert(valIdDel);
        })
    </script>
</body>

</html>
