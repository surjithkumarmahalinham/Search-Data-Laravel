<html>
    <head>
        <title>Search Task</title>
    </head>
    <body>
        <div class="container">
            <input type="text" name="search" id="search" class="form-control">
            <input type="submit" value="Search" onclick="searchvalue()">
            <input type="submit" value="Reset">
            <table>
                <thead>
                <th>SL.No</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>City</th>
                <th>Country</th>
                <th>Mobile Number</th>
                <th>Date & Time</th>
                </thead>
                <tbody>
                    <?php $i = 1;?>
                    @foreach($data as $customer)
                    <tr>
                    <td><?php echo $i; ?></td>
                    <td>{{$customer->first_name}}</td>
                    <td>{{$customer->last_name}}</td>
                    <td>{{$customer->city}}</td>
                    <td>{{$customer->country}}</td>
                    <td>{{$customer->mobile_number}}</td>
                    <td>{{$customer->date_n_time}}</td>
                    </tr>
                    <?php $i++; ?>
                    @endforeach
                </tbody>
            </table>
</div>
</body>
</html>

<script>
   function searchvalue()
   {
        var search_value = $('#search').val();
        
        ajax({
            url : {{route('get_result')}},
            data : 'search_value='+search_value,
            dataType : json,
            success(response){

            }
        });
   }
    
    
</script>