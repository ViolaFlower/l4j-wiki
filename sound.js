var elements = document.getElementsByClassName("mcbutton");
if (elements.length > 0) {
  for (var i = 0; i < elements.length; i++) {
    var link = elements[i].getAttribute("href");
    elements[i].setAttribute("onclick", "clickSound(); setTimeout(function timeout() { window.location = '" + link + "'; }, 100);");
    elements[i].setAttribute("onmouseover", "hoverSound()");
    elements[i].removeAttribute("href");
  }
}

function clickSound() {
  var clickSound = new Audio("/assets/click.mp3");
  clickSound.play();
}

function hoverSound() {
  var hoverSound = new Audio("/assets/hover.mp3");
  hoverSound.play();
}
