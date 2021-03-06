$(document).on('click', '#edit-save-btn', function (e) {
  const data = { title: '', category_id: '', body: '' };
  e.preventDefault();
  data.title = $('#editTitle').val();

  // check the user input of category (e.g Business) and pass the value
  if (document.getElementById('editBs').checked) {
    data.category_id = $('#editBs').val();
  } else if (document.getElementById('editPs').checked) {
    data.category_id = $('#editPs').val();
  } else if (document.getElementById('editH').checked) {
    data.category_id = $('#editH').val();
  } else {
    data.category_id = '1';
  }

  data.body = $('#editDesc').val();
  data.id = selectedNoteId;
  const dataToSend = JSON.stringify(data);

  // get json data from read.php api
  $.ajax({
    type: 'POST',
    //dataType: "json",
    //contentType: "application/json",
    url: 'api/note/update.php',
    data: dataToSend,
    success: function (data) {
      location.reload();
    },
    error: function (xhr) {
      alert('Error home.. status = ' + xhr.status + 'message = ' + xhr.statusText);
    },
  });

  $(this).prev().click();
  //window.location.reload(true);
});
