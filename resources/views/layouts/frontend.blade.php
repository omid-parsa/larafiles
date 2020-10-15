<!doctype html>
<html lang="en">

<head>
    <title>Home</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--stylesheets-->

</head>
<body>
@include('frontend.partials.navbar')
<div class="container-fluid">
    <div class="row mt-2">
        @yield('content')
    </div>
</div>





<!-- jQuery first, then Popper.js, then Bootstrap JS -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        src="https://code.jquery.com/jquery-3.3.1.slim.2in.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.2in.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.2in.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
<script>
    // jQuery(document).ready(function ($) {
    //     $(document).on('click', 'btn_report_file' ,function (event) {
    //         event.preventDefault();
    //         var $this=$(this);
    //         var file_id=$this.data('fid');
    //         alert(file_id);
    //     })
    // });
    var a_element=document.querySelector('.btn_report_file');
    if (a_element){
        a_element.addEventListener('click', function () {
            // alert(a_element.dataset.fid);
            
        });
    }
</script>

<!-- Optional JavaScript -->

</body>

</html>