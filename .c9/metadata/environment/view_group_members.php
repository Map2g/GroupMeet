{"filter":false,"title":"view_group_members.php","tooltip":"/view_group_members.php","undoManager":{"mark":98,"position":98,"stack":[[{"start":{"row":0,"column":0},"end":{"row":14,"column":2},"action":"insert","lines":["<?php ","","include(\"config.php\");","","//Know which user's events to pull. Will we choose this based on session ID or cookies?","$username = $_POST['userID'];","","$sql = \"SELECT GrpEventName, GrpEventDescription, GrpEventDate, GrpEventTime ","        FROM GroupEvent ","        WHERE GroupID=50\";             //50 is placeholder for testing ","","","//GroupMeet HTML template","$title = 'My Schedule'; include(\"top.php\");","?>"],"id":1}],[{"start":{"row":8,"column":13},"end":{"row":8,"column":24},"action":"remove","lines":["GroupEvent "],"id":2},{"start":{"row":8,"column":13},"end":{"row":8,"column":14},"action":"insert","lines":["G"]},{"start":{"row":8,"column":14},"end":{"row":8,"column":15},"action":"insert","lines":["r"]},{"start":{"row":8,"column":15},"end":{"row":8,"column":16},"action":"insert","lines":["o"]},{"start":{"row":8,"column":16},"end":{"row":8,"column":17},"action":"insert","lines":["u"]},{"start":{"row":8,"column":17},"end":{"row":8,"column":18},"action":"insert","lines":["p"]},{"start":{"row":8,"column":18},"end":{"row":8,"column":19},"action":"insert","lines":["s"]}],[{"start":{"row":8,"column":19},"end":{"row":8,"column":20},"action":"insert","lines":[" "],"id":3},{"start":{"row":8,"column":20},"end":{"row":8,"column":21},"action":"insert","lines":["N"]},{"start":{"row":8,"column":21},"end":{"row":8,"column":22},"action":"insert","lines":["A"]},{"start":{"row":8,"column":22},"end":{"row":8,"column":23},"action":"insert","lines":["T"]},{"start":{"row":8,"column":23},"end":{"row":8,"column":24},"action":"insert","lines":["U"]},{"start":{"row":8,"column":24},"end":{"row":8,"column":25},"action":"insert","lines":["R"]},{"start":{"row":8,"column":25},"end":{"row":8,"column":26},"action":"insert","lines":["A"]},{"start":{"row":8,"column":26},"end":{"row":8,"column":27},"action":"insert","lines":["L"]}],[{"start":{"row":8,"column":27},"end":{"row":8,"column":28},"action":"insert","lines":[" "],"id":4},{"start":{"row":8,"column":28},"end":{"row":8,"column":29},"action":"insert","lines":["J"]},{"start":{"row":8,"column":29},"end":{"row":8,"column":30},"action":"insert","lines":["O"]},{"start":{"row":8,"column":30},"end":{"row":8,"column":31},"action":"insert","lines":["I"]},{"start":{"row":8,"column":31},"end":{"row":8,"column":32},"action":"insert","lines":["N"]}],[{"start":{"row":8,"column":32},"end":{"row":8,"column":33},"action":"insert","lines":[" "],"id":5},{"start":{"row":8,"column":33},"end":{"row":8,"column":34},"action":"insert","lines":["U"]},{"start":{"row":8,"column":34},"end":{"row":8,"column":35},"action":"insert","lines":["s"]}],[{"start":{"row":8,"column":35},"end":{"row":8,"column":36},"action":"insert","lines":["e"],"id":6},{"start":{"row":8,"column":36},"end":{"row":8,"column":37},"action":"insert","lines":["r"]},{"start":{"row":8,"column":37},"end":{"row":8,"column":38},"action":"insert","lines":["s"]}],[{"start":{"row":7,"column":15},"end":{"row":7,"column":27},"action":"remove","lines":["GrpEventName"],"id":7},{"start":{"row":7,"column":15},"end":{"row":7,"column":16},"action":"insert","lines":["U"]},{"start":{"row":7,"column":16},"end":{"row":7,"column":17},"action":"insert","lines":["a"]},{"start":{"row":7,"column":17},"end":{"row":7,"column":18},"action":"insert","lines":["s"]}],[{"start":{"row":7,"column":17},"end":{"row":7,"column":18},"action":"remove","lines":["s"],"id":8},{"start":{"row":7,"column":16},"end":{"row":7,"column":17},"action":"remove","lines":["a"]}],[{"start":{"row":7,"column":16},"end":{"row":7,"column":17},"action":"insert","lines":["s"],"id":9},{"start":{"row":7,"column":17},"end":{"row":7,"column":18},"action":"insert","lines":["e"]},{"start":{"row":7,"column":18},"end":{"row":7,"column":19},"action":"insert","lines":["r"]},{"start":{"row":7,"column":19},"end":{"row":7,"column":20},"action":"insert","lines":["s"]},{"start":{"row":7,"column":20},"end":{"row":7,"column":21},"action":"insert","lines":["."]}],[{"start":{"row":7,"column":21},"end":{"row":7,"column":22},"action":"insert","lines":["f"],"id":10},{"start":{"row":7,"column":22},"end":{"row":7,"column":23},"action":"insert","lines":["i"]},{"start":{"row":7,"column":23},"end":{"row":7,"column":24},"action":"insert","lines":["r"]},{"start":{"row":7,"column":24},"end":{"row":7,"column":25},"action":"insert","lines":["s"]},{"start":{"row":7,"column":25},"end":{"row":7,"column":26},"action":"insert","lines":["t"]},{"start":{"row":7,"column":26},"end":{"row":7,"column":27},"action":"insert","lines":["_"]},{"start":{"row":7,"column":27},"end":{"row":7,"column":28},"action":"insert","lines":["n"]}],[{"start":{"row":7,"column":28},"end":{"row":7,"column":29},"action":"insert","lines":["a"],"id":11},{"start":{"row":7,"column":29},"end":{"row":7,"column":30},"action":"insert","lines":["m"]},{"start":{"row":7,"column":30},"end":{"row":7,"column":31},"action":"insert","lines":["e"]}],[{"start":{"row":7,"column":33},"end":{"row":7,"column":52},"action":"remove","lines":["GrpEventDescription"],"id":12},{"start":{"row":7,"column":33},"end":{"row":7,"column":34},"action":"insert","lines":["U"]},{"start":{"row":7,"column":34},"end":{"row":7,"column":35},"action":"insert","lines":["s"]},{"start":{"row":7,"column":35},"end":{"row":7,"column":36},"action":"insert","lines":["e"]},{"start":{"row":7,"column":36},"end":{"row":7,"column":37},"action":"insert","lines":["r"]},{"start":{"row":7,"column":37},"end":{"row":7,"column":38},"action":"insert","lines":["s"]},{"start":{"row":7,"column":38},"end":{"row":7,"column":39},"action":"insert","lines":["."]}],[{"start":{"row":7,"column":39},"end":{"row":7,"column":40},"action":"insert","lines":["l"],"id":13},{"start":{"row":7,"column":40},"end":{"row":7,"column":41},"action":"insert","lines":["a"]},{"start":{"row":7,"column":41},"end":{"row":7,"column":42},"action":"insert","lines":["s"]},{"start":{"row":7,"column":42},"end":{"row":7,"column":43},"action":"insert","lines":["t"]},{"start":{"row":7,"column":43},"end":{"row":7,"column":44},"action":"insert","lines":["_"]}],[{"start":{"row":7,"column":44},"end":{"row":7,"column":45},"action":"insert","lines":["n"],"id":14},{"start":{"row":7,"column":45},"end":{"row":7,"column":46},"action":"insert","lines":["a"]},{"start":{"row":7,"column":46},"end":{"row":7,"column":47},"action":"insert","lines":["m"]},{"start":{"row":7,"column":47},"end":{"row":7,"column":48},"action":"insert","lines":["e"]}],[{"start":{"row":8,"column":13},"end":{"row":8,"column":19},"action":"remove","lines":["Groups"],"id":15},{"start":{"row":8,"column":13},"end":{"row":8,"column":14},"action":"insert","lines":["U"]},{"start":{"row":8,"column":14},"end":{"row":8,"column":15},"action":"insert","lines":["s"]},{"start":{"row":8,"column":15},"end":{"row":8,"column":16},"action":"insert","lines":["e"]},{"start":{"row":8,"column":16},"end":{"row":8,"column":17},"action":"insert","lines":["r"]},{"start":{"row":8,"column":17},"end":{"row":8,"column":18},"action":"insert","lines":["s"]}],[{"start":{"row":8,"column":36},"end":{"row":8,"column":37},"action":"remove","lines":["s"],"id":16},{"start":{"row":8,"column":35},"end":{"row":8,"column":36},"action":"remove","lines":["r"]},{"start":{"row":8,"column":34},"end":{"row":8,"column":35},"action":"remove","lines":["e"]},{"start":{"row":8,"column":33},"end":{"row":8,"column":34},"action":"remove","lines":["s"]},{"start":{"row":8,"column":32},"end":{"row":8,"column":33},"action":"remove","lines":["U"]}],[{"start":{"row":8,"column":32},"end":{"row":8,"column":33},"action":"insert","lines":["U"],"id":17},{"start":{"row":8,"column":33},"end":{"row":8,"column":34},"action":"insert","lines":["s"]},{"start":{"row":8,"column":34},"end":{"row":8,"column":35},"action":"insert","lines":["e"]},{"start":{"row":8,"column":35},"end":{"row":8,"column":36},"action":"insert","lines":["r"]},{"start":{"row":8,"column":36},"end":{"row":8,"column":37},"action":"insert","lines":["s"]}],[{"start":{"row":8,"column":37},"end":{"row":8,"column":38},"action":"insert","lines":["_"],"id":18},{"start":{"row":8,"column":38},"end":{"row":8,"column":39},"action":"insert","lines":["G"]},{"start":{"row":8,"column":39},"end":{"row":8,"column":40},"action":"insert","lines":["r"]},{"start":{"row":8,"column":40},"end":{"row":8,"column":41},"action":"insert","lines":["o"]},{"start":{"row":8,"column":41},"end":{"row":8,"column":42},"action":"insert","lines":["u"]},{"start":{"row":8,"column":42},"end":{"row":8,"column":43},"action":"insert","lines":["p"]}],[{"start":{"row":7,"column":49},"end":{"row":7,"column":77},"action":"remove","lines":[" GrpEventDate, GrpEventTime "],"id":19},{"start":{"row":7,"column":48},"end":{"row":7,"column":49},"action":"remove","lines":[","]}],[{"start":{"row":13,"column":10},"end":{"row":13,"column":21},"action":"remove","lines":["My Schedule"],"id":20},{"start":{"row":13,"column":10},"end":{"row":13,"column":11},"action":"insert","lines":["G"]},{"start":{"row":13,"column":11},"end":{"row":13,"column":12},"action":"insert","lines":["r"]},{"start":{"row":13,"column":12},"end":{"row":13,"column":13},"action":"insert","lines":["o"]},{"start":{"row":13,"column":13},"end":{"row":13,"column":14},"action":"insert","lines":["u"]},{"start":{"row":13,"column":14},"end":{"row":13,"column":15},"action":"insert","lines":["p"]}],[{"start":{"row":13,"column":15},"end":{"row":13,"column":16},"action":"insert","lines":[" "],"id":21},{"start":{"row":13,"column":16},"end":{"row":13,"column":17},"action":"insert","lines":["M"]},{"start":{"row":13,"column":17},"end":{"row":13,"column":18},"action":"insert","lines":["e"]},{"start":{"row":13,"column":18},"end":{"row":13,"column":19},"action":"insert","lines":["m"]},{"start":{"row":13,"column":19},"end":{"row":13,"column":20},"action":"insert","lines":["e"]}],[{"start":{"row":13,"column":19},"end":{"row":13,"column":20},"action":"remove","lines":["e"],"id":22}],[{"start":{"row":13,"column":19},"end":{"row":13,"column":20},"action":"insert","lines":["b"],"id":23},{"start":{"row":13,"column":20},"end":{"row":13,"column":21},"action":"insert","lines":["e"]},{"start":{"row":13,"column":21},"end":{"row":13,"column":22},"action":"insert","lines":["r"]},{"start":{"row":13,"column":22},"end":{"row":13,"column":23},"action":"insert","lines":["s"]}],[{"start":{"row":14,"column":2},"end":{"row":15,"column":0},"action":"insert","lines":["",""],"id":24},{"start":{"row":15,"column":0},"end":{"row":16,"column":0},"action":"insert","lines":["",""]}],[{"start":{"row":15,"column":0},"end":{"row":16,"column":0},"action":"insert","lines":["",""],"id":25}],[{"start":{"row":16,"column":0},"end":{"row":42,"column":19},"action":"insert","lines":[" <div class=\"events-wrapper\">","                ","                <?php","                ","                //$result = mysqli_query($conn, $sqlAll);","","                if (mysqli_num_rows($resultAll) > 0) {","                    $row = mysqli_fetch_assoc($resultAll);","                    while($row) {","                        $eDate = $row[\"EventDate\"];","                        $eTime = $row[\"EventTime\"];","                      echo '<div class=\"event\">","                                <h4 class=\"event__point\">' . $row[\"EventName\"] .  '</h4>","                                <span class=\"event__duration\">'. $eDate . ' ' . $eTime . '</span>","                                <p class=\"event__description\">'. $row[\"EventDesc\"] . '</p>","                            </div>';","","                      $row = mysqli_fetch_assoc($resultAll);","                    }","                } else {","                    echo \"You have no events planned!\";","                    }","    ","               mysqli_close($conn);","               ?>","               ","             </div>"],"id":26}],[{"start":{"row":20,"column":17},"end":{"row":20,"column":18},"action":"remove","lines":["/"],"id":27},{"start":{"row":20,"column":16},"end":{"row":20,"column":17},"action":"remove","lines":["/"]}],[{"start":{"row":20,"column":16},"end":{"row":20,"column":55},"action":"remove","lines":["$result = mysqli_query($conn, $sqlAll);"],"id":28},{"start":{"row":20,"column":16},"end":{"row":20,"column":52},"action":"insert","lines":["$result = mysqli_query($conn, $sql);"]}],[{"start":{"row":23,"column":55},"end":{"row":23,"column":56},"action":"remove","lines":["l"],"id":29},{"start":{"row":23,"column":54},"end":{"row":23,"column":55},"action":"remove","lines":["l"]},{"start":{"row":23,"column":53},"end":{"row":23,"column":54},"action":"remove","lines":["A"]}],[{"start":{"row":22,"column":45},"end":{"row":22,"column":46},"action":"remove","lines":["l"],"id":30},{"start":{"row":22,"column":44},"end":{"row":22,"column":45},"action":"remove","lines":["l"]},{"start":{"row":22,"column":43},"end":{"row":22,"column":44},"action":"remove","lines":["A"]}],[{"start":{"row":25,"column":0},"end":{"row":26,"column":51},"action":"remove","lines":["                        $eDate = $row[\"EventDate\"];","                        $eTime = $row[\"EventTime\"];"],"id":31},{"start":{"row":24,"column":33},"end":{"row":25,"column":0},"action":"remove","lines":["",""]}],[{"start":{"row":26,"column":0},"end":{"row":27,"column":97},"action":"remove","lines":["                                <h4 class=\"event__point\">' . $row[\"EventName\"] .  '</h4>","                                <span class=\"event__duration\">'. $eDate . ' ' . $eTime . '</span>"],"id":32},{"start":{"row":25,"column":47},"end":{"row":26,"column":0},"action":"remove","lines":["",""]}],[{"start":{"row":26,"column":71},"end":{"row":26,"column":80},"action":"remove","lines":["EventDesc"],"id":33},{"start":{"row":26,"column":71},"end":{"row":26,"column":72},"action":"insert","lines":["U"]},{"start":{"row":26,"column":72},"end":{"row":26,"column":73},"action":"insert","lines":["s"]},{"start":{"row":26,"column":73},"end":{"row":26,"column":74},"action":"insert","lines":["e"]},{"start":{"row":26,"column":74},"end":{"row":26,"column":75},"action":"insert","lines":["r"]},{"start":{"row":26,"column":75},"end":{"row":26,"column":76},"action":"insert","lines":["s"]},{"start":{"row":26,"column":76},"end":{"row":26,"column":77},"action":"insert","lines":["."]},{"start":{"row":26,"column":77},"end":{"row":26,"column":78},"action":"insert","lines":["f"]},{"start":{"row":26,"column":78},"end":{"row":26,"column":79},"action":"insert","lines":["i"]},{"start":{"row":26,"column":79},"end":{"row":26,"column":80},"action":"insert","lines":["r"]}],[{"start":{"row":26,"column":80},"end":{"row":26,"column":81},"action":"insert","lines":["s"],"id":34}],[{"start":{"row":26,"column":80},"end":{"row":26,"column":81},"action":"remove","lines":["s"],"id":35},{"start":{"row":26,"column":79},"end":{"row":26,"column":80},"action":"remove","lines":["r"]},{"start":{"row":26,"column":78},"end":{"row":26,"column":79},"action":"remove","lines":["i"]},{"start":{"row":26,"column":77},"end":{"row":26,"column":78},"action":"remove","lines":["f"]},{"start":{"row":26,"column":76},"end":{"row":26,"column":77},"action":"remove","lines":["."]},{"start":{"row":26,"column":75},"end":{"row":26,"column":76},"action":"remove","lines":["s"]},{"start":{"row":26,"column":74},"end":{"row":26,"column":75},"action":"remove","lines":["r"]},{"start":{"row":26,"column":73},"end":{"row":26,"column":74},"action":"remove","lines":["e"]},{"start":{"row":26,"column":72},"end":{"row":26,"column":73},"action":"remove","lines":["s"]},{"start":{"row":26,"column":71},"end":{"row":26,"column":72},"action":"remove","lines":["U"]}],[{"start":{"row":26,"column":71},"end":{"row":26,"column":72},"action":"insert","lines":["U"],"id":36},{"start":{"row":26,"column":72},"end":{"row":26,"column":73},"action":"insert","lines":["s"]},{"start":{"row":26,"column":73},"end":{"row":26,"column":74},"action":"insert","lines":["e"]},{"start":{"row":26,"column":74},"end":{"row":26,"column":75},"action":"insert","lines":["r"]},{"start":{"row":26,"column":75},"end":{"row":26,"column":76},"action":"insert","lines":["s"]},{"start":{"row":26,"column":76},"end":{"row":26,"column":77},"action":"insert","lines":["."]},{"start":{"row":26,"column":77},"end":{"row":26,"column":78},"action":"insert","lines":["f"]},{"start":{"row":26,"column":78},"end":{"row":26,"column":79},"action":"insert","lines":["i"]},{"start":{"row":26,"column":79},"end":{"row":26,"column":80},"action":"insert","lines":["r"]},{"start":{"row":26,"column":80},"end":{"row":26,"column":81},"action":"insert","lines":["s"]}],[{"start":{"row":26,"column":81},"end":{"row":26,"column":82},"action":"insert","lines":["t"],"id":37},{"start":{"row":26,"column":82},"end":{"row":26,"column":83},"action":"insert","lines":["_"]},{"start":{"row":26,"column":83},"end":{"row":26,"column":84},"action":"insert","lines":["n"]},{"start":{"row":26,"column":84},"end":{"row":26,"column":85},"action":"insert","lines":["a"]},{"start":{"row":26,"column":85},"end":{"row":26,"column":86},"action":"insert","lines":["m"]},{"start":{"row":26,"column":86},"end":{"row":26,"column":87},"action":"insert","lines":["e"]}],[{"start":{"row":26,"column":91},"end":{"row":26,"column":92},"action":"insert","lines":[" "],"id":38}],[{"start":{"row":26,"column":92},"end":{"row":26,"column":93},"action":"insert","lines":["$"],"id":39}],[{"start":{"row":26,"column":92},"end":{"row":26,"column":93},"action":"remove","lines":["$"],"id":40}],[{"start":{"row":26,"column":92},"end":{"row":26,"column":94},"action":"insert","lines":["\"\""],"id":41}],[{"start":{"row":26,"column":94},"end":{"row":26,"column":95},"action":"insert","lines":[" "],"id":42},{"start":{"row":26,"column":95},"end":{"row":26,"column":96},"action":"insert","lines":["."]}],[{"start":{"row":26,"column":96},"end":{"row":26,"column":97},"action":"insert","lines":[" "],"id":43}],[{"start":{"row":26,"column":97},"end":{"row":26,"column":98},"action":"insert","lines":["r"],"id":44},{"start":{"row":26,"column":98},"end":{"row":26,"column":99},"action":"insert","lines":["o"]},{"start":{"row":26,"column":99},"end":{"row":26,"column":100},"action":"insert","lines":["w"]}],[{"start":{"row":26,"column":99},"end":{"row":26,"column":100},"action":"remove","lines":["w"],"id":45},{"start":{"row":26,"column":98},"end":{"row":26,"column":99},"action":"remove","lines":["o"]},{"start":{"row":26,"column":97},"end":{"row":26,"column":98},"action":"remove","lines":["r"]}],[{"start":{"row":26,"column":97},"end":{"row":26,"column":98},"action":"insert","lines":["$"],"id":46},{"start":{"row":26,"column":98},"end":{"row":26,"column":99},"action":"insert","lines":["r"]},{"start":{"row":26,"column":99},"end":{"row":26,"column":100},"action":"insert","lines":["o"]},{"start":{"row":26,"column":100},"end":{"row":26,"column":101},"action":"insert","lines":["w"]}],[{"start":{"row":26,"column":101},"end":{"row":26,"column":103},"action":"insert","lines":["[]"],"id":47}],[{"start":{"row":26,"column":102},"end":{"row":26,"column":103},"action":"insert","lines":["U"],"id":48},{"start":{"row":26,"column":103},"end":{"row":26,"column":104},"action":"insert","lines":["s"]},{"start":{"row":26,"column":104},"end":{"row":26,"column":105},"action":"insert","lines":["e"]},{"start":{"row":26,"column":105},"end":{"row":26,"column":106},"action":"insert","lines":["r"]},{"start":{"row":26,"column":106},"end":{"row":26,"column":107},"action":"insert","lines":["s"]},{"start":{"row":26,"column":107},"end":{"row":26,"column":108},"action":"insert","lines":["."]},{"start":{"row":26,"column":108},"end":{"row":26,"column":109},"action":"insert","lines":["L"]},{"start":{"row":26,"column":109},"end":{"row":26,"column":110},"action":"insert","lines":["A"]},{"start":{"row":26,"column":110},"end":{"row":26,"column":111},"action":"insert","lines":["s"]}],[{"start":{"row":26,"column":111},"end":{"row":26,"column":112},"action":"insert","lines":["t"],"id":49}],[{"start":{"row":26,"column":111},"end":{"row":26,"column":112},"action":"remove","lines":["t"],"id":50},{"start":{"row":26,"column":110},"end":{"row":26,"column":111},"action":"remove","lines":["s"]},{"start":{"row":26,"column":109},"end":{"row":26,"column":110},"action":"remove","lines":["A"]},{"start":{"row":26,"column":108},"end":{"row":26,"column":109},"action":"remove","lines":["L"]}],[{"start":{"row":26,"column":108},"end":{"row":26,"column":109},"action":"insert","lines":["l"],"id":51},{"start":{"row":26,"column":109},"end":{"row":26,"column":110},"action":"insert","lines":["a"]},{"start":{"row":26,"column":110},"end":{"row":26,"column":111},"action":"insert","lines":["s"]},{"start":{"row":26,"column":111},"end":{"row":26,"column":112},"action":"insert","lines":["t"]},{"start":{"row":26,"column":112},"end":{"row":26,"column":113},"action":"insert","lines":["_"]},{"start":{"row":26,"column":113},"end":{"row":26,"column":114},"action":"insert","lines":["n"]},{"start":{"row":26,"column":114},"end":{"row":26,"column":115},"action":"insert","lines":["a"]}],[{"start":{"row":26,"column":115},"end":{"row":26,"column":116},"action":"insert","lines":["e"],"id":52},{"start":{"row":26,"column":116},"end":{"row":26,"column":117},"action":"insert","lines":["m"]}],[{"start":{"row":26,"column":116},"end":{"row":26,"column":117},"action":"remove","lines":["m"],"id":53},{"start":{"row":26,"column":115},"end":{"row":26,"column":116},"action":"remove","lines":["e"]},{"start":{"row":26,"column":114},"end":{"row":26,"column":115},"action":"remove","lines":["a"]},{"start":{"row":26,"column":113},"end":{"row":26,"column":114},"action":"remove","lines":["n"]},{"start":{"row":26,"column":112},"end":{"row":26,"column":113},"action":"remove","lines":["_"]},{"start":{"row":26,"column":111},"end":{"row":26,"column":112},"action":"remove","lines":["t"]},{"start":{"row":26,"column":110},"end":{"row":26,"column":111},"action":"remove","lines":["s"]},{"start":{"row":26,"column":109},"end":{"row":26,"column":110},"action":"remove","lines":["a"]},{"start":{"row":26,"column":108},"end":{"row":26,"column":109},"action":"remove","lines":["l"]},{"start":{"row":26,"column":107},"end":{"row":26,"column":108},"action":"remove","lines":["."]},{"start":{"row":26,"column":106},"end":{"row":26,"column":107},"action":"remove","lines":["s"]},{"start":{"row":26,"column":105},"end":{"row":26,"column":106},"action":"remove","lines":["r"]},{"start":{"row":26,"column":104},"end":{"row":26,"column":105},"action":"remove","lines":["e"]}],[{"start":{"row":26,"column":103},"end":{"row":26,"column":104},"action":"remove","lines":["s"],"id":54},{"start":{"row":26,"column":102},"end":{"row":26,"column":103},"action":"remove","lines":["U"]}],[{"start":{"row":26,"column":102},"end":{"row":26,"column":104},"action":"insert","lines":["\"\""],"id":55}],[{"start":{"row":26,"column":103},"end":{"row":26,"column":104},"action":"insert","lines":["U"],"id":56},{"start":{"row":26,"column":104},"end":{"row":26,"column":105},"action":"insert","lines":["s"]},{"start":{"row":26,"column":105},"end":{"row":26,"column":106},"action":"insert","lines":["e"]},{"start":{"row":26,"column":106},"end":{"row":26,"column":107},"action":"insert","lines":["r"]},{"start":{"row":26,"column":107},"end":{"row":26,"column":108},"action":"insert","lines":["s"]},{"start":{"row":26,"column":108},"end":{"row":26,"column":109},"action":"insert","lines":["."]},{"start":{"row":26,"column":109},"end":{"row":26,"column":110},"action":"insert","lines":["l"]},{"start":{"row":26,"column":110},"end":{"row":26,"column":111},"action":"insert","lines":["a"]}],[{"start":{"row":26,"column":111},"end":{"row":26,"column":112},"action":"insert","lines":["s"],"id":57},{"start":{"row":26,"column":112},"end":{"row":26,"column":113},"action":"insert","lines":["t"]},{"start":{"row":26,"column":113},"end":{"row":26,"column":114},"action":"insert","lines":["_"]},{"start":{"row":26,"column":114},"end":{"row":26,"column":115},"action":"insert","lines":["n"]},{"start":{"row":26,"column":115},"end":{"row":26,"column":116},"action":"insert","lines":["a"]},{"start":{"row":26,"column":116},"end":{"row":26,"column":117},"action":"insert","lines":["m"]},{"start":{"row":26,"column":117},"end":{"row":26,"column":118},"action":"insert","lines":["e"]}],[{"start":{"row":26,"column":120},"end":{"row":26,"column":121},"action":"insert","lines":[" "],"id":58},{"start":{"row":26,"column":121},"end":{"row":26,"column":122},"action":"insert","lines":["."]}],[{"start":{"row":29,"column":57},"end":{"row":29,"column":58},"action":"remove","lines":["l"],"id":59},{"start":{"row":29,"column":56},"end":{"row":29,"column":57},"action":"remove","lines":["l"]},{"start":{"row":29,"column":55},"end":{"row":29,"column":56},"action":"remove","lines":["A"]}],[{"start":{"row":32,"column":30},"end":{"row":32,"column":53},"action":"remove","lines":["have no events planned!"],"id":60},{"start":{"row":32,"column":30},"end":{"row":32,"column":31},"action":"insert","lines":["f"]},{"start":{"row":32,"column":31},"end":{"row":32,"column":32},"action":"insert","lines":["a"]},{"start":{"row":32,"column":32},"end":{"row":32,"column":33},"action":"insert","lines":["i"]},{"start":{"row":32,"column":33},"end":{"row":32,"column":34},"action":"insert","lines":["l"]},{"start":{"row":32,"column":34},"end":{"row":32,"column":35},"action":"insert","lines":["e"]},{"start":{"row":32,"column":35},"end":{"row":32,"column":36},"action":"insert","lines":["d"]},{"start":{"row":32,"column":36},"end":{"row":32,"column":37},"action":"insert","lines":["!"]}],[{"start":{"row":38,"column":19},"end":{"row":39,"column":0},"action":"insert","lines":["",""],"id":61},{"start":{"row":39,"column":0},"end":{"row":39,"column":13},"action":"insert","lines":["             "]},{"start":{"row":39,"column":13},"end":{"row":40,"column":0},"action":"insert","lines":["",""]},{"start":{"row":40,"column":0},"end":{"row":40,"column":13},"action":"insert","lines":["             "]}],[{"start":{"row":40,"column":13},"end":{"row":41,"column":30},"action":"insert","lines":["<!--Rest of html template-->","<?php include(\"bottom.php\");?>"],"id":62}],[{"start":{"row":40,"column":12},"end":{"row":40,"column":13},"action":"remove","lines":[" "],"id":63},{"start":{"row":40,"column":8},"end":{"row":40,"column":12},"action":"remove","lines":["    "]},{"start":{"row":40,"column":4},"end":{"row":40,"column":8},"action":"remove","lines":["    "]},{"start":{"row":40,"column":0},"end":{"row":40,"column":4},"action":"remove","lines":["    "]},{"start":{"row":39,"column":13},"end":{"row":40,"column":0},"action":"remove","lines":["",""]}],[{"start":{"row":39,"column":13},"end":{"row":40,"column":0},"action":"insert","lines":["",""],"id":64},{"start":{"row":40,"column":0},"end":{"row":40,"column":13},"action":"insert","lines":["             "]}],[{"start":{"row":40,"column":12},"end":{"row":40,"column":13},"action":"remove","lines":[" "],"id":65},{"start":{"row":40,"column":8},"end":{"row":40,"column":12},"action":"remove","lines":["    "]},{"start":{"row":40,"column":4},"end":{"row":40,"column":8},"action":"remove","lines":["    "]},{"start":{"row":40,"column":0},"end":{"row":40,"column":4},"action":"remove","lines":["    "]}],[{"start":{"row":9,"column":23},"end":{"row":9,"column":24},"action":"remove","lines":["0"],"id":66},{"start":{"row":9,"column":22},"end":{"row":9,"column":23},"action":"remove","lines":["5"]}],[{"start":{"row":9,"column":22},"end":{"row":9,"column":23},"action":"insert","lines":["3"],"id":67},{"start":{"row":9,"column":23},"end":{"row":9,"column":24},"action":"insert","lines":["1"]}],[{"start":{"row":26,"column":93},"end":{"row":26,"column":94},"action":"remove","lines":["\""],"id":68},{"start":{"row":26,"column":92},"end":{"row":26,"column":93},"action":"remove","lines":["\""]}],[{"start":{"row":26,"column":92},"end":{"row":26,"column":94},"action":"insert","lines":["''"],"id":69}],[{"start":{"row":26,"column":93},"end":{"row":26,"column":94},"action":"insert","lines":[" "],"id":70}],[{"start":{"row":7,"column":20},"end":{"row":7,"column":21},"action":"remove","lines":["."],"id":71},{"start":{"row":7,"column":19},"end":{"row":7,"column":20},"action":"remove","lines":["s"]},{"start":{"row":7,"column":18},"end":{"row":7,"column":19},"action":"remove","lines":["r"]},{"start":{"row":7,"column":17},"end":{"row":7,"column":18},"action":"remove","lines":["e"]},{"start":{"row":7,"column":16},"end":{"row":7,"column":17},"action":"remove","lines":["s"]},{"start":{"row":7,"column":15},"end":{"row":7,"column":16},"action":"remove","lines":["U"]}],[{"start":{"row":7,"column":32},"end":{"row":7,"column":33},"action":"remove","lines":["."],"id":72},{"start":{"row":7,"column":31},"end":{"row":7,"column":32},"action":"remove","lines":["s"]},{"start":{"row":7,"column":30},"end":{"row":7,"column":31},"action":"remove","lines":["r"]},{"start":{"row":7,"column":29},"end":{"row":7,"column":30},"action":"remove","lines":["e"]},{"start":{"row":7,"column":28},"end":{"row":7,"column":29},"action":"remove","lines":["s"]},{"start":{"row":7,"column":27},"end":{"row":7,"column":28},"action":"remove","lines":["U"]}],[{"start":{"row":26,"column":76},"end":{"row":26,"column":77},"action":"remove","lines":["."],"id":73},{"start":{"row":26,"column":75},"end":{"row":26,"column":76},"action":"remove","lines":["s"]},{"start":{"row":26,"column":74},"end":{"row":26,"column":75},"action":"remove","lines":["r"]},{"start":{"row":26,"column":73},"end":{"row":26,"column":74},"action":"remove","lines":["e"]},{"start":{"row":26,"column":72},"end":{"row":26,"column":73},"action":"remove","lines":["s"]},{"start":{"row":26,"column":71},"end":{"row":26,"column":72},"action":"remove","lines":["U"]}],[{"start":{"row":26,"column":103},"end":{"row":26,"column":104},"action":"remove","lines":["."],"id":74},{"start":{"row":26,"column":102},"end":{"row":26,"column":103},"action":"remove","lines":["s"]},{"start":{"row":26,"column":101},"end":{"row":26,"column":102},"action":"remove","lines":["r"]},{"start":{"row":26,"column":100},"end":{"row":26,"column":101},"action":"remove","lines":["e"]},{"start":{"row":26,"column":99},"end":{"row":26,"column":100},"action":"remove","lines":["s"]},{"start":{"row":26,"column":98},"end":{"row":26,"column":99},"action":"remove","lines":["U"]}],[{"start":{"row":8,"column":26},"end":{"row":8,"column":27},"action":"remove","lines":[" "],"id":75},{"start":{"row":8,"column":25},"end":{"row":8,"column":26},"action":"remove","lines":["L"]},{"start":{"row":8,"column":24},"end":{"row":8,"column":25},"action":"remove","lines":["A"]},{"start":{"row":8,"column":23},"end":{"row":8,"column":24},"action":"remove","lines":["R"]},{"start":{"row":8,"column":22},"end":{"row":8,"column":23},"action":"remove","lines":["U"]},{"start":{"row":8,"column":21},"end":{"row":8,"column":22},"action":"remove","lines":["T"]},{"start":{"row":8,"column":20},"end":{"row":8,"column":21},"action":"remove","lines":["A"]},{"start":{"row":8,"column":19},"end":{"row":8,"column":20},"action":"remove","lines":["N"]}],[{"start":{"row":8,"column":35},"end":{"row":8,"column":36},"action":"insert","lines":[" "],"id":76}],[{"start":{"row":8,"column":36},"end":{"row":8,"column":38},"action":"insert","lines":["[]"],"id":77}],[{"start":{"row":8,"column":37},"end":{"row":8,"column":38},"action":"insert","lines":["u"],"id":78},{"start":{"row":8,"column":38},"end":{"row":8,"column":39},"action":"insert","lines":["s"]},{"start":{"row":8,"column":39},"end":{"row":8,"column":40},"action":"insert","lines":["e"]},{"start":{"row":8,"column":40},"end":{"row":8,"column":41},"action":"insert","lines":["r"]}],[{"start":{"row":8,"column":41},"end":{"row":8,"column":42},"action":"insert","lines":["_"],"id":79},{"start":{"row":8,"column":42},"end":{"row":8,"column":43},"action":"insert","lines":["i"]},{"start":{"row":8,"column":43},"end":{"row":8,"column":44},"action":"insert","lines":["d"]}],[{"start":{"row":8,"column":44},"end":{"row":8,"column":45},"action":"insert","lines":[" "],"id":80},{"start":{"row":8,"column":45},"end":{"row":8,"column":46},"action":"insert","lines":["="]}],[{"start":{"row":8,"column":46},"end":{"row":8,"column":47},"action":"insert","lines":[" "],"id":81},{"start":{"row":8,"column":47},"end":{"row":8,"column":48},"action":"insert","lines":["U"]},{"start":{"row":8,"column":48},"end":{"row":8,"column":49},"action":"insert","lines":["S"]},{"start":{"row":8,"column":49},"end":{"row":8,"column":50},"action":"insert","lines":["e"]},{"start":{"row":8,"column":50},"end":{"row":8,"column":51},"action":"insert","lines":["r"]},{"start":{"row":8,"column":51},"end":{"row":8,"column":52},"action":"insert","lines":["I"]},{"start":{"row":8,"column":52},"end":{"row":8,"column":53},"action":"insert","lines":["D"]}],[{"start":{"row":8,"column":48},"end":{"row":8,"column":49},"action":"remove","lines":["S"],"id":82}],[{"start":{"row":8,"column":48},"end":{"row":8,"column":49},"action":"insert","lines":["s"],"id":83}],[{"start":{"row":8,"column":37},"end":{"row":8,"column":38},"action":"insert","lines":["U"],"id":84},{"start":{"row":8,"column":38},"end":{"row":8,"column":39},"action":"insert","lines":["s"]},{"start":{"row":8,"column":39},"end":{"row":8,"column":40},"action":"insert","lines":["e"]},{"start":{"row":8,"column":40},"end":{"row":8,"column":41},"action":"insert","lines":["r"]},{"start":{"row":8,"column":41},"end":{"row":8,"column":42},"action":"insert","lines":["s"]},{"start":{"row":8,"column":42},"end":{"row":8,"column":43},"action":"insert","lines":["."]}],[{"start":{"row":8,"column":53},"end":{"row":8,"column":54},"action":"insert","lines":["G"],"id":85},{"start":{"row":8,"column":54},"end":{"row":8,"column":55},"action":"insert","lines":["r"]}],[{"start":{"row":8,"column":54},"end":{"row":8,"column":55},"action":"remove","lines":["r"],"id":86},{"start":{"row":8,"column":53},"end":{"row":8,"column":54},"action":"remove","lines":["G"]}],[{"start":{"row":8,"column":53},"end":{"row":8,"column":54},"action":"insert","lines":["U"],"id":87},{"start":{"row":8,"column":54},"end":{"row":8,"column":55},"action":"insert","lines":["s"]},{"start":{"row":8,"column":55},"end":{"row":8,"column":56},"action":"insert","lines":["e"]},{"start":{"row":8,"column":56},"end":{"row":8,"column":57},"action":"insert","lines":["r"]},{"start":{"row":8,"column":57},"end":{"row":8,"column":58},"action":"insert","lines":["s"]},{"start":{"row":8,"column":58},"end":{"row":8,"column":59},"action":"insert","lines":["_"]}],[{"start":{"row":8,"column":59},"end":{"row":8,"column":60},"action":"insert","lines":["G"],"id":88},{"start":{"row":8,"column":60},"end":{"row":8,"column":61},"action":"insert","lines":["r"]},{"start":{"row":8,"column":61},"end":{"row":8,"column":62},"action":"insert","lines":["o"]},{"start":{"row":8,"column":62},"end":{"row":8,"column":63},"action":"insert","lines":["u"]},{"start":{"row":8,"column":63},"end":{"row":8,"column":64},"action":"insert","lines":["p"]},{"start":{"row":8,"column":64},"end":{"row":8,"column":65},"action":"insert","lines":["."]}],[{"start":{"row":8,"column":19},"end":{"row":8,"column":20},"action":"insert","lines":["I"],"id":89},{"start":{"row":8,"column":20},"end":{"row":8,"column":21},"action":"insert","lines":["N"]},{"start":{"row":8,"column":21},"end":{"row":8,"column":22},"action":"insert","lines":["N"]},{"start":{"row":8,"column":22},"end":{"row":8,"column":23},"action":"insert","lines":["E"]},{"start":{"row":8,"column":23},"end":{"row":8,"column":24},"action":"insert","lines":["R"]}],[{"start":{"row":8,"column":24},"end":{"row":8,"column":25},"action":"insert","lines":[" "],"id":90}],[{"start":{"row":8,"column":42},"end":{"row":8,"column":43},"action":"remove","lines":["["],"id":91}],[{"start":{"row":8,"column":42},"end":{"row":8,"column":43},"action":"insert","lines":[" "],"id":92},{"start":{"row":8,"column":43},"end":{"row":8,"column":44},"action":"insert","lines":["O"]},{"start":{"row":8,"column":44},"end":{"row":8,"column":45},"action":"insert","lines":["N"]}],[{"start":{"row":8,"column":42},"end":{"row":8,"column":43},"action":"remove","lines":[" "],"id":93}],[{"start":{"row":8,"column":42},"end":{"row":8,"column":43},"action":"insert","lines":[" "],"id":94}],[{"start":{"row":8,"column":42},"end":{"row":8,"column":43},"action":"remove","lines":[" "],"id":95}],[{"start":{"row":8,"column":44},"end":{"row":8,"column":45},"action":"insert","lines":[" "],"id":96}],[{"start":{"row":8,"column":79},"end":{"row":8,"column":80},"action":"remove","lines":["]"],"id":97}],[{"start":{"row":9,"column":42},"end":{"row":9,"column":43},"action":"remove","lines":["0"],"id":98},{"start":{"row":9,"column":41},"end":{"row":9,"column":42},"action":"remove","lines":["5"]}],[{"start":{"row":9,"column":41},"end":{"row":9,"column":42},"action":"insert","lines":["3"],"id":99},{"start":{"row":9,"column":42},"end":{"row":9,"column":43},"action":"insert","lines":["1"]}]]},"ace":{"folds":[],"scrolltop":0,"scrollleft":0,"selection":{"start":{"row":9,"column":71},"end":{"row":9,"column":71},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":{"row":103,"mode":"ace/mode/php"}},"timestamp":1553545087765,"hash":"dd1d9f410c70007d071fc5bdac781550de1cdce3"}