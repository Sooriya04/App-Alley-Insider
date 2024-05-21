window.addEventListener('scroll', function () {
  var sidebar = document.querySelector('.post-info');
  if (window.scrollY >= 1400) {
    sidebar.style.position = 'absolute';
    sidebar.style.top = '1400px';
  } else {
    sidebar.style.position = 'fixed';
    sidebar.style.top = '0';
  }
});
