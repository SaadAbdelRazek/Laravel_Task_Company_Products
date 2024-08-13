<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">Add New Product</div>
            @if (Session::has('fail'))
                <span class="alert alert-danger p-2">{{Session::get('fail')}}</span>
            @endif
            <div class="card-body">
                <form action="{{ route('AddProduct')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Product Name</label>
                        <input type="text" name="name" value="{{old('name')}}" class="form-control" id="formGroupExampleInput" placeholder="Enter Product Name">
                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Product Details</label>
                        <input type="text" name="details" class="form-control" value="{{old('details')}}" id="formGroupExampleInput2" placeholder="Enter Product Details">
                        @error('details')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Product Expiration Date</label>
                        <input type="date" name="expiration_date" value="{{old('expiration_date')}}" class="form-control" id="formGroupExampleInput2" placeholder="Enter Product Expiration Date">
                        @error('expiration_date')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Product Company Name</label>
                        <select name="company_id" class="form-control">
                        @if ($all_companies !== NULL)
                        <option value="">Select Company</option>
                        @foreach ($all_companies as $item)
                            <option value="2">{{$item->name}}</option>
                        @endforeach
                        @else
                        <p>No Company Found</p>
                        @endif
                        </select>

                        @error('company_id')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <input type="submit" class="btn btn-primary"value='Save' name='submit'>

                </form>
                
            </div>
        </div>
    </div>
</body>
</html>