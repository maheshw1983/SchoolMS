@extends('layout')

@section('content')
    <div class="container-fluid">

        <div class="col-12 row">
            <div class="col-3">
                <br>
                <br>
                <h3>List of Events</h3>
                <br>
                <?php
                $events = \App\Sport::all();
                ?>

                <table class="col-12">
                    <tr>
                        <th>ID</th>
                        <th>Event Name</th>
                    </tr>

                    @foreach($events as $event)

                        <tr>
                            <td>{{$event->id}}</td>
                            <td>{{$event->title}}</td>
                        </tr>

                    @endforeach


                </table>
            </div>

            <div class="container col-9">

                <h1>Sports Information</h1>
                <br>
                <canvas id="myChart"></canvas>
            </div>

            <?php
            $dates = array();
            $name = array();
            $id1 = array();
            $count = array();
            $male = array();
            $female = array();

            $sql = \Illuminate\Support\Facades\DB::table('sport_user')->get();

            $socs = \App\Sport::all();


            foreach ($socs as $row) {

                $q = \Illuminate\Support\Facades\DB::table('sport_user')->where('sport_id' , $row->id )->get();

//                dd($q);
                $count[] = sizeof($q);
                $id1[] = $row['id'];
                $name[] = $row['title'];
                $revenues[] = $row['sport_id'];
//                $revenues[] = $row['sport_id'];
//                $dates[] = "" . date('M Y', strtotime($row['from_date']));

            }


            $counts = implode(",", $count);
//            $dates = implode(",", $dates);
            $names = implode(",", $name);
            $revenues = implode(",", $revenues);
            $idss = implode(",", $id1);

            //            dd($counts);

            ?>


            <script>
                myChart = document.getElementById('myChart').getContext('2d');
                var datas = {
                    datasets: [{
                        data: [<?php echo $counts ?>],
                        backgroundColor: 'rgba(169, 92, 115, 0.2)',
                        borderColor: "#a39",
                        // Changes this dataset to become a line
                        //type: 'line',
                        borderWidth: 5,
                        label: 'Enrolled Students' // for legend
                    },
//                        {
//                        data: [2 , 4, 5, 3, 5 ,2, 3],
//                        backgroundColor: 'transparent',
//                        borderColor: "#39a",
//                        borderWidth: 5,
//                        label: 'Expense' // for legend
//                    }
                    ],
                    labels: [
//                    'a' , 'b' , 'c' , 'd' , 'e' , 'f'
                        <?php
                        echo $idss;
                        ?>
                    ]
                };

                massPopChart = new Chart(myChart, {

                        type: 'bar',
                        data: datas,
                        options: {
                            legend: {
                                display: true,
                                position: 'left',
                                labels: {
                                    fontColor: 'black'
                                    //fontColor: 'rgb(255, 99, 132)'
                                }
                            },
                            tooltips: {
                                mode: 'index'
                            },
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }],
                                xAxes: [{
                                    ticks: {
                                        autoskip: true,
                                        maxTicksLimit: 6
                                    }
                                }]
                            }
                        }
                    }
                );


            </script>

        </div>

        <div class="col-12 row container-fluid" style="margin: 5%">


            <?php
            $count = 0;

            $male = array();
            $female = array();

            $m=0;
            $f=0;


            $sql1 = \App\Sport::all();

            foreach($sql1 as $row ){

            $count = 2;

            $q = \Illuminate\Support\Facades\DB::table('sport_user')->where('sport_id', $row->id)->get();

            foreach ($q as $q1) {


                $userid = $q1->user_id;
                $user = \App\User::find($userid);

                if ($user->gender == 'Male')
                    $m = $m + 1;
                else
                    $f = $f + 1;

            }


            $male[] = $m;
            $female[] = $f;



            $id = $row['id'];
            $name = $row['title'];
            $date = date('M, Y', strtotime($row['from_date']));

            //            "".date('M Y', strtotime( $row['from_date']));


            $malee = implode(",", $male);
            $femalee = implode(",", $female);
            //            $bothh = implode(",", $both);

            //                dd($female);
            ?>

            <div style="height:360px; width:360px; margin-top:60px; float:left;">
                <h3 align="center"><?php echo $name; ?></h3>

                <canvas id="Chart_<?php echo $id; ?>" ></canvas>
            </div>

            <script>

                var ctx = document.getElementById("Chart_<?php echo $id; ?>");
                //for bar, line

                    <?php if($count % 2 == 1 ){ ?>
                var data = {
                        datasets: [{
                            data: [<?php echo $malee; ?>],
                            backgroundColor: ["#455C73"],
                            label: 'Male' // for legend
                        }, {
                            data: [<?php echo $femalee; ?>],
                            backgroundColor: ["#9B59B6"],
                            label: 'Female' // for legend
                        }],
                        labels: ["<?php echo $name; ?>"]
                    };
                <?php }else{ ?>
                //for pie, doughnut
                var data = {
                    datasets: [{
                        data: [<?php echo $malee; ?>, <?php echo $femalee; ?>],
                        backgroundColor: ["#455C73", "#9B59B6"]
                    }],
                    labels: ["Male", "Female"]
                };
                    <?php }?>

                var myChart = new Chart(ctx, {
                        data: data,
                        type:'bar',

                        options: {
                            legend: {
                                display: true,
                                position: 'left',
                                labels: {
                                    fontColor: 'black'
                                    //fontColor: 'rgb(255, 99, 132)'
                                }
                            },
                            labels: {
                                fontColor: 'rgb(255, 99, 132)'
                            }
                            <?php if($count % 2 == 0){ ?>
                            ,
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }],
                                xAxes: [{
                                    ticks: {
                                        autoskip: true,
                                        maxTicksLimit: 6
                                    }
                                }]
                            }

                            <?php } ?>

                        }
                    });

            </script>

            <?php } ?>
        </div>

    </div>
@endsection