$('#editNoteModal').on('show.bs.modal', function (e) {
  selectedNoteId = e.relatedTarget.id;
  var modal = $(this);

  // get json data from read_one.php api
  $.ajax({
    type: 'GET',
    //dataType: "json",
    //contentType: "application/json",
    url: `api/note/read_one.php?id=${selectedNoteId}`,
    success: function (data) {
      console.log(data);
      $('#editTitle').val(data.title);
      $('#editDesc').val(data.body);
    },
    error: function (xhr) {
      alert('Error home.. status = ' + xhr.status + 'message = ' + xhr.statusText);
    },
  });
});
