     <!-- jQuery -->

     <script src="<?php echo base_url(); ?>assest/ckeditor/ckeditor.js"></script>
     <script>
       CKEDITOR.replace('des_content');
       CKEDITOR.replace('des_content1');
       CKEDITOR.replace('des_content2');
       CKEDITOR.replace('des_content3');
       CKEDITOR.replace('des_content4');
       CKEDITOR.replace('des_content5');
       CKEDITOR.replace('des_content7');
       CKEDITOR.replace('des_content6', {
         toolbar: 'Basic',
         /* this does the magic */
         uiColor: '#cccccc'
       });
       
     </script>

     <!-- Bootstrap Core JavaScript -->
     <script src="<?php echo base_url(); ?>assest/adminassest/vendor/bootstrap/js/bootstrap.min.js"></script>

     <!-- Metis Menu Plugin JavaScript -->
     <script src="<?php echo base_url(); ?>assest/adminassest/vendor/metisMenu/metisMenu.min.js"></script>

     <script src="<?php echo base_url(); ?>assest/adminassest/vendor/datatables/js/jquery.dataTables.min.js"></script>
     <script src="<?php echo base_url(); ?>assest/adminassest/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
     <script src="<?php echo base_url(); ?>assest/adminassest/vendor/datatables-responsive/dataTables.responsive.js"></script>

     <!-- Custom Theme JavaScript -->
     <script src="<?php echo base_url(); ?>assest/adminassest/dist/js/sb-admin-2.js"></script>

     <script>
       $(document).ready(function() {
         $('#dataTables-example').DataTable({
           responsive: true
         });

         var currentSrc = $("#output_image").attr("src").split("/");
         if (currentSrc.indexOf('noimage.png') > 0) {

           $(".removeimg").hide();

         } else {
           $(".removeimg").show();
         }

         $(".removeimg").click(function() {

           $("#output_image").attr("src", "<?php echo base_url() ?>assest/uploadfile/noimage.png");
           $("#removeimage").val($("input[name=oldimage]").val());
           $(".imgfile").val("");
           $(this).hide();

         })
       });

       function preview_image(event) {
         var reader = new FileReader();
         reader.onload = function() {
           var output = document.getElementById('output_image');
           output.src = reader.result;
         }
         reader.readAsDataURL(event.target.files[0]);

         $(".removeimg").show();
       }
     </script>

     </body>

     </html>