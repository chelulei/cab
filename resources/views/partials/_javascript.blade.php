
<script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
 <script>window.jQuery || document.write('<script src="{{asset('js/jquery-3.3.1.min.js')}}"><\/script>')</script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{ asset('/js/holder.min.js') }}"></script>
<script src="{{ asset('/js/scripts.js') }}"></script>
 <script>
     jQuery(document).ready(function($) {

         $(window).on('load', function() {
             $('#slider').nivoSlider();
         });
         //Remove alert
         window.setTimeout(function() {
             $(".alert").fadeTo(500, 0).slideUp(500, function(){
                 $(this).remove();
             });
         }, 4000);
     });
 </script>