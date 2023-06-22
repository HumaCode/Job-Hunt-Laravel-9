{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script> --}}
<script src="{{  asset('dist')  }}/js/scripts.js"></script>
<script src="{{  asset('dist')  }}/js/custom.js"></script>

<script>
    $(document).ready(function() {
        $('#photo').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        })
    })
</script>