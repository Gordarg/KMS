function loadStyle(url)
{
  document.querySelector('head').innerHTML += '<link rel="stylesheet" href="' + url + '" type="text/css"/>';
}
function loadScript(url, callback)
{
    var head = document.getElementsByTagName('head')[0];
    var script = document.createElement('script');
    script.type = 'text/javascript';
    script.src = url;
    script.onreadystatechange = callback;
    script.onload = callback;
    head.appendChild(script);
}
var myPrettyCode = function() {
  new SimpleMDE({
		element: document.getElementsByName("body")[0],
		spellChecker: false,
	});
};
loadStyle("css/simplemde.css");
loadScript("js/simplemde.js", myPrettyCode);