<!doctype html>
<html lang="en">

<head>
  <title>Country </title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<link rel="stylesheet" href="//cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
<style>
  symbol {
    color: red;
    font-size: 25px;
}
</style>

</head>

<body>
  <header>
    <!-- place navbar here -->
  </header>


  <main>

    <div class="container my-5 ">
        <div class="row justify-content-center">
            <div class="col">
                <div class="country_data_parent">
                    <div class="country_child">
                        <table id="myTable" class="table table-responsive table-striped table-bordered table-hover">
                            <thead class="table-danger">
                              <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Capital</th>
                                <th scope="col">Alpha3Code</th>
                                <th scope="col">Population</th>
                                <th scope="col">Area</th>
                                <th scope="col">Independent</th>
                                <th scope="col">Borders</th>
                                <th scope="col">Currencies</th>
                                <th scope="col">Languages</th>
                                <th scope="col">Flag</th>
                              </tr>
                            </thead>
                            <tbody> 

                             @foreach ($countryData as $key => $countrie)
                             <tr class="align-middle table-dark text-center">
                               <th>{{ ++$key }}</th>
                               <td>{{ $countrie->name }} </td>
                               <td>
                               @if (property_exists($countrie,'capital'))
                               {{ $countrie->capital }}
                               @else
                                 N/A
                               @endif 
                               </td>
                               <td>{{ $countrie->alpha3Code }} </td>
                               <td>{{ $countrie->population }} </td>
                               
                               {{-- area --}}
                               <td>
                                @if (property_exists($countrie, 'area'))
                                  {{ $countrie->area }}
                                @else
                                  N/A
                                @endif
                              </td>                              
                               <td>{{ $countrie->independent === true ? 'Yes' : 'No' }} </td>

                               {{-- border --}}
                               <td>
                               @if (isset($countrie->borders) && count($countrie->borders) > 0 )

                               @foreach ($countrie->borders as $borders )
                                 <span>{{ $borders }},</span>
                               @endforeach

                               @else
                                 N/A
                               @endif 
                               </td>

                               {{-- currencies --}}
                               <td>
                                @if (isset($countrie->currencies))

                                  @foreach ($countrie->currencies as $currencies)
                                    <span>{{ $currencies->name }}</span>
                                  @endforeach
                                
                               @else
                               N/A
                               @endif

                               </td>

                               {{-- languages --}}
                               <td>
                                @foreach ($countrie->languages  as $languages )
                                @if (isset($languages->nativeName))
                                  {{ $languages->nativeName }} 
                                @else
                                {{ $languages->name }}, 

                                @endif
                               @endforeach
                               </td>

                               {{-- flags --}}
                               <td><img width="55px" height="35px" style="object-fit: contain" src="{{ $countrie->flags->svg }}" alt="flag">  </td>
                             </tr>                         
                             @endforeach                   
        
                             <tfoot>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Capital</th>
                                    <th scope="col">Alpha3Code</th>
                                    <th scope="col">Population</th>
                                    <th scope="col">Area</th>
                                    <th scope="col">Independent</th>
                                    <th scope="col">Borders</th>
                                    <th scope="col">Currencies</th>
                                    <th scope="col">Languages</th>
                                    <th scope="col">flag</th>
                                  </tr>
                            </tfoot>
                            </tbody>
                          </table>

                    </div>
                </div>


            </div>
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
  <script src="//cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    // data table
    $('#myTable').DataTable();


    // $(document).on('click','.page-link',function (e) {
    // e.preventDefault();

    // let page = $(this).attr('href').split('page=')[1];
    // $.ajax({
    //         url: "country/pagination?page="+page,
    //         success: function (res) {
    //             $('.country_data_parent').html(res);
    //         }
    //     });
    // });

});
    
  </script>


</body>

</html>