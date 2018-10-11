
<script src="{{asset('/js/popper.min.js')}}"></script>
<script src="{{asset('/js/bootstrap.min.js')}}"></script>
 <script src="{{ asset('/js/scripts.js') }}"></script>
 <script src="{{ asset('/js/holder.min.js') }}"></script>
 <script>
     $(window).load(function() {
         $('#slider').nivoSlider();
     });

         jQuery(document).ready(function($) {

         //Remove alert
         window.setTimeout(function() {
             $(".alert").fadeTo(500, 0).slideUp(500, function(){
                 $(this).remove();
             });
         }, 4000);
     });
 </script>