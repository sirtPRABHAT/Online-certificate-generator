var check = function() {
    if (document.getElementById('password').value ==
      document.getElementById('confirm_password').value) {
      document.getElementById('message').style.color = 'green';
      document.getElementById('message').innerHTML = 'Password matched';
      document.getElementById('submit').disabled = false;
    } else {
      document.getElementById('message').style.color = 'red';
      document.getElementById('message').innerHTML = 'Passwords are not matching';
      document.getElementById('submit').disabled = true;
    }
}

$(document).ready( function () {
    $('#myTable').DataTable();
} );
