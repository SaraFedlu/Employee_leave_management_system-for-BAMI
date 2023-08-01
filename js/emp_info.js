// onclick event for editing employee info
$(document).on("click", "button.view", function () {
    var uid = $(this).data("id");

    $.ajax({
        url: "/myproject/connection/actions.php",
        type: "GET",
        dataType: "json",
        data: { id: uid, action: "viewusersdata" },
        beforeSend: function () {
            console.log("waiting...");

        },
        success: function (rows) {
            console.log(rows);
            if (rows) {
                const employee = `<div class="row">
                <div class="col-sm-6 col-md-4">
                  <img src="../uploads/${rows.photo}" alt="img" class="rounded" height="130" width="150">
                </div>
                <div class="col-sm-6 col-md-8 px-3">
                  <h4 class="text-primary">${rows.firstname + " " + rows.lastname}</h4>
                  <p>
                    <i class="mdi mdi-email"></i>${rows.email}
                    <br>
                    <i class="mdi mdi-phone"></i>${rows.phone}
                  </p>
                
            <a type="button" class="btn btn-success px-3" href="create_emp.php?id=${rows.id}">Edit Profile</a>
              </div>`;
              $("#view").html(employee);
            }

        },
        error: function () {
            console.log("there is Error");
        },
    });

});