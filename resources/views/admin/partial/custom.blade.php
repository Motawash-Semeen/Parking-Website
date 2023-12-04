<script src="{{ asset('backend') }}/plugins/common/common.min.js"></script>
<script src="{{ asset('backend') }}/js/custom.min.js"></script>
<script src="{{ asset('backend') }}/js/settings.js"></script>
<script src="{{ asset('backend') }}/js/gleek.js"></script>
<script src="{{ asset('backend') }}/js/styleSwitcher.js"></script>

<!-- Chartjs -->
<script src="{{ asset('backend') }}/plugins/chart.js/Chart.bundle.min.js"></script>
<!-- Circle progress -->
<script src="{{ asset('backend') }}/plugins/circle-progress/circle-progress.min.js"></script>
<!-- Datamap -->
<script src="{{ asset('backend') }}/plugins/d3v3/index.js"></script>
<script src="{{ asset('backend') }}/plugins/topojson/topojson.min.js"></script>
<script src="{{ asset('backend') }}/plugins/datamaps/datamaps.world.min.js"></script>
<!-- Morrisjs -->
<script src="{{ asset('backend') }}/plugins/raphael/raphael.min.js"></script>
<script src="{{ asset('backend') }}/plugins/morris/morris.min.js"></script>
<!-- Pignose Calender -->
<script src="{{ asset('backend') }}/plugins/moment/moment.min.js"></script>
<script src="{{ asset('backend') }}/plugins/pg-calendar/js/pignose.calendar.min.js"></script>
<!-- ChartistJS -->
<script src="{{ asset('backend') }}/plugins/chartist/js/chartist.min.js"></script>
<script src="{{ asset('backend') }}/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script src="{{ asset('backend') }}/js/custom.min.js"></script>
<script src="{{ asset('backend') }}/js/dashboard/dashboard-1.js"></script>
<script src="https://kit.fontawesome.com/4a3cf85510.js" crossorigin="anonymous"></script>
<script>
    @if (Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}"
        switch (type) {
            case 'info':
                toastr.info(" {{ Session::get('message') }} ");
                break;

            case 'success':
                toastr.success(" {{ Session::get('message') }} ");
                break;

            case 'warning':
                toastr.warning(" {{ Session::get('message') }} ");
                break;

            case 'error':
                toastr.error(" {{ Session::get('message') }} ");
                break;
        }
    @endif
</script>
