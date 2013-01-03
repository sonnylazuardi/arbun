<div class="container">
  <div class="span6 desk">
    <h3>View Arsip</h3>
	</div>
</div>

  <script type="text/javascript" src="<?php echo base_url() ?>public/js/pdfjs/core.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>public/js/pdfjs/util.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>public/js/pdfjs/api.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>public/js/pdfjs/canvas.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>public/js/pdfjs/obj.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>public/js/pdfjs/function.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>public/js/pdfjs/charsets.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>public/js/pdfjs/cidmaps.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>public/js/pdfjs/colorspace.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>public/js/pdfjs/crypto.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>public/js/pdfjs/evaluator.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>public/js/pdfjs/fonts.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>public/js/pdfjs/glyphlist.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>public/js/pdfjs/image.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>public/js/pdfjs/metrics.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>public/js/pdfjs/parser.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>public/js/pdfjs/pattern.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>public/js/pdfjs/stream.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>public/js/pdfjs/worker.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>public/js/pdfjs/jpgjs/jpg.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>public/js/pdfjs/jpx.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>public/js/pdfjs/jbig2.js"></script>

  <script type="text/javascript">
    // Specify the main script used to create a new PDF.JS web worker.
    // In production, change this to point to the combined `pdf.js` file.
    PDFJS.workerSrc = '<?php echo base_url() ?>public/js/pdfjs/worker_loader.js';
    PDFJS.getDocument('<?php echo base_url() ?>public/pdf/tes.pdf').then(function(pdf) {
		  // Using promise to fetch the page
		  pdf.getPage(1).then(function(page) {
		    var scale = 1.5;
		    var viewport = page.getViewport(scale);

		    //
		    // Prepare canvas using PDF page dimensions
		    //
		    var canvas = document.getElementById('the-canvas');
		    var context = canvas.getContext('2d');
		    canvas.height = viewport.height;
		    canvas.width = viewport.width;

		    //
		    // Render PDF page into canvas context
		    //
		    var renderContext = {
		      canvasContext: context,
		      viewport: viewport
		    };
		    page.render(renderContext);
		  });
		});
  </script>
  <script type="text/javascript" src="<?php echo base_url() ?>public/js/tes.js"></script>

<div class="strip strip-page">
	<div class="container">
    <button class="toolbarButton findPrevious" title="" id="findPrevious" tabindex="21" data-l10n-id="find_previous"></button>
    <button class="toolbarButton findNext" title="" id="findNext" tabindex="22" data-l10n-id="find_next"></button>
		<canvas id="the-canvas" style="border:1px solid black;"/>
	</div>
</div>