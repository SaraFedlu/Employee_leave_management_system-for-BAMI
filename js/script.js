function visibility() {
  var x = document.getElementById("password");
  var y = document.getElementById("cpassword");
  if (x.type === "password") {
    x.type = "text";
    y.type = "text";
  } else {
    x.type = "password";
    y.type = "password";
  }
}

function options(value) {
  var op = "";
  if (value) {
    $.each(value, function (index, data) {
      op += `<option value="${data.position}">${data.position}<option>`;
    });
  }
  return op;
}

//for the phone no country code
const phoneInputField = document.querySelector("#phoneno");
const phoneInput = window.intlTelInput(phoneInputField, {
  preferredCountries: ["et"],
  utilsScript:
    "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
});

const cphone = document.querySelector("#contactphoneno");
const cinput = window.intlTelInput(cphone, {
  preferredCountries: ["et"],
  utilsScript:
    "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
});

function validateInp(input) {
  input = phoneInput.getNumber();
}

function validatephone(input) {
  if (/^[+0-9]{9,13}$/.test(input.value)) return input.value;
}

//email validation
function ValidateEmail(inputText) {
  //const info = document.querySelector("#valemail");
  //const error = document.querySelector("#invemail");

  if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(inputText.value)) {
    return inputText.value;
  }
}

// name validation

function firstCap(str) {
  var returnVar = "";
  var strSplit = str.split(" ");
  for (var i = 0; i < strSplit.length; i++) {
    returnVar =
      returnVar +
      strSplit[i].substring(0, 1).toUpperCase() +
      strSplit[i].substring(1).toLowerCase();
  }
  return returnVar;
}

function validatename(input) {
  return /^[A-Z][-a-z/']+[a-z]$/.test(firstCap(input.value));
}

// name validation
function validate_addr(input) {
  return /^[A-Z0-9a-z][-A-Za-z0-9/' ]+$/.test(input.value);
}

// number validation
function validateNum(input) {
  return /^[0-9]+$/.test(input.value);
}

// concatenation for full name and address and for phone no validation
$(document).ready(function () {
  $(function () {
    $("#fname,#lname,#mname").on("blur", function () {
      fName = $("#fname").val();
      lName = $("#lname").val();
      mName = $("#mname").val();
      if (validatename(fname) && validatename(lname) && validatename(mname)) {
        fullName = fName + " " + lName + " " + mName;
        $("#username").val(fullName);
        console.log($("#username").val());
      }
    });

    $("#contactfname,#contactlname").on("blur", function () {
      cfName = $("#contactfname").val();
      clName = $("#contactlname").val();

      if (validatename(contactfname) && validatename(contactlname)) {
        cfullName = cfName + " " + clName;
        $("#cusername").val(cfullName);
        console.log($("#cusername").val());
      }
    });

    $("#region,#zone,#woreda,#locality").on("blur", function () {
      Reg = $("#region").val();
      Zone = $("#zone").val();
      Woreda = $("#woreda").val();
      Locality = $("#locality").val();
      if (
        validate_addr(region) &&
        validate_addr(zone) &&
        validate_addr(woreda) &&
        validate_addr(locality)
      ) {
        address = Reg + ", " + Zone + ", " + Woreda + ", " + Locality;
        $("#address").val(address);
        console.log(address);
      }
    });

    //phone no validation
    $("#phone").on("blur", function () {
      const phoneNumber = validateInp(phoneInput);
      if (phoneNumber) {
        $("#phone").val(phoneNumber);

        console.log(phoneNumber);
      } else {
        $("#phone").val("");
        console.log("invalid phone");
      }
    });

    $("#contactphone").on("blur", function () {
      const cNumber = validateInp(cinput);
      if (cNumber) {
        $("#contactphone").val(cNumber);
        console.log($("#contactphone").val());
      } else {
        $("#contactphone").val("");
        console.log("invalid phone");
      }
    });

    $("#email").on("blur", function () {
      const vEmail = ValidateEmail(email);
      if (vEmail) {
        $("#email").val(vEmail);
        console.log($("#email").val());
      }
    });
  });

  $("#departmentnm").on("blur", function () {
    var dep = $("#departmentnm").val();

    $.ajax({
      url: "/myproject/connection/actions.php",
      type: "GET",
      dataType: "json",
      data: { id: dep, action: "fetchdep" },
      beforeSend: function () {
        console.log("waiting...");
      },
      success: function (rows) {
        console.log(rows);
        var select = document.getElementById("position");
        var child = select.lastElementChild; 
        while (child.value) {
            select.removeChild(child);
            child = select.lastElementChild;
        }
        if(rows.pos){
          rows.pos.forEach(function (item, itemIndex) {
          var opt = document.createElement("option");
          opt.value = item.position;
          opt.innerHTML = item.position;
          select.appendChild(opt);
        });
        }
      },
      error: function () {
        console.log("there is Error");
      },
    });
  });

  });
