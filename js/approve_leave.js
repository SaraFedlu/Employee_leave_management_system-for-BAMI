// onclick event for editing
$(document).on("click", "button.reply", function () {
  var uid = $(this).data("id");

  $.ajax({
    url: "/myproject/connection/actions.php",
    type: "GET",
    dataType: "json",
    data: { id: uid, action: "editusersdata" },
    beforeSend: function () {
      console.log("waiting...");
    },
    success: function (rows) {
      console.log(rows);
      if (rows) {
        $("#idno").val(rows.idno);
        $("#total").val(rows.total);
        $("#userid").val(rows.id);
      }
    },
    error: function () {
      console.log("there is Error");
    },
  });
});

$(document).on("click", "button.editdept", function () {
    var uid = $(this).data("id");
  
    $.ajax({
      url: "/myproject/connection/actions.php",
      type: "GET",
      dataType: "json",
      data: { id: uid, action: "editdep" },
      beforeSend: function () {
        console.log("waiting...");
      },
      success: function (rows) {
        console.log(rows);
        if (rows) {
          $("#department_id").val(rows.dep_id);
          $("#department").val(rows.department);
          $("#depid").val(rows.id);
        }
      },
      error: function () {
        console.log("there is Error");
      },
    });
  });

  $(document).on("click", "button.editpos", function () {
    var uid = $(this).data("id");
  
    $.ajax({
      url: "/myproject/connection/actions.php",
      type: "GET",
      dataType: "json",
      data: { id: uid, action: "editpos" },
      beforeSend: function () {
        console.log("waiting...");
      },
      success: function (rows) {
        console.log(rows);
        if (rows) {
          $("#position_id").val(rows.pos_id);
          $("#position").val(rows.position);
          $("#posid").val(rows.id);
        }
      },
      error: function () {
        console.log("there is Error");
      },
    });
  });

  $(document).on("click", "a.changepos", function () {
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
          $("#position").val(rows.position);
          $("#idno").val(rows.idno);
          $("#userid").val(rows.id);
          const name=`${rows.firstname}`;
          $("#username").html(name);
        }
      },
      error: function () {
        console.log("there is Error");
      },
    });
  });
