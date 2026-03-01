<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>AJAX PHP CRUD</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body class="bg-light">

<div class="container mt-5">

    <div class="card">
        <div class="card-header bg-primary text-white">
            Add User
        </div>
        <div class="card-body">
            <form id="userForm">
                <div class="row">
                    <div class="col">
                        <input type="text" name="name" class="form-control" placeholder="Name" required>
                    </div>
                    <div class="col">
                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                    </div>
                    <div class="col">
                        <button class="btn btn-success">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header bg-dark text-white">
            User List
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th width="120">Action</th>
                    </tr>
                </thead>
                <tbody id="userTable"></tbody>
            </table>
        </div>
    </div>

</div>

<script>

$(document).ready(function(){
    loadUsers();
});

// LOAD USERS
function loadUsers(){
    $.ajax({
        url: "test/ajax.php",
        method: "GET",
        data: { action: "views" },
        dataType: "json",
        success: function(data){

            let html = '';

            data.forEach(user => {
                html += `
                    <tr>
                        <td>${user.id}</td>
                        <td>${user.name}</td>
                        <td>${user.email}</td>
                        <td>
                            <button class="btn btn-danger btn-sm deleteBtn" data-id="${user.id}">
                                Delete1
                            </button>
                        </td>
                    </tr>
                `;
            });

            $('#userTable').html(html);
             console.log(data);
        }
    });
}

// ADD USER
// $('#userForm').submit(function(e){
//     e.preventDefault();

//     $.ajax({
//         url: "ajax.php?action=add",
//         method: "POST",
//         data: $(this).serialize(),
//         dataType: "json",
//         success: function(res){
//             if(res.status === "success"){
//                 $('#userForm')[0].reset();
//                 loadUsers();
//             }
//         }
//     });
// });

// // DELETE USER
// $(document).on('click', '.deleteBtn', function(){
//     let id = $(this).data('id');

//     if(confirm("Delete this user?")) {
//         $.ajax({
//             url: "ajax.php?action=delete",
//             method: "POST",
//             data: {id:id},
//             dataType: "json",
//             success: function(){
//                 loadUsers();
//             }
//         });
//     }
// });

</script>

</body>
</html>
