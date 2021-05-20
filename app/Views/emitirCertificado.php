
<script type="text/javascript" src="<?php echo base_url('public/js/tinymce/tinymce.min.js')?>"></script>
<main>
    <div class="container bg-white" style="padding-bottom: 10em;">
        <div class="row">
            <div class="col-12">
                <form method="post" action="<?= base_url('/PdfController/emitirCertificado'); ?>">
                    <div class="form-group">
                        <label for="textCertificado">Texto do Certificado</label>
                        <textarea class="form-control" id="textCertificado" name="textCertificado" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Emitir</button>
                </form>
            </div>
        </div>
    </div>
</main>

<script>
    tinymce.init({
        language: 'pt_BR',
        selector: 'textarea',
        height: 390,
        theme: 'modern',
        plugins: ['advlist anchor autolink charmap code codesample colorpicker contextmenu',
            'directionality fullpage fullscreen help hr image imagetools insertdatetime',
            'link lists media nonbreaking pagebreak paste preview print searchreplace',
            'table template textcolor textpattern toc visualblocks visualchars wordcount'
        ],

        toolbar1: 'alignleft aligncenter alignright alignjustify | bold italic strikethrough forecolor backcolor | bullist numlist outdent indent | formatselect | fontsizeselect | link image |   removeformat | styleselect | insertfile undo redo',
        image_advtab: true,
        templates: [{
                title: 'Notícia',
                url: '<?php echo base_url('assets/js/tinymce/plugins/template/noticias.html'); ?>'
            },
            {
                title: 'Evento',
                content: 'TESTE 2'
            }
        ],
        content_css: [
            '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
            '//www.tinymce.com/css/codepen.min.css'
        ]
    });
</script>