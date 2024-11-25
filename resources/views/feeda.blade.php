@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script>
        // Function to show "Program successfully applied" message
        function showSuccessMessage() {
            const messageDiv = document.getElementById('success-message');
            messageDiv.style.display = 'block';
            setTimeout(() => {
                messageDiv.style.display = 'none';
            }, 3000);

            
        }


        // Function to show "Program added to wishlist" message
        function showWishlistMessage() {
            const wishlistMessageDiv = document.getElementById('wishlist-message');
            wishlistMessageDiv.style.display = 'block';
            setTimeout(() => {
                wishlistMessageDiv.style.display = 'none';
            }, 3000);
        }
    </script>
</head>

<style> 
    .bg {
        background: #fafafa;
    }
    .br5 {
        border-radius: 7px;
    }
    .image {
        width: 243px;
        height: 210px;
        overflow: hidden;
    }
    .content {
        width: calc(100% - 90px);
    }
    .fw600 {
        font-weight: 600;
    }
    .text-cl {
        color: #e03;
    }
    .fw400 {
        font-weight: 500;
    }
    .fz90 {
        font-size: 15px;
    }
    .fz120 {
        font-size: 20px;
    }
    .fz2023 {
        font-size: 18px;
    }
    #success-message, #wishlist-message {
        display: none;
        background-color: #d4edda;
        color: #155724;
        padding: 10px;
        border-radius: 5px;
        margin-top: 15px;
        text-align: center;
    }

    #success-message {
        position: fixed;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        background-color: #d4edda;
        color: #155724;
        padding: 10px;
        border-radius: 5px;
        z-index: 9999;
    }

    #wishlist-message {
        position: fixed;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        background-color: #d4edda;
        color: #155724;
        padding: 10px;
        border-radius: 5px;
        z-index: 9999;
    }
    
</style>

<body class="bg">
    <div class="row m-0 p-2">
        <div class="col-12 shadow-sm bg-white p-2 d-flex mb-2 br5">
            <div class="image">
                <img class="br5" src="{{ asset('images/1732314681.jpg') }}" width="100%" height="100%">
            </div>
            <div class="px-2 content">
                <!-- Add to Wishlist Button -->
                <a href="javascript:void(0);" class="btn btn-primary float-end" onclick="showWishlistMessage()">Add to Wishlist</a>
                <p class="mb-1 fw600 fz120">CODE</p>
                <p class="mb-1 fw400 fz90">Location: STADIUM</p>
                <p class="mb-1 text-cl fw400 fz90">Start Date: 2024-11-27</p>
                <p class="mb-1 text-cl fw400 fz90">End Date: 2024-11-30</p>
                <p class="mb-1 fw400 fz90">Start Time: 05:59:00</p>
                <p class="mb-1 fw400 fz90">EEnd Time: 10:58:00</p>
                <p class="mb-1 fw400 fz90">Benefits: FOOD AND DRINKSa</p>
                <p class="mb-1 fw400 fz90">Description: </p>
                <div>
                    <button class="btn btn-success float-end mt-2" onclick="showSuccessMessage()">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        Quick Apply
                    </button>
                </div>
                <!-- Messages -->
                <div id="success-message">Program successfully applied</div>
                <div id="wishlist-message">Program added to wishlist</div>
            </div>
        </div>
    </div>
</body>


