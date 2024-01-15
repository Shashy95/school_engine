  <script>
        $(document).ready(function () {
            showGraph();
        });


        function showGraph()
        {
            {
                $.post("data.php",
                function (data)
                {
                    console.log(data);
                     var level = [];
                    var marks = [];

                    for (var i in data) {
                       en_level.push(data[i].en_level);
                       COUNT(en_level).push(data[i].COUNT(en_level));
                    }

                    var chartdata = {
                        labels: en_level,
                        datasets: [
                            {
                                label: 'COUNT(en_level)',
                                backgroundColor: '#49e2ff',
                                borderColor: '#46d5f1',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                data: COUNT(en_level)
                            }
                        ]
                    };

                    var graphTarget = $("#myAreaChart");

                    var barGraph = new Chart(graphTarget, {
                        type: 'bar',
                        data: chartdata
                    });
                });
            }
        }
        </script>
