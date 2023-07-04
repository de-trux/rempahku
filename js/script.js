document.addEventListener('DOMContentLoaded', function() {
  const anchor = document.getElementById('detrux');
  const clickSound = document.getElementById('clickSound');

  anchor.addEventListener('click', function() {
    clickSound.play();
  });
});

$(document).ready(function() {
$('#dataTable').DataTable();
});