<body class="bg">
    <div class="row m-0 p-2">
        <div class="col-12 shadow-sm bg-white p-2 d-flex mb-2 br5">
            <div class="image">
                <img class="br5" src="{{ asset('images/1732314959.jpg') }}" width="100%" height="100%">
            </div>
            <div class="px-2 content">
                <!-- Add to Wishlist Button -->
                <a href="javascript:void(0);" class="btn btn-primary float-end" onclick="showWishlistMessage()">Add to Wishlist</a>
                <p class="mb-1 fw600 fz120">ssuskom</p>
                <p class="mb-1 fw400 fz90">Location: N24</p>
                <p class="mb-1 text-cl fw400 fz90">Start Date: 2024-11-21</p>
                <p class="mb-1 text-cl fw400 fz90">End Date: 2024-11-25</p>
                <p class="mb-1 fw400 fz90">Start Time: 06:04:00</p>
                <p class="mb-1 fw400 fz90">End Time: 18:03:00</p>
                <p class="mb-1 fw400 fz90">Benefits: FOOD AND DRINKSa</p>
                <p class="mb-1 fw400 fz90">Description:</p>
                <div>
                    <button class="btn btn-success float-end mt-2" onclick="showSuccessMessage()">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        Quick Apply
                    </button>
                </div>
                <!-- Messages -->
                <div id="success-message">Program successfully applied</div>
                <div id="wishlist-message">Program added to wishlist</div>
            </div>
        </div>
    </div>
</body>


<body class="bg">
    <div class="row m-0 p-2">
        <div class="col-12 shadow-sm bg-white p-2 d-flex mb-2 br5">
            <div class="image">
                <img class="br5" src="{{ asset('images/1732315785.jpg') }}" width="100%" height="100%">
            </div>
            <div class="px-2 content">
                <!-- Add to Wishlist Button -->
                <a href="javascript:void(0);" class="btn btn-primary float-end" onclick="showWishlistMessage()">Add to Wishlist</a>
                <p class="mb-1 fw600 fz120">SUSKOM</p>
                <p class="mb-1 fw400 fz90">Location: N24</p>
                <p class="mb-1 text-cl fw400 fz90">Start Date: 2024-11-18</p>
                <p class="mb-1 text-cl fw400 fz90">End Date: 2024-11-30</p>
                <p class="mb-1 fw400 fz90">Start Time: 09:49:00</p>
                <p class="mb-1 fw400 fz90">End Time: 11:49:00</p>
                <p class="mb-1 fw400 fz90">Benefits: FOOD AND DRINKSa</p>
                <p class="mb-1 fw400 fz90">Description:</p>
                <div>
                    <button class="btn btn-success float-end mt-2" onclick="showSuccessMessage()">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        Quick Apply
                    </button>
                </div>
                <!-- Messages -->
                <div id="success-message">Program successfully applied</div>
                <div id="wishlist-message">Program added to wishlist</div>
            </div>
        </div>
    </div>
</body>


<body class="bg">
    <div class="row m-0 p-2">
        <div class="col-12 shadow-sm bg-white p-2 d-flex mb-2 br5">
            <div class="image">
                <img class="br5" src="{{ asset('images/1732314756.jpg') }}" width="100%" height="100%">
            </div>
            <div class="px-2 content">
                <!-- Add to Wishlist Button -->
                <a href="javascript:void(0);" class="btn btn-primary float-end" onclick="showWishlistMessage()">Add to Wishlist</a>
                <p class="mb-1 fw600 fz120">CODE</p>
                <p class="mb-1 fw400 fz90">LOCATION: STADIUM</p>
                <p class="mb-1 text-cl fw400 fz90">START DATE: 20 NOVEMBER 2024</p>
                <p class="mb-1 text-cl fw400 fz90">END DATE: 20 NOVEMBER 2024</p>
                <p class="mb-1 fw400 fz90">START TIME: 8.00 AM</p>
                <p class="mb-1 fw400 fz90">END TIME: 1.00 PM</p>
                <p class="mb-1 fw400 fz90">BENEFITS: FOOD AND DRINKS</p>
                <p class="mb-1 fw400 fz90">DESCRIPTIONS: </p>
                <div>
                    <button class="btn btn-success float-end mt-2" onclick="showSuccessMessage()">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        Quick Apply
                    </button>
                </div>
                <!-- Messages -->
                <div id="success-message">Program successfully applied</div>
                <div id="wishlist-message">Program added to wishlist</div>
            </div>
        </div>
    </div>
</body>

</html>
@endsection
