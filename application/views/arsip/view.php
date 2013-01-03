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
    var pdfWithFormsPath = '<?php echo base_url() ?>public/pdf/tes.pdf';
  </script>
  <script type="text/javascript" src="<?php echo base_url() ?>public/js/tes.js"></script>

  <style>
  .pdfpage { position:relative; top: 0; left: 0; border: solid 1px black; margin: 10px; }
  .pdfpage > canvas { position: absolute; top: 0; left: 0; }
  .pdfpage > div { position: absolute; top: 0; left: 0; }
  .inputControl { background: transparent; border: 0px none; position: absolute; margin: auto; }
  .inputControl[type='checkbox'] { margin: 0px; }
  .inputHint { opacity: 0.2; background: #ccc; position: absolute; }
  </style>

<div class="strip strip-page">
	<div class="container">
		<div id="viewer"></div>
	</div>
</div>