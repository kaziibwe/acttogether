var individual_ui_component = document.getElementById("individual_ui_component");
var group_ui_component = document.getElementById('group_ui_component');
var group_member = document.getElementById('group_member_registration_form');
var group = document.getElementById('group_creation_form');

function show_individual_ui_component() {
  if (individual_ui_component) {
      group_ui_component.style.display = "none";
      group_member.style.display = "none";
      group.style.display = "none";

      individual_ui_component.style.display = "block";
  }
}

function show_group_ui_component() {
  if (group_ui_component) {
    individual_ui_component.style.display = "none";
    group_member.style.display = "none";
    group.style.display = "none";

    group_ui_component.style.display = "block";
  }
}

function show_group_member_creation_form() {
  if (group_member) {
      individual_ui_component.style.display = "none";
      group_ui_component.style.display = "none";
      group.style.display = "none";

      group_member.style.display = "block";
  }
}

function show_group_creation_form() {
  if (group) {
      individual_ui_component.style.display = "none";
      group_ui_component.style.display = "none";
      group_member.style.display = "none";
      
      group.style.display = "block";
  }
}