<script type="text/javascript">

  function set_js_flashdata(url){
    $.ajax({
      url: url,
      success: function(){}
    });
  }

  function togglePriceFields(elem) {
    if($("#"+elem).is(':checked')){
      $('.paid-course-stuffs').slideUp();
    }else
      $('.paid-course-stuffs').slideDown();
    }
</script>

<?php if ($page_name == 'courses-server-side'): ?>
  <script type="text/javascript">
  jQuery(document).ready(function($) {
        $.fn.dataTable.ext.errMode = 'throw';
        $('#course-datatable-server-side').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax":{
                "url": "<?php echo site_url(strtolower($this->session->userdata('role')).'/get_courses') ?>",
                "dataType": "json",
                "type": "POST",
                "data" : {selected_category_id : '<?php echo $selected_category_id; ?>',
                          selected_status : '<?php echo $selected_status ?>',
                          selected_instructor_id : '<?php echo $selected_instructor_id ?>',
                          selected_price : '<?php echo $selected_price ?>'}
            },
            "columns": [
                { "data": "#" },
                { "data": "title" },
                { "data": "category" },
                { "data": "lesson_and_section" },
                { "data": "enrolled_student" },
                { "data": "status" },
                { "data": "price" },
                { "data": "actions" },
            ],
            "columnDefs": [{
                targets: "_all",
                orderable: false
             }]
        });
    });
  </script>
<?php endif; ?>

<script type="text/javascript">
  function switch_language(language) {
      $.ajax({
          url: '<?php echo site_url('home/site_language'); ?>',
          type: 'post',
          data: {language : language},
          success: function(response) {
              setTimeout(function(){ location.reload(); }, 500);
          }
      });
  }


  function div_add()
  {
    $.NotificationApp.send("<?php echo get_phrase('successfully'); ?>!", '<?php echo get_phrase('Div added to bottom ')?>' ,"top-right","rgba(0,0,0,0.2)","info");

  }

  function div_remove()
  {
    $.NotificationApp.send("<?php echo get_phrase('successfully'); ?>!", '<?php echo get_phrase('Div has been deleted ')?>' ,"top-right","rgba(0,0,0,0.2)","error");

  }
</script>