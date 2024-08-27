<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Profile | {{ $data[0]->fname }}</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Hello, world!</title>

    <style>
        span{
            font-weight: bold
        }
    </style>
  </head>
  <body>

        <div class="container">
            <hr>
                <h3 class="text-center">TIGER MUAY THAI CAMP</h3>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <p><span>Name</span> : {{ $data[0]->fname }}</p>
                    <p><span>ID</span> : {{ $data[0]->m_card }}</p>
                    <p><span>Visa | Passport </span>: {{ $data[0]->p_visa }}</p>
                    <p><span>Email</span> : {{ $data[0]->email }}</p>
                    <p><span>Phone</span> : {{ $data[0]->phone }}</p>
                    <p><span>Nationality</span> : {{ $data[0]->nationalty }}</p>
                    <p><span>Birth day</span> : {{ date("d-m-Y",strtotime($data[0]->birthday)) }}</p>
                    <p><span>Emergency contact</span> : {{ $data[0]->emergency }}</p>
                    <p><span>Type Of Trinning</span> : {{ $data[0]->type_training }}</p>
                    <p><span>Type Of Fighter</span> : {{ $data[0]->type_fighter }}</p>
                    <p><span>Commission</span> : {{ $data[0]->commission }}</p>
                    <p><span>Meal Plan</span> : {{ $data[0]->mealplan_month }}</p>
                    <p><span>Start Trinning : </span> {{ date("d-m-Y",strtotime($data[0]->sta_date)) }}</p>
                    <p><span>Expire Training : </span> {{ date("d-m-y",strtotime($data[0]->exp_date)) }}</p>
                </div>
                <div class="col-md-6 text-center">
                    <img src="{{ asset('images/new_spider-man.png') }}" alt="new_spider-man.png" height="35%">
                </div>
            </div>

        </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  </body>
</html>

<script>
    window.print(); // สั่งให้พิมพ์หน้าเว็บ
    // หลังจากที่ผู้ใช้พิมพ์เสร็จ หรือยกเลิกการพิมพ์
    window.onafterprint = function() {
        window.history.back(); // กลับไปยังหน้าเดิม
    };
</script>
