$(document).on('click', '#save-btn', function (e) {
  var data = { title: '', category_id: '', body: '' };
  e.preventDefault();

  data.title = $('#addTitle').val();

  // check the user input of category (e.g Business) and pass the value
  if (document.getElementById('addBs').checked) {
    data.category_id = $('#addBs').val();
  } else if (document.getElementById('addPs').checked) {
    data.category_id = $('#addPs').val();
  } else if (document.getElementById('addH').checked) {
    data.category_id = $('#addH').val();
  } else {
    data.category_id = '1';
  }
  console.log(data.category_id);

  data.body = $('#addDesc').val();
  data = JSON.stringify(data);
  console.log(data);

  // get json data from read.php api
  $.ajax({
    type: 'POST',
    //dataType: "json",
    //contentType: "application/json",
    url: 'api/note/create.php',
    data: data,
    success: function (data) {},
    error: function (xhr) {
      alert('Error home.. status = ' + xhr.status + 'message = ' + xhr.statusText);
    },
  });

  $(this).prev().click();
  window.location.reload(true);
});
