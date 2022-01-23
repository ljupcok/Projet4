let textarea = document.getElementById("mytextarea");

tinymce.init({
	selector: "#mytextarea",
	plugins:
		"advlist autolink lists link image charmap print preview hr anchor pagebreak",
	toolbar_mode: "floating",
	setup: function (editor) {
		editor.on("init", function (e) {
			editor.setContent(textarea.textContent);
		});
	},
});
