$(document).ready(function () {
    $("#students").on("click", function () {
      getAllStudents();
    });
  
    $("#btn-add-new").on("click", function () {
      $(".modal-title").html("Add student");
      $("#table-manager").modal("show");
    });
  
    
    $("#table-manager").on("hidden.bs.modal", function () {
      $("#show-content").fadeOut();
      $("#edit-content").fadeIn();
      $("#name").val("");
      $("#teacher").val("");
      $("#btn-manage")
        .attr("value", "Add New")
        .attr("onclick", "manageData('addNew')")
        .fadeIn();
    });
  });

  function manageData(key, studentId = 0) {
    var name = $("#name").val();
    var birth_date = $("#birth_date").val();
    var teacher = $("#teacher").val();
    var start_date = $("#start_date").val();
    var select = document.getElementById("select");
    var selectedValue = select.options[select.selectedIndex].value;
  
    if (
      isNotEmpty($("#name")) &&
      isNotEmpty($("#birth_date")) &&
      isNotEmpty($("#teacher")) &&
      isNotEmpty($("#start_date"))
    ) {
      $.ajax({
        url: "handler.php",
        method: "POST",
        dataType: "text",
        data: {
          key: key,
          studentId: studentId,
          name: name,
          birth_date: birth_date,
          teacher: teacher,
          start_date: start_date,
          selectedValue: selectedValue,
        },
        success: function (response) {
          if (response != "success") alert(response);
          else {
            
            getAllStudents();
            location.reload();
            $("#name").val("");
            $("#birth_date").val("");
            $("#teacher").val(0);
            $("#start_date").val(0);
            $("#table-manager").modal("hide");
            $("#btn-manage")
              .attr("value", "Add")
              .attr("onclick", "manageData('addNew')");
          }
        },
      });
    }
  }
  function getAllStudents() {
    $.ajax({
      url: "handler.php",
      method: "POST",
      dataType: "text",
      data: {
        key: "getAllStudents",
      },
      success: function (response) {
        if (response == "success") {
          console.log("success");
        }
      },
    });
  }

  function isNotEmpty(element) {
    if (element.val() === "") {
      element.css("border", "1px solid red");
      return false;
    } else {
      element.css("border", "");
    }
  
    return true;
  }