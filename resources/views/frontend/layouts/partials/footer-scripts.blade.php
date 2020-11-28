<script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery-migrate-3.0.1.min.js') }}"></script>
<script src="{{ asset('frontend/js/popper.min.js') }}"></script>
<script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.easing.1.3.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.stellar.min.js') }}"></script>
<script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('frontend/js/aos.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.animateNumber.min.js') }}"></script>
<script src="{{ asset('frontend/js/scrollax.min.js') }}"></script>
<script src="{{ asset('frontend/js/custom-script.js') }}"></script>


<script src="{{ asset('frontend/js/main.js') }}"></script>

<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.semanticui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js"></script>


<script type="text/javascript" src="{{ asset('fancybox/source/jquery.fancybox.pack.js?v=2.1.7') }}"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $(".fancybox").fancybox({

            fitToView: false,
            autoDimensions: false
        });
    });

</script>
<script type="text/javascript">
    function change_criteria_combo_function(sel) {


        $.ajax({
            url: "/api/subjects/" + sel.value,
            type: "GET",
            beforeSend: function() {
                console.log('ddd');
                $('#loader').show();
                $('#select_criteria_heading').hide();
            },
            complete: function() {
                $('#loader').hide();
            },
            success: function(response) {
                $('#result').show();
                $('#submitbutton').show();

                if (response.length > 0) {
                    $('#result').html('');


                    for (i = 0; i < response.length; i++) {
                        $('#result').append(
                            '<span class="badge badge-success" style="font-size: 2em; margin:1%;">' +
                            response[i]
                            .name + '</span>')
                    }
                } else {
                    $('#result').append('<h2 style="color: olivedrab"> NO SUBJECTS YET<h2>');
                }



            },
        });
    }

</script>
