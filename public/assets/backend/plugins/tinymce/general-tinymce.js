/*********************
        RICH TEXT HERE
     *********************/
        tinymce.init({
            setup: function (editor) {
                     editor.on('change', function (e) {
                         editor.save();
                     });
                 },
              selector: '.description',
              min_height: 300,
              plugins: [
                'advlist autolink link image lists charmap print preview hr anchor pagebreak autoresize',
                'spellchecker searchreplace wordcount visualblocks visualchars code fullscreen',
                'insertdatetime media nonbreaking save table contextmenu directionality',
                'emoticons template textcolor colorpicker textpattern imagetools help autosave paste',
              ],

              toolbar: 'undo redo | styleselect | fontselect fontsizeselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | forecolor backcolor |  link  table | print preview fullscreen | emoticons | help',

              // menu: {
              //   favs: {title: 'My Favorites', items: 'code | spellchecker '}
              // },
              menubar: 'file edit view insert format tools spellchecker',
              paste_retain_style_properties: "color font-size font-family",
              content_css: 'css/content.css',
              /* ... */
             font_formats:
             "Andale Mono=andale mono,times; Arial=arial,helvetica,sans-serif; Arial Black=arial black,avant garde; Book Antiqua=book antiqua,palatino; Comic Sans MS=comic sans ms,sans-serif; Courier New=courier new,courier; Georgia=georgia,palatino; Helvetica=helvetica; Impact=impact,chicago; Heebo=heebo; Symbol=symbol; Tahoma=tahoma,arial,helvetica,sans-serif; Terminal=terminal,monaco; Times New Roman=times new roman,times; Trebuchet MS=trebuchet ms,geneva; Verdana=verdana,geneva; Webdings=webdings; Wingdings=wingdings,zapf dingbats",
             /* ... */
              content_style:
             "@import url('https://fonts.googleapis.com/css2?family=Heebo&display=swap');"
          });
