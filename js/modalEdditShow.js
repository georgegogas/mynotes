$('#editNoteModal').on('show.bs.modal', function (e) {
  var button_id = $(event.relatedTarget.id);
  var modal = $(this);

  // get json data from read_one.php api
  $.ajax({
    type: 'GET',
    //dataType: "json",
    //contentType: "application/json",
    url: 'api/note/read_one.php?id=' + button_id,
    success: function (data) {
      console.log(data);
      modal.find('.modal-body input').val(data.title);
      modal.find('.modal-body texterea').val(data.body);
    },
    error: function (xhr) {
      alert('Error home.. status = ' + xhr.status + 'message = ' + xhr.statusText);
    },
  });
});
