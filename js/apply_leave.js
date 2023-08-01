//fn to get data from database
function getdatarow(data, c) {
    var dataRow = "";
    if (data) {
       // var uname = (data.name).replace(/\s/g, "");  // trim all whitespaces
        dataRow = `<tr>
        <th scope="row">${c}.</th>
        <td>${data.start_date}</td>
        <td>${data.end_date}</td>
        <td>${data.total}</td>
        <td>${data.status}</td>
        <td>
            <a href="#" data-id="${data.id}" class="profile" title="view response" data-bs-target="#userViewModal" data-target="#userViewModal" data-bs-toggle="modal" data-toggle="modal"><i class="fa-solid fa-eye mdi mdi-eye text-info"></i></a>
            <a href="#" data-id="${data.id}" class="px-lg-4 px-md-3 px-sm-2 deleteuser" title="delete"><i class="fa-solid fa-trash-can mdi mdi-delete text-danger"></i></a>
        </td>
    </tr>`;
    }
    return dataRow;
}

// get data function
function getdata() {
    $.ajax({
        url: "/myproject/connection/actions.php",
        type: "GET",
        dataType: "json",
        data: { action: "getalldata" },
        beforeSend: function () {
            console.log("waiting...");

        },
        success: function (rows) {
            console.log(rows);
            if (rows.data) {
                var datalist = "";
                var c = 0;
                $.each(rows.data, function (index, data) {
                    c++;
                    datalist += getdatarow(data, c);
                });

                if(datalist){
                    $("#datatable tbody").html(datalist);
                }else{
                    const list = `<tr><td colspan="6" class="text-center">No entries found!</td></tr>`
                            $("#datatable tbody").html(list);
                }

            }
            if(rows.session){
                $('#avleave').val(rows.session.avleave);
            }
        },
        error: function () {
            console.log("there is Error");
        },
    });
}

$(document).ready(function () {

$("#leavetype").change(function() {
    if ($(this).val() == "other") {
      $('#collapseExample').show();
      $('#comment').attr('required', '');
      } else{
      $('#collapseExample').hide();
      $('#comment').removeAttr('required');
      }
      });
  
      var date_diff_indays = function(date1, date2) {
  dt1 = new Date(date1);
  dt2 = new Date(date2);
  return Math.floor((Date.UTC(dt2.getFullYear(), dt2.getMonth(), dt2.getDate()) - Date.UTC(dt1.getFullYear(), dt1.getMonth(), dt1.getDate()) ) /(1000 * 60 * 60 * 24));
  }
  $('#from,#to').on("blur", function () {
  
    if ($('#from').val() && $('#to').val()) {
      diff = date_diff_indays($('#from').val(), $('#to').val());
      if(diff < 1){
          alert("You can't submit this value!")
          $('#from').val("");
          $('#to').val("");
      } else{
      if(diff == 1)
            $('#total').val(diff +" day");
      else
            $('#total').val(diff +" days");
 
      }
    }
  });
     // onclick event for deleting
      $(document).on("click", "a.deleteuser", function (e) {
        e.preventDefault();
        var uid = $(this).data("id");
        if (confirm("are you sure you wanna delete?")) {
            $.ajax({
                url: "/myproject/connection/actions.php",
                type: "GET",
                dataType: "json",
                data: { id: uid, action: "deleteuser" },
                beforeSend: function () {
                    console.log("waiting...");
                },
                success: function (res) {
                  console.log(res);
                    if (res.delete == 1) {
                        $(".displaymessage").html("data deleted").fadeIn().delay(2500).fadeOut();
                        console.log("done");
                        getdata();

                } else if(res.delete == 2){
                        $(".displaymessage").html("you can't delete it, it's already approved").fadeIn().delay(2500).fadeOut();
                        getdata();
                    }
                },
                error: function () {
                    console.log("there is Error");
                },
            });
        }
    });

    // profile view
    $(document).on("click", "a.profile", function () {
        var uid = $(this).data("id");
        $.ajax({
            url: "/myproject/connection/actions.php",
            type: "GET",
            dataType: "json",
            data: { id: uid, action: "editusersdata" },
            success: function (user) {
                if (user) {
                    const employee = ` ${user.admin_comment} `;
                    const admin = ` ${user.sup_comment} `;
                    $("#employee").html(employee);
                    $("#admin").html(admin);

                }
            },
            error: function () {
                console.log("there is Error");
            }
        });
    });

getdata();
});