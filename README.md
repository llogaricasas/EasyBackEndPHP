# ItemGL

<h2 style="color: red;">Please note! This plugin is still under development</h2>
<p>The ItemGL plugin implements an application that simply lets the user customize an item using WebGL and ThreeJs.</p>


<h2>Documentation</h2>
<p>To initialize the plugin call the constructor after $(document).ready() as below:</p>
<pre>  
  $(document).ready(function(e) {
		$("#canvas").ItemGL();
 	});

 var options =  $.extend({
			id: 'canvas',
			width: 1100,
			height: 650,
			clearColor: 0xEEEEEE,
			btnLeft: $('#btnPrevious'),
			btnRight: $('#btnNext'),
			imagesLeather: ('.imagesA'),
			imagesWood: ('.imagesB'),
			core: {object: null,
			       renderer: null, 
			       camera: null, 
			       scene: null, 
			       light: null, 
			       canvas: null, 
			       spotLight: null},
			items: {wood: null, leather: null},
			geometry: {ground: null, cube: null}
	}, options);
</pre>
<h2>The ItemGL Creator</h2>
<p>ItemGL is maintained by <a href="https://github.com/llogaricasas" target="_blank">Llogari Casas</a></p>

<h2>Thank you!</h2>
<p>I really appreciate all kind of feedback and contributions. Thanks for using and supporting ItemGL!</p>
