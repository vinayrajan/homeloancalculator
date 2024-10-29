 jQuery(function ($) {
    "use strict";    
  $("#pdfbutton").hide();
  const forms = document.querySelectorAll(".needs-validation");
  // Loop over them and prevent submission
  Array.from(forms).forEach((form) => {
    form.addEventListener(
      "submit",
      (event) => {
        if (!form.checkValidity()) {
          event.preventDefault();
          event.stopPropagation();
        }

        form.classList.add("was-validated");
      },
      false
    );
  });

  /* slider callback */
  $("#interestrate").change(function () {
    $("#interestrateval").html($("#interestrate").val());
  });
  
  $("#tenure").change(function () {
    $("#tenureval").html($("#tenure").val());
  });

  /* calculate button */
  $("#calc").click(function (event) {
    event.preventDefault();
    var i = $("#interestrate").val();
    var t = $("#tenure").val();
    var a = $("#loanamount").val();
    if (!a.isNaN) {
      var res = calculate(a, i, t);
      var emi = res.emi > 0 ? res.emi : 0;
      var principal = res.principal > 0 ? res.principal : 0;
      var interest = res.interest > 0 ? res.interest : 0;
      var total = res.total > 0 ? res.total : 0;
      
      $("#emi").text(pretynumbers(emi));
      $("#principle").text(pretynumbers(principal));
      $("#interest").text(pretynumbers(interest));
      $("#total").text(pretynumbers(total));
      $("#pdfbutton").show();

      //$("#emitable").html(res.detailDesc)
    }
    return false;
  });

  // pdf utils
  $("#pdfbutton").on("click", function () {    
    $("#pdfModal").modal("toggle");
  });
  $("#pdfModal").on("shown.bs.modal", function () {
    $("#pdfbutton").trigger("focus");
  });
  
    $("#pdfModalForm").validate({
    errorClass: "is-invalid",
    validClass: "is-valid",
    rules: {
        email: {
            required: true,
            email: true,        
        },
        phone: {
            required: true,   
            number: true,            
        },
        zipcode: {
            required: true,            
            number: true,

        },
      action: "required"
    },
    messages: {
        email: {
            required: "Enter valid email",        
        },
        phone: {
            required: "Enter valid mobile number",        
        },
        zipcode: {
            required: "Enter valid mobile number",        
        },
      action: "Please provide some data"
    },
    submitHandler: function(form) {
        form.submit();        
    }
    
    });
    $('#pdfModal').on('hidden.bs.modal', function() {                        
        $("#pdfModalForm").get(0).reset();
        $("label.is-invalid").hide();$(".is-invalid").removeClass("is-invalid");
        $("label.is-valid").hide();$(".is-valid").removeClass("is-valid");
    });

    $("#pdfModal.close").on('click',function(){        
        $("#pdfModalForm").get(0).reset();
        $("label.is-invalid").hide();$(".is-invalid").removeClass("is-invalid");
        $("label.is-valid").hide();$(".is-valid").removeClass("is-valid");
    });

}); // end jq

/* utilities */
Number.isNaN =
  Number.isNaN ||
  function (value) {
    return typeof value === "number" && value !== value;
  };
function ucfirst(str) {
  return str.charAt(0).toUpperCase() + str.substr(1);
}
function tryParseFloat(str, defaultValue) {
  var value = parseFloat(str);
  return Number.isNaN(value) ? defaultValue : value;
}
/*      
function delay(fn, wait) {
    var args = Array.prototype.slice.call(arguments, 2);
    return setTimeout(function(){ return fn.apply(null, args); }, wait);
}
*/

function pretynumbers(x) {
  return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

var today1 = new Date();
var lastDayOfMonth1 = new Date(today1.getFullYear(), today1.getMonth() + 1, 0);
var today = today1.toLocaleDateString();
var lastDayOfMonth = lastDayOfMonth1.toLocaleDateString();

/* utilities */

function calculate(loanamt, interestrate, tenure) {
  var e, n, a, l, o, r, u, t, i, c;
  (n = e = loanamt),
    (l = a = 12 * tenure),
    (r = t = (c = interestrate) / 100 / 12),
    (o = Math.pow(1 + r, l)),
    (i = o / (o - 1)),
    (u =
      (Math.round(n * r * i),
      ((r * -n * Math.pow(1 + r, l)) / (1 - Math.pow(1 + r, l))).toFixed(4))),
    (c = u * l - n),
    (m = Number(n) + Number(c));
  if (!u || !c || !m)
    return {
      principal: Math.round(n),
      emi: 0,
      interest: 0,
      total: 0,
    };
  for (
    var s = Number(n),
      d = "",
      v = 0,
      p = 0,
      g = 0,
      h = 0,
      f = 0,
      b = 0,
      y =
        ((d =
          "<table class='table table-bordered table-sm table-hover'><thead><tr><th>Year</th><th>Opening Balance</th><th>EMI*12</th><th>Interest paid yearly</th><th>Principal paid yearly</th><th>Closing Balance</th></thead><tbody>"),
        1);
    y <= l / 12;
    y++
  ) {
    for (var A = "", I = 1; I <= 12; I++) {
      var N = Number(((interestrate * s) / 1200).toFixed(4)),
        L = Number((u - N).toFixed(4));
      (s = Number((s - L).toFixed(4))),
        (A = Number((Number(A) + N).toFixed(4)));
    }
    var w = (12 * u).toFixed(4),
      _ = A,
      E = (w - _).toFixed(4),
      k = (n - E).toFixed(4);
    (v = isNaN(n) ? 0 : Math.round(n).toLocaleString("en-IN")),
      (p = isNaN(w) ? 0 : Math.round(w).toLocaleString("en-IN")),
      (g = isNaN(_) ? 0 : Math.round(_).toLocaleString("en-IN")),
      (h = isNaN(E) ? 0 : Math.round(E).toLocaleString("en-IN")),
      (isNaN(k) || "-0" == (f = Math.round(k).toLocaleString("en-IN"))) &&
        (f = 0),
      (b =
        parseInt(g) > 0
          ? parseInt(b) + parseInt(g.replace(/,/g, ""))
          : parseInt(b) + 0),
      (d +=
        "<tr><td>" +
        y +
        "</td><td>" +
        v +
        "</td><td>" +
        p +
        "</td><td>" +
        g +
        "</td><td>" +
        h +
        "</td><td>" +
        f +
        "</td></tr>"),
      (n = k);
  }
  pri = Math.round(e);
  int = Math.round(c);
  drawPI(pri, int);
  return (
    (d += "</tbody></table>"),
    {
      principal: Math.round(e),
      emi: Math.round(u),
      interest: Math.round(c),
      total: Math.round(m),
      detailDesc: d,
    }
  );
}

function drawPI(pri, int) {
  google.charts.load("current", { packages: ["corechart"] });
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ["Task", "USD"],
      ["Principle", pri],
      ["Intrest", int],
    ]);

    var options = {
      title: "Intrest to Principle ratio",
      pieHole: 0.4,
    };

    var chart = new google.visualization.PieChart(
      document.getElementById("piechart")
    );

    chart.draw(data, options);
  }
}
jQuery.validator.setDefaults({
    debug: true,
    success: "valid"
});
