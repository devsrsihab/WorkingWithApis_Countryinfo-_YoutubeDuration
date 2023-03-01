<!doctype html>
<html lang="en">

<head>
  <title>YT-Page</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>

  <main>
    <div class="container my-5">
        <h2 class="mb-3 mt-5">Youtube Video Duration Calculate</h2>
        <div class="row">
            <form id="ytLinkForm" action="{{ route('YtVideoInfo') }}" method="post">
            @csrf
                <input name="ytLink" type="text" class="form-control mb-3" placeholder="Input Youtube LInk">
                <h4 class="d-none duration text-success mb-3"></h4>
                <button class="btn btn-primary" type="submit">Submit</button>
            </form>
        </div>
    </div>
  </main>

  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>

  {{-- custom js --}}
  <script>
    $(document).ready(function () {

        // jaax setup
        $.ajaxSetup({headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } }); });

        // ajax form submit
        $(document).on('submit','#ytLinkForm', function (e) {
            e.preventDefault();

            const formData = new FormData($('#ytLinkForm')[0]);

            // ajax
            $.ajax({
                type: "POST",
                url: "{{ route('YtVideoInfo') }}",
                data: formData,
                processData:false,
                contentType:false,
                success: function (res){
                {
                if (res.status===200)
                {
                $('.duration').removeClass('d-none');
                $('.duration').text(res.duration);
                }
                else
                
                $('.duration').addClass('d-none');

                }    
                }
            });
            
        });
  </script>
</body>

</html>