<script src="{{ asset('theme/js/core/jquery.3.2.1.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('theme/js/core/popper.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('theme/js/core/bootstrap.min.js')}}" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="{{ asset('theme/js/plugins/bootstrap-switch.js')}}"></script>
<!--  Chartist Plugin  -->
<script src="{{ URL::to('theme/js/plugins/excanvas.min.js') }}"></script>
<script src="{{ URL::to('theme/js/plugins/jquery.flot.js') }}"></script>
<script src="{{ URL::to('theme/js/plugins/jquery.flot.pie.js') }}"></script>
<!--  Notifications Plugin    -->
<script src="{{ asset('theme/js/plugins/bootstrap-notify.js')}}"></script>
<!--  Share Plugin -->
<script src="{{ asset('theme/js/plugins/jquery.sharrre.js')}}"></script>
<!--  jVector Map  -->
<script src="{{ asset('theme/js/bootstrap-number-input.js')}}" type="text/javascript"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="{{ asset('theme/js/plugins/moment.min.js')}}"></script>
<!--  DatetimePicker   -->
<script src="{{ asset('theme/js/plugins/bootstrap-datetimepicker.js')}}"></script>
<!--  Sweet Alert  -->
<script src="{{ asset('theme/js/plugins/sweetalert2.min.js')}}" type="text/javascript"></script>
<!--  Tags Input  -->
<script src="{{ asset('theme/js/plugins/bootstrap-tagsinput.js')}}" type="text/javascript"></script>
<!--  Sliders  -->
<script src="{{ asset('theme/js/plugins/nouislider.js')}}" type="text/javascript"></script>
<!--  Bootstrap Select  -->
<script src="{{ asset('theme/js/plugins/bootstrap-selectpicker.js')}}" type="text/javascript"></script>
<!--  jQueryValidate  -->
<script src="{{ asset('theme/js/plugins/jquery.validate.min.js')}}" type="text/javascript"></script>
<!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<script src="{{ asset('theme/js/plugins/jquery.bootstrap-wizard.js')}}"></script>
<!--  Bootstrap Table Plugin -->
<script src="{{ asset('theme/js/plugins/bootstrap-table.js')}}"></script>
<!--  DataTable Plugin -->
<script src="{{ asset('theme/js/plugins/jquery.dataTables.min.js')}}"></script>
<!--  Full Calendar   -->
<script src="{{ asset('theme/js/plugins/fullcalendar.min.js')}}"></script>
<!-- Control Center for Now Ui theme: parallax effects, scripts for the example pages etc -->
<!-- Boostrap fileupload -->
<script src="{{ asset('theme/js/bootstrap-fileupload.min.js')}}" type="text/javascript"></script>
<!-- light-boostrap -->
<script src="{{ asset('theme/js/light-bootstrap-dashboard.js?v=2.0.1')}}" type="text/javascript"></script>
<!-- Tinymcs -->
<script src="{{ URL::to('theme/tinymce/tinymce.min.js') }}"></script>
<script src="{{ URL::to('theme/js/fileinput.js') }}"></script>
<script src="{{ URL::to('theme/js/plugins/piexif.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::to('theme/js/plugins/purify.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::to('theme/themes/fa/theme.js') }}"></script>


<script type="text/javascript">

    function submitForm(formId){
        document.getElementById(formId).submit();
        $("#formEditorModal").modal('hide');
        return false;
    }

    document.getElementById("form_submit").onclick = function(){
        $("#formEditorModal").modal();
    }
    $('#total_video').bootstrapNumber({
        upClass: 'danger',
        downClass: 'default'
    });
    $('#total_quiz').bootstrapNumber({
        upClass: 'danger',
        downClass: 'default'
    });
    $('#estimate_hours').bootstrapNumber({
        upClass: 'danger',
        downClass: 'default'
    });
    $('#content_length').bootstrapNumber({
        upClass: 'danger',
        downClass: 'default'
    });
    $('#level').bootstrapNumber({
        upClass: 'danger',
        downClass: 'default'
    });
    $('#max_star').bootstrapNumber({
        upClass: 'danger',
        downClass: 'default'
    });

    $('.years').datetimepicker({
        viewMode: 'years',
        format: 'YYYY'
    });
    $('.dates').datetimepicker({
        format: 'YYYY-MM-DD HH:mm'
    });

</script>
<script>
      tinymce.init({
        selector: '#mytextarea',
        themes: "modern",
        plugins: "textcolor",
        toolbar: "forecolor backcolor| sizeselect | bold italic | fontselect |  fontsizeselect",
        fontsize_formats: "8pt 10pt 12pt 14pt 18pt 24pt 36pt",
      });
      tinymce.init({
        selector: '#otherText',
        themes: "modern",
        plugins: "textcolor",
        toolbar: "forecolor backcolor| sizeselect | bold italic | fontselect |  fontsizeselect",
        fontsize_formats: "8pt 10pt 12pt 14pt 18pt 24pt 36pt",
      });

</script>

@yield('extrajavascript')
