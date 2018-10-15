
<script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="/js/jquery-3.3.1.min.js"><\/script>')</script>
<script src="{{asset('/js/select2.min.js')}}"></script>
<script src="{{asset('/js/popper.min.js')}}"></script>
<script src="{{asset('/js/bootstrap.min.js')}}"></script>
 <script src="{{ asset('/js/scripts.js') }}"></script>
 <script src="{{ asset('/js/holder.min.js') }}"></script>

 <script>
        $(document).ready(function($) {
            $('.select2').select2();
         //Remove alert
         window.setTimeout(function() {
             $(".alert").fadeTo(500, 0).slideUp(500, function(){
                 $(this).remove();
             });
         }, 4000);
     });
 </script>