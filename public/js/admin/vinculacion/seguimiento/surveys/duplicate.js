$(document).ready(function() {
    $('#previous_period_id').change(function () {
        $.get("{{ url('dropdown')}}",
            {option: $(this).val()},
            function (data) {
                $('#previous_survey_id').empty();
                $('#previous_survey_id').append("option value=''>Seleccione la encuesta</option>")
                $.each(data, function (key, element) {
                    $('#previous_survey_id').append("<option value='" + key + "'>" + element + "</option>");
                });
            });
    });
});
