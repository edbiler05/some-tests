      <!-- Bootstrap JavaScript Libraries
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/nm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
      -->
      <script src="<?= base_url('/assets/js/popper.min.js') ?>" crossorigin="anonymous"></script>
      <script src="<?= base_url('/assets/js/bootstrap.min.js') ?>" crossorigin="anonymous"></script>

      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
      <script>
        $(document).ready(function() {

          $('#switcher').click(function() {
            var sw = $('#switcher').val();
            if (sw == 0) {
              $('#lname,#fname,#address,#city,#phone,select, button').each(function() {
                if ($(this).attr('readonly')) {
                  $(this).removeAttr('readonly');
                }
                if ($(this).attr('disabled')) {
                  $(this).removeAttr('disabled');
                }
                $('#switcher').val(1);
              });
            } else {
              $('#lname,#fname,#address,#city,#phone,select, button').each(function() {
                $(this).attr('readonly', true);
              });
              $('button, select').each(function() {
                $(this).attr('disabled', true);
              });
              $('#switcher').val(0);
            }
          });


          $("#login_email").change(function() {
            var val = $('#login_email').val();
            alert(val);
          });


        });
      </script>



      </div>
      <!-- end main container-->

      </body>

      </html>