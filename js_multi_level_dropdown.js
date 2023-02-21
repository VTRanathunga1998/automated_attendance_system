var faculty_dropdown = document.getElementById("faculty");
var department_dropdown = document.getElementById("department");
var semester = document.getElementById("semester");
var subject_dropdown = document.getElementById("subject");



async function getFaculty() {
  var response = await fetch("http://localhost/attendanceSystem/api_data.php");

  var json_data = await response.json();

  console.log(json_data);

  faculty_dropdown.innerHTML = "Choose Faculty";
  json_data.forEach((item, index) => {
    var option = document.createElement("option");
    option.text = item.facName;
    option.value = item.facID;

    faculty_dropdown.appendChild(option);
  });


}

async function getDepartment(facID) {


  var response = await fetch(
    "http://localhost/attendanceSystem/api_data.php?type=department&facID=" + facID
  );

  var json_data = await response.json();

  console.log(json_data);

  department_dropdown.innerHTML = "";
  json_data.forEach((item, index) => {
    var option = document.createElement("option");
    option.value = item.depID;
    option.text = item.depName;

    department_dropdown.appendChild(option);
  });


}


async function getSubject(depID,semester) {

  var response = await fetch(
    "http://localhost/attendanceSystem/api_data.php?type=subject&depID=" + depID + "&semester=" +semester 
  );

  var json_data = await response.json();

  console.log(json_data);

  subject_dropdown.innerHTML = "";
  json_data.forEach((item, index) => {
    var option = document.createElement("option");
    option.value = item.subName;
    option.text = item.subCode;;

    subject_dropdown.appendChild(option);
  });
}

$(document).ready(function () {
  debugger;
  getFaculty();

  $("#faculty").change(function () {
    debugger;

    getDepartment(faculty_dropdown.value);
    getSubject(department_dropdown.value,semester.value);
  
  });  
    
  $("#semester").change(function () {
      debugger;
      getSubject(department_dropdown.value,semester.value);
  }); 

  $("#department").change(function () {
      debugger;
  
      getSubject(department_dropdown.value,semester.value);
  
  
  });

});








