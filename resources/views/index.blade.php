<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form to Table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</head>

<body>


    <div class="contaner">
        <div class="row p-2">
            <div class="col-md-6">
                <h1>ADD DATA</h1>

                <!-- Add Form -->
                <form id="myForm" action="" method="POST" class="shadow p-2 bg-info">
                    <label for="description">Description:</label>
                    <input type="text" id="description" required>
                    <!-- <textarea name="" id="description" cols="3" rows="3"></textarea> -->

                    <label for="remark">Remerk:</label>
                    <input type="text" id="remark" required>

                    <button type="button" id="submitBtn" class="btn btn-sm btn-success">ADD</button>
                </form><br><br>

                <!-- Table form -->
                <form action="{{ route('checklist.store') }}" method="POST" class="shadow p-2">
                    @csrf
                    <table id="dataTable" class="table">
                        <thead>
                            <tr>
                                <th>Description</th>
                                <th>Remark</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Table content will be dynamically added here -->
                        </tbody>
                    </table>

                    <button type="submit" id="" style="margin-left: 530px;"
                        class="btn btn-primary btn-sm">Submit</button>


                </form>

            </div>

            <!-- Show data Table -->

            @php
                // dd($Alldatas)
            @endphp



            {{-- Table start --}}
            <div class="col-md-6">
                <h4><a href="{{ route('checklist.editShow') }}">Edit data</a></h4>
                <h1>Show Data</h1>

                <table class="table table-striped shadow p-2">
                    <tr>
                        <th>SL</th>
                        <th>Description</th>
                        <th>Remark</th>
                    </tr>

                    

                    {{--  show Data --}}
                    @foreach ($Alldatas as $key => $date)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $date->description }}</td>
                            <td>{{ $date->remark }}</td>
                        </tr>
                    @endforeach



                </table>

            </div>

            {{-- Table end --}}

           


        </div>
    </div>



    <script>
        $(document).ready(function() {
            $("#submitBtn").on("click", function() {
                var description = $("#description").val();

                var remark = $("#remark").val();



                if (description != "") {
                    var newRow = $("<tr>");
                    newRow.append(
                        "<td> <input type='text' style='border:none' id='name'   name ='description[]' value='" +
                        description + "'>   </td>"); //value='" + description + "'
                    newRow.append(
                        "<td> <input type='text' style='border:none' id='name'  name ='remark[]' value='" +
                        remark + "'>   </td>");

                    $("#dataTable tbody").append(newRow);

                    $("#description").val("");
                    $("#remark").val("");
                }

            });
        });
    </script>

</body>

</html>
