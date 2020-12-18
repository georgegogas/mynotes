$(document).ready(function () {
  // get json data from read.php api
  $.ajax({
    type: 'GET',
    //dataType: "json",
    url: 'api/note/read.php',
    success: function (data) {
      populateHTML(data);
    },
    error: function (xhr) {
      alert('Error home.. status = ' + xhr.status + 'message = ' + xhr.statusText);
    },
  });

  // append html to note-grid div at index.php file
  function populateHTML(data) {
    const noteResult = data.records;

    $.each(noteResult, function (index, note) {
      $('#note-grid').append(constructHTMLgrid(note));
    });
  }

  // create string with html to pass it to append function
  function constructHTMLgrid(note) {
    // prepare category color for html card column
    if (note.category_id == '1') {
      var category_color = 'blue';
    } else if (note.category_id == '2') {
      var category_color = 'purple';
    } else {
      var category_color = 'orange';
    }

    // setup for date to be like 12 December, 2020 - 12:00 AM
    const date = note.created;

    const monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

    const dateObj = new Date(date);
    const monthName = monthNames[dateObj.getMonth()]; // "July" (or current month)
    const dateTime = `${dateObj.getDate()} ${monthName}, ${dateObj.getFullYear()} - ${dateObj.getHours()}:${dateObj.getMinutes()}`;

    console.log(dateTime);

    //create string with html for append function
    let html = '<div class="col mb-4">';
    html += '<div class="card h-100" style="border-radius: 5%">';
    html += `<div class="card-body" id="${note.id}">`;
    html += `<div class="row align-items-end">`;
    html += `<p class="text-muted ml-2">${dateTime}</p>`;
    html += `<button class="btn btn-edit ml-auto mr-2 mb-2" id="${note.id}" data-toggle="modal" data-target="#editNoteModal"><i class="fa fa-edit"></i></button>`;
    html += '</div>';
    html += `<h5 class="card-title"><i class="fa fa-circle mr-1" style="color: ${category_color}; font-size: 15px vertical-align: top"></i>${note.title}</h5>`;
    html += `<p class="card-text">${note.body}</p>`;
    html += '</div>';
    html += '</div>';
    html += '</div>';

    return html;
  }
});
