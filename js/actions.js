function viewFilmInfo(id) {
  $(location).attr('href', 'http://'+location.host+'/index.php/films/view/'+id);
}

function removeFilm(id) {
  $.get('http://'+location.host+'/index.php/films/remove/'+id);
}


$(function()
{
  $('button[name="view"]').click(function (e) {
    viewFilmInfo($(this).parent().parent().data('id'));
  });

  $('button[name="delete"]').click(function (e) {
    removeFilm($(this).parent().parent().data('id'));
    $(this).parent().parent().remove();
  });

  $('button[name="import"]').click(function (e) {
    $(location).attr('href', 'http://'+location.host+'/index.php/films/import');
  });

  $('button[name="add"]').click(function (e) {
    $(location).attr('href', 'http://'+location.host+'/index.php/films/add');
  });
});
