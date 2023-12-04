<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form to Table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>

<body>

   

    <div class="contaner">
       


              

            <div class="col-md-6 offset-3 shadow p-4">
                <h2>Update data</h2>

                <form action="{{ route('checklist.update',$checklists->id) }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <input type="text" name="description" placeholder="Update your description" class="form-control mt-2" value="{{ $checklists->description }}">
                    </div>

                    <div class="form-group">
                        <input type="text" name="remark" placeholder="Update your Remark" class="form-control mt-2" value="{{ $checklists->remark }}">
                    </div>



                    {{-- <div class="form-group">
                        <input type="hidden" name="id" class="form-control mt-2" value="{{ $checklists->id }}">
                    </div> --}}


                    <div class="form-group">
                        <button type="submit" name="update_record" class="mt-2 btn btn-success">Update</button>
                    </div>

                </form>

                
            </div>

        </div>
    </div>







   


    


</body>

</html>