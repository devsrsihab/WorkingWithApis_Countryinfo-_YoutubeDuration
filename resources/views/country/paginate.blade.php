<div class="country_child">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody> 
         @foreach ($countryNames->items() as $key => $countryName)
         <tr>
           <th>{{ ++$key }}</th>
           <td>{{ $countryName }}</td>
           <td>View</td>
         </tr>                         
         @endforeach                   


        </tbody>
      </table>
      {{-- {{ $countryNames->links() }} --}}

</div>