// number validation
function validateNum(input) {
  return /^[0-9]+$/.test(input.value);
}

$(document).ready(function () {
  $(function () {
    //number validator
    $.validator.addMethod(
      "valNum",
      function (value, element) {
        return validateNum(element);
      },
      "Please enter numbers only."
    );

    if ($("#loginform").length) {
      $("#loginform").validate({
        rules: {
          empid: {
            valNum: true,
            minlength: "6",
          },
        },
      });
    }

    if ($("#verform").length) {
      $("#verform").validate({
        rules: {
          codereqid: {
            valNum: true,
            minlength: "6",
          },
        },
      });
    }

    if ($("#vercode").length) {
      $("#vercode").validate({
        rules: {
          rstcode: {
            valNum: true,
            minlength: "5",
          },
        },
      });
    }
  });

  $("#loginform").submit(function (event) {
    event.preventDefault();

    $.ajax({
      url: "/myproject/connection/login_control.php",
      method: "POST",
      dataType: "json",
      data: $("#loginform").serialize(),
      beforeSend: function () {
        console.log("loading...");
      },
      success: function (response) {
        console.log(response);
        if (response.error) {
          $(".card").html(response.error);
          $("#collapseExample1")
            .collapse("show")
            .fadeIn()
            .delay(2000)
            .fadeOut();
        } else if (response.login) {
          $(".card").html(response.login);
          $("#collapseExample1")
            .collapse("show")
            .fadeIn()
            .delay(2000)
            .fadeOut();
        } else {
          $(".card").html("successfully logged in");
          $("#collapseExample1")
            .collapse("show")
            .fadeIn()
            .delay(2000)
            .fadeOut();
          setTimeout(function () {
            $("#exampleModalToggle").modal("hide");
            $("#loginform")[0].reset();
            if (response.type == "emp") {
              window.location.href = "http://localhost/myproject/home.php";
            } else if (response.type == "admin") {
              window.location.href =
                "http://localhost/myproject/admin/adminhome.php";
            } else if (response.type == "sup") {
              window.location.href =
                "http://localhost/myproject/admin_super/superadminhome.php";
            }
          }, 2500);
        }
      },
      error: function () {
        console.log("Error occured");
      },
    });
  });

  $("#verform").submit(function (event) {
    event.preventDefault();

    $.ajax({
      url: "/myproject/connection/login_control.php",
      method: "POST",
      dataType: "json",
      data: $("#verform").serialize(),
      beforeSend: function () {
        console.log("loading...");
      },
      success: function (response) {
        console.log(response);
        if (response.err) {
          alert(response.err);
        } else if (response.log) {
          alert(response.log);
        } else {
          $("#collapseExample").collapse("show");
          $("#verify").val(response);
        }
      },
      error: function () {
        console.log("Error occured");
      },
    });
  });

  $("#vercode").submit(function (event) {
    event.preventDefault();

    $.ajax({
      url: "/myproject/connection/login_control.php",
      method: "POST",
      dataType: "json",
      data: $("#vercode").serialize(),
      beforeSend: function () {
        console.log("loading...");
      },
      success: function (response) {
        console.log(response);
        if (response.err) {
          alert(response.err);
        } else if (response.log) {
          alert(response.log);
        } else {
          $("#exampleModalToggle2").modal("hide");
          $("#exampleModalToggle3").modal("show");
          $("#recover").val(response);
        }
      },
      error: function () {
        console.log("Error occured");
      },
    });
  });

  $("#chngform").submit(function (event) {
    event.preventDefault();

    $.ajax({
      url: "/myproject/connection/login_control.php",
      method: "POST",
      dataType: "json",
      data: $("#chngform").serialize(),
      beforeSend: function () {
        console.log("loading...");
      },
      success: function (response) {
        console.log(response);
        if (response.err) {
          alert(response.err);
        } else {
            alert(response);
            $("#exampleModalToggle3").modal("hide");
            $("#exampleModalToggle").modal("show");
        }
      },
      error: function () {
        console.log("Error occured");
      },
    });
  });
});
